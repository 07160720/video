<?php
namespace app\admins\controller;
use think\Controller;
use Util\data\Sysdb;
/**
* 
*/
class Home extends BaseAdmin
{
	 public function index(){
	 	 return $this->fetch();
	 }
     
     //欢迎页面 
     public function welcome(){
         return $this->fetch('welcome');
     }

}
?>