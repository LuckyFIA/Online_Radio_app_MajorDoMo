<?php
/**
 * Ukrainian language file for online radio module
 */

$dictionary = array(
/* general */
'APP_INTERNET_RADIO'=>'Інтернет радіо',
'STATION_NAME'=>'Назва',
'STATION_URL'=>'URL станції',
'ADD_STATION'=>'Додати станцію',
'IMPORT_STATION'=>'Імпортувати станції',
'EXPORT_STATION'=>'Експортувати станції',
'SELECT_STATION'=>'Оберіть',
'PLAY_TERMINAL'=>'Програвати на терміналі',
'ABOUT'=>'Про модуль',
'NO_STATIONS_FOND'=>'Радіостанції не знайдені',
'PLAYERS_SUPORTED'=>'Підтримуються наступні плеєри (Вкладка "Термінали")',
'CAL_IN_MENU'=>'Виклик модуля в меню',
'USE_SCRIPT'=>'Використання в сценаріях/методах',
'RESPECTIVELY'=>'Відповідно',
'VOLUME_CONTROL_IMPLEMENTED'=>'Регулювання гучності реалізовано для',
'LAST_STATION'=>'програвання останньої радіостанції',
'STOP_PLAY'=>'зупиняє програвання',
'SET_VOLUME'=>'встановлює гучність на',
'SET_STATION_VAL'=>'перемикає станцію на',
'WHERE'=>'де',
'OR_STATION_NAME'=>'або назва',
'OR'=>'або',
'ZAICEV_FM'=>'переключити станцію на "Зайцев.FM"; якщо радіо вимкнене, то включити; і встановити гучність на 30%.',
'SUPORT_AUTHOR'=>'Підтримати автора матеріально',
'MODULE_DISCUSSION'=>'Обговорення модуля',
'HERE'=>'тут',
'MODULE_PLAYING_ONLINE_RADIO'=>'Модуль для програвання онлайн-радіо',
'STATION'=> 'станції',
'IMPORT_STATION_LIST'=>'Імпорт списку станцій',
'TOTAL_IMPORTED'=>'Всього імпортовано',
'LIST_FILE'=>'Файл зі списком',
'FILE_FORMAT'=>'Формат файлу (TXT, unicode. Назва станції; URL станції <= кожен запис з нового рядка)'

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
