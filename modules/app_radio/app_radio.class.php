<?php

/**
 * Online Radio Application
 *
 * module for MajorDoMo project
 * @author Fedorov Ivan <4fedorov@gmail.com>
 * @copyright Fedorov I.A.
 * @version 1.3.1 October 2014
 */
 /**
 * Translate LV EN
 * @author Guntars Strogonovs <gun4as@gmail.com>
 * @version 1.3.2 February 2020
 */
/* if (file_exists(ROOT.'languages/app_radio_'.SETTINGS_SITE_LANGUAGE.'.php')) {
     include_once(ROOT.'languages/app_radio_'.SETTINGS_SITE_LANGUAGE.'.php');
 }
 if (file_exists(ROOT.'languages/app_radio_default.php')) {
     include_once(ROOT.'languages/app_radio_default.php');
 }
*/

class app_radio extends module
{

    /**
     * radio
     *
     * Module class constructor
     *
     * @access private
     */
    function app_radio()
    {
        $this->name = "app_radio";
        $this->title = "Internet Radio";
        $this->module_category = "<#LANG_SECTION_APPLICATIONS#>";
        $this->checkInstalled();
    }

    /**
     * saveParams
     *
     * Saving module parameters
     *
     * @access public
     */
    function saveParams($data = 1)
    {
        $p = array();
        if (IsSet($this->id)) {
            $p["id"] = $this->id;
        }
        if (IsSet($this->view_mode)) {
            $p["view_mode"] = $this->view_mode;
        }
        if (IsSet($this->edit_mode)) {
            $p["edit_mode"] = $this->edit_mode;
        }
        if (IsSet($this->tab)) {
            $p["tab"] = $this->tab;
        }
        return parent::saveParams($p);
    }
     /**
     * getParams
     *
     * Getting module parameters from query string
     *
     * @access public
     */
    function getParams()
    {
        global $id;
        global $mode;
        global $view_mode;
        global $edit_mode;
        global $tab;
        if (isset($id)) {
            $this->id = $id;
        }
        if (isset($mode)) {
            $this->mode = $mode;
        }
        if (isset($view_mode)) {
            $this->view_mode = $view_mode;
        }
        if (isset($edit_mode)) {
            $this->edit_mode = $edit_mode;
        }
        if (isset($tab)) {
            $this->tab = $tab;
        }
    }

    /**
     * Run
     *
     * Description
     *
     * @access public
     */
    function run()
    {
        global $session;
        $out = array();
        if ($this->action == 'admin') {
            $this->admin($out);
        } else {
            $this->usual($out);
        }
        if (IsSet($this->owner->action)) {
            $out['PARENT_ACTION'] = $this->owner->action;
        }
        if (IsSet($this->owner->name)) {
            $out['PARENT_NAME'] = $this->owner->name;
        }
        $out['VIEW_MODE'] = $this->view_mode;
        $out['EDIT_MODE'] = $this->edit_mode;
        $out['MODE'] = $this->mode;
        $out['ACTION'] = $this->action;
        if ($this->single_rec) {
            $out['SINGLE_REC'] = 1;
        }
        $this->data = $out;
        $p = new parser(DIR_TEMPLATES . $this->name . "/" . $this->name . ".html", $this->data, $this);
        $this->result = $p->result;
    }
    /**
     * BackEnd
     *
     * Module backend
     *
     * @access public
     */
    function admin(&$out)
    {
        if (isset($this->data_source) && !$_GET['data_source'] && !$_POST['data_source']) {
            $out['SET_DATASOURCE'] = 1;
        }
        if ($this->data_source == 'app_radio' || $this->data_source == '') {

            $out['VER'] = '1.3.2';
			global $select_terminal;
            if ($select_terminal != '')
                setGlobal('RadioSetting.PlayTerminal', $select_terminal);
            $out['PLAY_TERMINAL'] = getGlobal('RadioSetting.PlayTerminal');
            $res = SQLSelect("SELECT NAME FROM terminals");
            if ($res[0]) {
                $out['LIST_TERMINAL'] = $res;
            }

            if ($this->view_mode == '' || $this->view_mode == 'view_stations') {
                $this->view_stations($out);
            }
            if ($this->view_mode == 'edit_stations') {
                $this->edit_stations($out, $this->id);
            }
            if ($this->view_mode == 'delete_stations') {
                $this->delete_stations($this->id);
                $this->redirect("?");
            }
            if ($this->view_mode == 'import_stations') {
                $this->import_stations($out);
            }
            if ($this->view_mode == 'export_stations') {
                $this->export_stations($out);
            }
        }
    }
    /**
     * FrontEnd
     *
     * Module frontend
     *
     * @access public
     */
    function usual(&$out)
    {

        $this->view_stations($out);

        $current_volume = getGlobal('RadioSetting.VolumeLevel');
        $last_stationID = getGlobal('RadioSetting.LastStationID');
        $out['VOLUME'] = $current_volume;

        if ($last_stationID) {
            for ($i = 0; $i < count($out['RESULT']); $i++) {
                if ($last_stationID == $out['RESULT'][$i]['ID']) {
                    $out['RESULT'][$i]['SELECT'] = 1;
                    break;
                }
            }
        } else {
            $out['RESULT'][0]['SELECT'] = 1;
        }

        global $ajax;
        if ($ajax != '') {
            global $cmd;
            if ($cmd != '') {
                if (!$this->intCall) {
                    echo $cmd . ' ';
                }
                global $s_id;
                if ($s_id != '') {
                    for ($i = 0; $i < count($out['RESULT']); $i++) {
                        if ($s_id == $out['RESULT'][$i]['ID']) {
                            $out['PLAY'] = trim($out['RESULT'][$i]['stations']);
                            $last_stationID = $out['RESULT'][$i]['ID'];
							$LastStationName = $out['RESULT'][$i]['name'];
                            setGlobal('RadioSetting.LastStationID', $last_stationID);
							sg('RadioSetting.LastStationName',$LastStationName);
                            break;
                        }
                    }
                } else {
                    if ($out['RESULT'][0]['ID']) {
                        $out['PLAY'] = trim($out['RESULT'][0]['stations']);
                        $last_stationID = $out['RESULT'][0]['ID'];
                        setGlobal('RadioSetting.LastStationID', $last_stationID);
                    }
                }
                global $volume;
                if ($volume != '') {
                    setGlobal('RadioSetting.VolumeLevel', $volume);
                }
		global $play_terminal;
		if ($play_terminal != '') {
		    setGlobal('RadioSetting.PlayTerminal', $play_terminal);
		}
                $this->select_player($out);
            }

            if (!$this->intCall) {
                echo "OK";
                if ($res) {
                    echo $res;
                }
                exit;
            }
        }
    }

	function change_station($val)
	{
		$res = SQLSelect("SELECT * FROM app_radio WHERE name='$val' or ID='$val'");
		if ($res[0]['ID']) {
			sg('RadioSetting.LastStationID',$res[0]['ID']);
			sg('RadioSetting.LastStationName',$res[0]['name']);
			$this->control('st_change');
		}
		else
		{
			$log = getLogger($this);
			$log->error('Станции '.$val.' не найдено!');
		}
	}

	function set_volume($vol)
	{
		global $volume;
		$volume = $vol;
		$this->control('vol');
	}

	function control($state) {
		// $log = getLogger($this);
		// $log->error('control');

		$out = array();
		global $cmd;
		$cmd = $state;
		//echo('control->'.$cmd);
		if($cmd == 'st_change') {
			if(gg('RadioSetting.On'))
				$cmd = 'play';
		}
		if($cmd == 'play') {
			$last_stationID = getGlobal('RadioSetting.LastStationID');
			$res = SQLSelect('SELECT `stations` FROM `app_radio` WHERE `ID` = '.intval($last_stationID));
			if($res[0]['stations']) {
				$out['PLAY'] = $res[0]['stations'];
			} else {
				$res = SQLSelect('SELECT `stations` FROM `app_radio`');
				if($res[0]['stations']) {
					$out['PLAY'] = $res[0]['stations'];
				} else {
					say('Станций не найдено');
					$out['PLAY'] = 'http://listen.shoutcast.com/europarussia';
				}
			}
		}
		$this->select_player($out);
	}

    function select_player(&$out){
        global $cmd;
        global $volume;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $play_terminal = getGlobal('RadioSetting.PlayTerminal');
        echo $play_terminal;

        $url=BASE_URL.ROOTHTML.'popup/app_player.html?ajax=1&play_terminal='.$play_terminal;

        if($cmd=='play'){
         sg('RadioSetting.On',1);
         $url.="&command=play&param=".urlencode($out['PLAY']);
        }
         else if($cmd=='stop'){
         sg('RadioSetting.On',0);
         $url.="&command=stop";
        }
        else if($cmd=='vol')
        {
         sg('RadioSetting.VolumeLevel', $volume);
         $url.="&command=set_volume&param=".$volume;
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        $res=curl_exec($ch);
        curl_close($ch);
    }

    function view_stations(&$out)
    {
        //require(DIR_MODULES.$this->name.'/view_stations.php');
        $table_name = 'app_radio';
        $res = SQLSelect("SELECT * FROM $table_name ORDER BY name");
        if($res[0]['ID']) {
            $out['RESULT'] = $res;
			for($i = 0 ; $i < count($out['RESULT']) ; $i++) {
				$out['RESULT'][$i]['position'] = $i + 1;
			}
        }
    }

    function edit_stations(&$out, $id)
    {
        //require(DIR_MODULES.$this->name.'/view_stations.php');
        $table_name = 'app_radio';
        $rec = SQLSelectOne("SELECT * FROM $table_name WHERE ID='$id'");

        if ($this->mode == 'update') {
            $ok = 1;
            //updating 'stations' (text, required)
            global $stations;
            global $name;
            $rec['stations'] = $stations;
            $rec['name'] = $name;
            if ($rec['stations'] == '' || $rec['name'] == '') {
                $out['ERR_stations'] = 1;
                $ok = 0;
            }
            //UPDATING RECORD
            if ($ok) {
                if ($rec['ID']) {
                    SQLUpdate($table_name, $rec); // update
                } else {
                    $new_rec = 1;
                    $rec['ID'] = SQLInsert($table_name, $rec); // adding new record
                }
                $out['OK'] = 1;
            } else {
                $out['ERR'] = 1;
            }
        }
        outHash($rec, $out);
    }

    function import_stations(&$out)
    {
        //require(DIR_MODULES.$this->name.'/app_quotes_import.inc.php');
        $table_name = 'app_radio';
        if ($this->mode == 'update') {
            global $file;
            if (file_exists($file)) {
                $tmp = LoadFile($file);
                $lines = mb_split("\n", $tmp);
                $total_lines = count($lines);
                for ($i = 0; $i < $total_lines; $i++) {
                    $rec = array();
                    $rec_ok = 1;
                    list($rec['name'], $rec['stations']) = explode(";", $lines[$i]);
                    if ($rec['stations'] == '') {
                        $rec_ok = 0;
                    }
                    if ($rec_ok) {
                        $old = SQLSelectOne("SELECT ID FROM " . $table_name . " WHERE stations LIKE '" . DBSafe($rec['stations']) . "'");
                        if ($old['ID']) {
                            $rec['ID'] = $old['ID'];
                            SQLUpdate($table_name, $rec);
                        } else {
                            SQLInsert($table_name, $rec);
                        }
                        $out["TOTAL"]++;
                    }
                }
            } else {
                $out['ERR'] = 1;
            }
        }
    }

	function export_stations(&$out) {
		$data = '';
		$res = SQLSelect('SELECT `stations`, `name` FROM `app_radio` ORDER BY `name`');
		foreach($res as $item) {
			$data .= $item['name'].';'.$item['stations'].PHP_EOL;
		}
		header('Content-Disposition: attachment; filename=app_radio_export_'.date('d-m-Y_H-i-s').'.txt');
		header('Content-Type: text/plain');
		die($data);
	}

    function delete_stations($id)
    {
        $table_name = 'app_radio';
        $rec = SQLSelectOne("SELECT * FROM $table_name WHERE ID='$id'");
        SQLExec("DELETE FROM $table_name WHERE ID='" . $rec['ID'] . "'");
    }
    /**
     * Install
     *
     * Module installation routine
     *
     * @access private
     */
    function install($parent_name = "")
    {
        $className = 'Radio';
        $objectName = 'RadioSetting';
		$metodName = 'Control';
        $properties = array('LastStationID', 'VolumeLevel', 'PlayTerminal', 'On');
		$code = 'include_once(DIR_MODULES.\'app_radio/app_radio.class.php\');
$app_radio = new app_radio();

if(is_array($params)) {
    foreach($params as $key=>$value) {
        switch((string)$key) {
            case \'sta\': $app_radio->change_station($params[\'sta\'], $app_radio); break;
            case \'cmd\': $app_radio->control($params[\'cmd\']); break;
            case \'vol\': $app_radio->set_volume($params[\'vol\'], $app_radio); break;
            default:
                if($value == \'play\' || $value == \'stop\') $app_radio->control($value);
                elseif(strpos($value, \'vol\') === 0) $app_radio->set_volume((int)substr($value, 3), $app_radio);
                elseif(strpos($value, \'sta:\') === 0) $app_radio->change_station(substr($value, 4), $app_radio);
        }
    }
}';

		// Class
		$class_id = addClass($className);
		if($class_id) {
			$class = SQLSelectOne('SELECT * FROM `classes` WHERE `ID` = '.$class_id);
			$class['DESCRIPTION'] = 'Онлайн радио';
			SQLUpdate('classes', $class);
		}

		// Method
		$meth_id = addClassMethod($className, $metodName, '');

		// Object
		$object_id = addClassObject($className, $objectName);
		if($object_id) {
			$object = SQLSelectOne('SELECT * FROM `objects` WHERE `ID` = '.$object_id);
			$object['DESCRIPTION'] = 'Настройки';
			SQLUpdate('objects', $object);
		}

		// Properties
		foreach($properties as $title) {
			$properti = SQLSelectOne('SELECT `ID` FROM `properties` WHERE `OBJECT_ID` = '.$object_id.' AND `TITLE` LIKE \''.DBSafe($title).'\'');
			if(!$properti) {
				$properti = array();
				$properti['TITLE'] = $title;
				$properti['OBJECT_ID'] = $object_id;
				$properti_id = SQLInsert('properties', $properti);
			}
		}

		// Code
		if($meth_id) {
			injectObjectMethodCode($objectName.'.'.$metodName, $this->name, $code);
		}

        parent::install($parent_name);
    }

	function uninstall()
	{
		SQLExec("drop table if exists app_radio");
		parent::uninstall();
	}

    function dbInstall($data)
    {

$data = <<<EOD
 app_radio: ID int(10) unsigned NOT NULL auto_increment
 app_radio: stations text
 app_radio: name text
EOD;
        parent::dbInstall($data);
    }
// --------------------------------------------------------------------
}
?>
