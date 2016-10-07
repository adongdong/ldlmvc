<?php
namespace core\lib;

use core\lib\config;

class Log
{
	static $class;

	/**
	 * [init 初始化日志类]
	 * @return [type] [description]
	 */
	static public function init()
	{
		$driver = config::get('DRIVER','log');
		$class = 'core\\lib\driver\log\\'.$driver;

		self::$class = new $class;
	}

	static public function log($message,$file='log')
	{
		self::$class->log($message,$file);
	}
}