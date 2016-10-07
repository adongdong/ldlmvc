<?php
namespace core\lib\driver\log;

use core\lib\config; 
//文件储存
class File
{
	public $path;//日志储存位置

	public function __construct()
	{
		$path = config::get('OPTION','log');	
		$this->path = $path['path'];
	}

	public function log($message,$file = 'log')
	{
		$time = date('Ymd');
		if(!is_dir($this->path.$time))
		{
			mkdir($this->path.$time,'0777',true);
		}

		return file_put_contents($this->path.$time.'/'.$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
	}
}