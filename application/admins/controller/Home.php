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
	 	 // $menus = false;
	 	 // $role = $this->db->table('admin_groups')->where(array('gid'=>$this->_admin['gid']))->item();
	 	 // if ($role) {
	 	 // 	$role['rights'] = (isset($role['rights']) && $role['rights']) ? json_decode($role['rights'],true) : [];
	 	 // }
	 	 // if ($role['rights']) {
	 	 // 	$where = 'mid' in('.implode(',', $role['rights']).') and ishidden-0 and status('mid')
	 	 // }
	 	 // dump($role);
	 	 return $this->fetch();
	 }
     
     //欢迎页面 
     public function welcome(){
         return $this->fetch('welcome');
     }

}
?>