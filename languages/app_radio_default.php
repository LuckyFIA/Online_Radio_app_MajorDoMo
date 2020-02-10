<?php
/**
 * English language file for online radio module
 */

$dictionary = array(
/* general */
'APP_RADIO_NAME' =>'Online Radio',
'STATION_NAME'=>'Name',
'STATION_URL'=>'Statiom URL',
'ADD_STATION'=>'ADD station',
'IMPORT_STATION'=>'Import station',
'EXPORT_STATION'=>'Export station',
'SELECT_STATION'=>'Select',
'PLAY_TERMINAL'=>'Play in terminal',
'ABOUT'=>'About',
'NO_STATIONS_FOND'=>'No station fond',
'PLAYERS_SUPORTED'=>'Supports the following players (in the Terminal menu)',
'CAL_IN_MENU'=>'How to Use the Control Menu',
'USE_SCRIPT'=>'How to use in scenarios/methods',
'RESPECTIVELY'=>'Respectively',
'VOLUME_CONTROL_IMPLEMENTED'=>'Volume control is implemented',
'LAST_STATION'=>'play last station',
'STOP_PLAY'=>'stop play station',
'SET_VOLUME'=>'sets the volume of the player to',
'SET_STATION_VAL'=>'switches the station to',
'WHERE'=>'where',
'OR_STATION_NAME'=>'or the name of the station',
'OR'=>'or',
'ZAICEV_FM'=>'Toggles the station to "Зайцев.FM", If the radio is off then on; and sets the volume to 30%.',
'SUPORT_AUTHOR'=>'Support the author Materials',
'MODULE_DISCUSSION'=>'Discussions on module',
'HERE'=>'here',
'MODULE_PLAYING_ONLINE_RADIO'=>'The module is intended to play Internet radio',
'STATION'=> 'station',
'IMPORT_STATION_LIST'=>'Import station list',
'TOTAL_IMPORTED'=>'Total import',
'LIST_FILE'=>'File list',
'FILE_FORMAT'=>'File Format (TXT, UNICODE. station Name;station URL <= Each Next Record In A New Line)'


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
