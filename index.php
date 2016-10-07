<?php
// 初始化常量
//开启调试模式
define('APP_DEBUG', true);
//项目路径 
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');
//是否开启调试模式
defined('APP_DEBUG') or define('APP_DEBUG', false);
//核心库路径
defined('CORE_PATH') or define('CORE_PATH', APP_PATH.'core/');
//配置路径
defined('CONFIG_PATH') or define('CONFIG_PATH', APP_PATH.'application/config/');
//文件路径
defined('RUNTIME_PATH') or define('RUNTIME_PATH', APP_PATH.'runtime/');

include 'vendor/autoload.php';

//判断调试模式
if(APP_DEBUG)
{
	//调错
	$whoops = new \Whoops\Run;
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle("error");
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error', 'On');
}
else
{
	ini_set('display_error', 'Off');
}
require CORE_PATH.'core.php';
//自动加载类
spl_autoload_register('\core\core::load');

//运行框架
\core\core::run();


