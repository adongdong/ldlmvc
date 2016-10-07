<?php
namespace core\lib;

class Config
{
	static public $config = array();

	/**
	 * [get 加载单个配置项]
	 * @param  [type] $name [要加载的配置项]
	 * @param  [type] $file [配置的文件名]
	 * @return [type]       [description]
	 */
	static public function get($name, $file)
	{

		if(isset(self::$config[$file]))
		{
			return self::$config[$file][$name];
		}
		else
		{
			$path = CONFIG_PATH.$file.'.php';
			if(is_file($path))
			{
				$config = include $path;
				if(isset($config[$name]))
				{
					self::$config[$file] = $config;
					return $config[$name];
				}
				else
				{
					throw new \Exception("No file：".$name);
				}
			}
			else
			{
				throw new \Exception("No file；".$file);
			}
		}
	}

	/**
	 * [all 加载整个配置文件]
	 * @param  [type] $file [配置文件名]
	 * @return [type]       [description]
	 */
	static public function all($file)
	{
		if(isset(self::$config[$file]))
		{
			return self::$config[$file];
		}
		else
		{
			$path = CONFIG_PATH.$file.'.php';
			if(is_file($path))
			{
				$config = include $path;
				self::$config[$file] = $config;
				return $config;
			}
			else
			{
				throw new \Exception("No file".$file);
			}
		}
	}
}