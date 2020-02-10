<?php
/**
 * Latvian language file for online radio module
 */

$dictionary = array(
/* general */
'STATION_NAME'=>'Nosaukums',
'STATION_URL'=>'Raidstacijas URL',
'ADD_STATION'=>'Pievienot raidstaciju',
'IMPORT_STATION'=>'Importēt raidstaciju',
'EXPORT_STATION'=>'Eksportēt raidstaciju',
'SELECT_STATION'=>'Izvēlaties',
'PLAY_TERMINAL'=>'Atskaņot terminālī',
'ABOUT'=>'Par moduli',
'NO_STATIONS_FOND'=>'Nav atrasta neviena raidstacija',
'PLAYERS_SUPORTED'=>'Atbalsta šadus atskaņotājus (Ivēlnē Temināļi)',
'CAL_IN_MENU'=>'Kā izmantot Vadības izvēlnē',
'USE_SCRIPT'=>'Kā izmantot scenārijos/metodēs',
'RESPECTIVELY'=>'Atiecīgi',
'VOLUME_CONTROL_IMPLEMENTED'=>'Skaļuma kontrole ir realizēta',
'LAST_STATION'=>'atskaņot pēdējo raidstaciju',
'STOP_PLAY'=>'apturēt atskaņošanu',
'SET_VOLUME'=>'iestata atskaņošanas skaļumu uz',
'SET_STATION_VAL'=>'pārslēdz raidstaciju uz',
'WHERE'=>'kur',
'OR_STATION_NAME'=>'vai raidstacijas nosaukums',
'OR'=>'vai',
'ZAICEV_FM'=>'pārslēdz raidstaciju uz "Зайцев.FM", Ja rādio izslēgts, tad ieslēdz; un iestata skaļumu uz 30%.',
'SUPORT_AUTHOR'=>'Atbalstiet autoru Materiāli',
'MODULE_DISCUSSION'=>'Diskusijas par moduli',
'HERE'=>'Šeit',
'MODULE_PLAYING_ONLINE_RADIO'=>'Modulis paredzēts lai atskaņotu interneta rādio',
'STATION'=> 'Raidstaciju',
'IMPORT_STATION_LIST'=>'Importēt raidstaciju sarakstu',
'TOTAL_IMPORTED'=>'Kopā importēts',
'LIST_FILE'=>'Fails ar sarakstu',
'FILE_FORMAT'=>'Faila formāts (TXT, UNICODE. Raidstacijas nosaukums;Raidstacijas URL <= Katrs nākamais ieraksts jaunā rindā )'





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
