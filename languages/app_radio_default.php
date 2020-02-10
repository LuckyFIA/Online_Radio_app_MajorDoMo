<?php
/**
 * English language file for online radio module
 */

$dictionary = array(
/* general */
'APP_NAME' =>'Online Radio'


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
