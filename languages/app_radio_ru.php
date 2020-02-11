<?php
/**
 * Rusian language file for online radio module
 */

$dictionary = array(
/* general */
'APP_INTERNET_RADIO'=>'Интернет радио',
'STATION_NAME'=>'Название',
'STATION_URL'=>'URL станции',
'ADD_STATION'=>'Добавить станцию',
'IMPORT_STATION'=>'Импортировать станции',
'EXPORT_STATION'=>'Экспортировать станции',
'SELECT_STATION'=>'Выберите',
'PLAY_TERMINAL'=>'Проигрывать на терминале',
'ABOUT'=>'О модуле',
'NO_STATIONS_FOND'=>'Радиостанции не найдены',
'PLAYERS_SUPORTED'=>'Поддерживаются следующие плееры (Вкладка "Терминалы")',
'CAL_IN_MENU'=>'Вызов модуля в меню',
'USE_SCRIPT'=>'Использование в сценариях/методах',
'RESPECTIVELY'=>'Соответственно',
'VOLUME_CONTROL_IMPLEMENTED'=>'Регулировка громкости реализована для',
'LAST_STATION'=>'проигрывание последней радиостанции',
'STOP_PLAY'=>'останавливает проигрывание',
'SET_VOLUME'=>'устанавливает громкость на',
'SET_STATION_VAL'=>'переключает станцию на',
'WHERE'=>'где',
'OR_STATION_NAME'=>'или название',
'OR'=>'или',
'ZAICEV_FM'=>'перключить станцию на "Зайцев.FM"; если радио выключено, то включить; и установить громкость на 30%.',
'SUPORT_AUTHOR'=>'Поддержать автора материально',
'MODULE_DISCUSSION'=>'Обсуждение модуля',
'HERE'=>'здесь',
'MODULE_PLAYING_ONLINE_RADIO'=>'Модуль для проигрывания онлайн-радио',
'STATION'=> 'станции',
'IMPORT_STATION_LIST'=>'Импорт списка станций',
'TOTAL_IMPORTED'=>'Всего импортировано',
'LIST_FILE'=>'Фаил со списком',
'FILE_FORMAT'=>'Формат файла (TXT, unicode. Название станции;URL станции <= каждая запись с новой строки)'

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
