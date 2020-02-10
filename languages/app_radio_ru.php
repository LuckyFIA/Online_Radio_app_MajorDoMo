<?php
/**
 * Rusian language file for online radio module
 */

$dictionary = array(
/* general */
'RADIO_NAME' =>'Онлайн радио'


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
