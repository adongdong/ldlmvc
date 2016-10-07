<?php
namespace core\lib;

use core\lib\config;
class Model extends \medoo
{
	
	function __construct()
	{
		// $database = config::all('db');
		// try {
		// 	parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
		// } catch (\PDOException $e) {
		// 	echo ($e->getMessage());
		// }
		$option = config::all('db');
		parent::__construct($option);
	}
}