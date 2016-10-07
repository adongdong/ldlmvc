<?php
namespace application\model;

use core\lib\model;

class UserModel extends model
{
    public  $table = 'user';

    public  function  lists()
    {
        $res = $this->select($this->table,'*');
        return $res;

    }

    public function addOne($data){
        return $this->insert($this->table,$data);
    }
}