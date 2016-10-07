<?php
namespace core;

class core
{
	//储存类的数组
	public static $classMap = array();

	public $assign;

	/**
	 * [run 框架运行]
	 * @return [type] [description]
	 */
	static public function run()
	{
		//实例化路由类
		$route = new \core\lib\route();

		$controller = $route->controller;

		$controller = ucfirst($controller);
		$action = $route->action;

		//控制器文件
		$controllerFile = APP_PATH.'application/controller/'.$controller.'Controller.php';

		//控制器类
		$controllerClass =  '\application\controller\\'.$controller.'Controller';
		//控制器文件是否存在
		if(is_file($controllerFile))
		{
			//include $controllerFile;
			$ctrl = new $controllerClass;
			$ctrl->$action();
		}
		else
		{
			throw new \Exception("找不到控制器".$controller);
			
		}
	}

	/**
	 * [load 自动加载类]
	 * @param  [type] $class [类名]
	 * @return [type]        [description]
	 */
	static public function load($class)
	{
		//如果存在这个类的话就不再调用这个类了
		if(isset($classMap[$class]))
		{
			return true;
		}
		else
		{
			$class = str_replace('\\', '/', $class);
			if(is_file(APP_PATH.$class.'.php'))
			{
				include APP_PATH.$class.'.php';
				self::$classMap[$class] = $class;
			}
			else
			{
				return false;
			}
		}
		
	}


	public function assign($name, $value)
	{
		$this->assign[$name] = $value;
	}

	public function display($file)
	{
		$filePath = APP_PATH.'application/views/'.$file;
		if(is_file($filePath))
		{
			\Twig_Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP_PATH.'application/views');
			$twig = new \Twig_Environment($loader, array(
				'cache' => RUNTIME_PATH.'logs/twig',
				'debug' => true
			));
			$template = $twig->loadTemplate($file);
			$template->display($this->assign?$this->assign:array());
		}
	}

//    public function jump($url){
//        header('location:'.$url);
//        exit();
//    }


}