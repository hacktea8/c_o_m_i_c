<?php

error_reporting(0);
define('P_W','admincp');
define('R_P',strpos(__FILE__, DIRECTORY_SEPARATOR) !== FALSE ? substr(__FILE__, 0, strrpos(__FILE__,DIRECTORY_SEPARATOR)).'/' : './');
define('D_P',R_P);
function_exists('date_default_timezone_set') && date_default_timezone_set('Etc/GMT+0');


require_once(R_P.'uc_config.php');
require_once(R_P.'api/class_base.php');

$api = new api_client();
$response = $api->run($_POST + $_GET);

if ($response) {
	echo $api->dataFormat($response);
}

//var_dump($response);

function GetLang($lang,$EXT='php'){//No use
	return R_P."template/wind/lang_$lang.$EXT";
}
function Pwloaddl($module, $checkFunction = 'mysqli_get_client_info') {
	return extension_loaded($module) && $checkFunction && function_exists($checkFunction) ? true : false;
}
?>
