<?php
namespace core\lib;

use core\lib\config;

class Route
{
	public $controller;
	public $action;
	function __construct()
	{
		$path = $_SERVER['REQUEST_URI'];
		//将路径拆分
		$patharr = explode('/', trim($path,'/'));
		if($patharr[0] == 'index.php')
		{
			array_shift($patharr);
		}
		//url中是否传了参数
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' && !empty($patharr))
		{
			//控制器
			if(isset($patharr[1]))
			{
				$this->controller = $patharr[1];
			}
			unset($patharr[1]);
			//是否存在方法
			if(isset($patharr[2]))
			{
				//赋值方法
				$this->action = $patharr[2];
				unset($patharr[2]);
			}
			else
			{
				//默认方法
				$this->action = config::get('CONTROLLER','route');
			}
			//传参
			$count = count($patharr)+2;
			$i = 2;
			while($i < $count) {
				if(isset($patharr[$i+1]))
				{
					$_GET[$patharr[$i]] = $patharr[$i+1];
				}
				$i+=2;
			}
		}
		else
		{
			//默认控制器。方法
			$this->controller = config::get('CONTROLLER','route');
			$this->action = config::get('ACTION','route');
		}
 	}
}