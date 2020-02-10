<?php
/**
 * Latvian language file for online radio module
 */

$dictionary = array(
/* general */
'APP_NAME' =>'Interneta Rādio',
'STATION_NAME'=>'Nosaukums',
'STATION_URL'=>'Raidstacijas URL',
'ADD_STATION'=>'Pievienot raidstaciju',
'DEL_STATION'=>'Dzēst Raistaciju',
'IMPORT_STATION'=>'Importēt raidstaciju',
'EXPORT_STATION'=>'Eksportēt raidstaciju',
'SELECT_STATION'=>'Izvēlaties',
'PLAY_TERMINAL'=>'Atskaņot terminālī',
'ABOUT'=>'Par moduli',
'NO_STATIONS_FOND'=>'Nav atrasta neviena raidstacija',
'PLAYERS_SUPORTED'=>'Atbalsta šadus atskaņotājus (Ivēlnē Temināļi)',
'CAL_IN_MENU'=>'Kā izmantot Vadības izvēlnē',
'USE_SCRIPT'=>'Kā izmantot scenārijos/metotēs',
'RESPECTIVELY'=>'Atiecīgi'



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
