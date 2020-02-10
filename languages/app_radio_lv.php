<?php
/**
 * Latvian language file for online radio module
 */

$dictionary = array(
/* general */
'RADIO_NAME' =>'Interneta Rādio',
'STATION_NAME'=>'Nosaukums',
'STATION_URL'=>'Raidstacijas URL',
'ADD_STATION'=>'Pievienot raidstaciju',
'DEL_STATION'=>'Dzēst Raistaciju',
'IMPORT_STATION'=>'Importēt raidstaciju',
'EXPORT_STATION'=>'Eksportēt raidstaciju',
'SELECT_STATION'=>'Izvēlaties',
'PLAY_TERMINAL'=>'Atskaņot terminālī',
'ABOUT'=>'Par moduli'


/* end module names */
);

foreach ($dictionary as $k=>$v)
{
   if (!defined('LANG_' . $k))
   {
      define('LANG_' . $k, $v);
   }
}

?>
