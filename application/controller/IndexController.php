<?php
namespace application\controller;
use core\lib\model;

class IndexController extends \core\core
{
	public function index()
	{

		$model = new \application\model\UserModel();
		$data = $model->lists();

		$this->assign('data',$data);

		$this->display('show.html');
	}

//    public function tiao(){
//            jump('/');
//    }

    public  function add(){
       // echo "add";
        $this->display('add.html');
    }

    public  function addzhi(){
        $name=$_POST;
        //print_r($name);
        $model=new \application\model\UserModel();
        $re=$model->addOne($name);
        print_r($re);
    }
}