<?php
namespace app\admins\controller;
use think\Controller;
use think\Session;
use think\Db;
use Util\data\Sysdb;
/**
* 
*/
class Account extends Controller
{
	
	public function login(){
		return $this->fetch();
	}

	//管理员登录
	public function dologin(){
		$db = db('admins');
        $user_name = input('post.username');
        $user_Pwd = input('post.password');
        $captcha = input('post.verifycode');
        // 查询数据
        $user = $db->where(['username'=>$user_name,'password'=>$user_Pwd])->find();
       
	 	if ($user) {
           if (!captcha_check($captcha)) {
                	$this->error('验证码错误');
            }else{  

            	  //设置用户session
                  Session::set('admin',$user_name);
                  return $this->success('登录成功...','admins/home/index');
            } 	
	 	}else{
	 		return $this->success('用户名或密码错误...','admins/account/login');
	 	}
	}
	//退出登錄
	 public function loginout(){
	 	 // 删除（当前作用域）
           Session::delete('admin');
           return $this->success('退出成功...','admins/account/login');
	 }

}