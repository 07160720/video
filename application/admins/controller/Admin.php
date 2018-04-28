<?php
namespace app\admins\controller;
use think\Controller;
use Util\data\Sysdb;
/**
* 管理員管理
*/
class Admin extends BaseAdmin
{
    // 管理員列表
	public function index(){
		  $data['lists'] = $this->db->table('admins')->lists();
		  $data['groups'] = $this->db->table('admin_groups')->cates('gid');
          $this->assign('data',$data);
		  return $this->fetch();
	}

	public function add(){
		$id = (int)input('get.id');
		// 加載管理員
		$data['item'] = $this->db->table('admins')->where(array('id'=>$id))->item();
		//加載角色
		$data['groups'] = $this->db->table('admin_groups')->cates('gid');
		$this->assign('data',$data);
		return $this->fetch();
	}

	//保存管理員
	public function save(){
		$id = (int)input('post.id');
		$data['gid'] = (int)(input('post.gid'));
		$password = trim(input('post.pwd'));
		$data['truename'] = trim(input('post.truename'));
		$data['username'] = trim(input('post.username'));
		$data['status'] = (int)(input('post.status'));
       
		if (!$data['username']) {
			 exit(json_encode(array('code'=>1,'msg'=>'用戶名不能為空')));
		}
		if (!$data['gid']) {
			 exit(json_encode(array('code'=>1,'msg'=>'角色不能為空')));
		}

		if ($id == 0 && !$password) {
			 exit(json_encode(array('code'=>1,'msg'=>'密碼不能為空')));
		}

		if (!$data['truename']) {
			 exit(json_encode(array('code'=>1,'msg'=>'姓名不能為空')));
		}
		
		if ($password) {
			// 密碼處理
			$data['password'] = md5($data['username'].$password);
		}
        
         $res = true;
        if ($id == 0) {
        	// 檢查用戶是否已存在
        	$item = $this->db->table('admins')->where(array('username'=>$data['username']))->item();
        	if ($item) {
        		exit(json_encode(array('code'=>1,'msg'=>'該用戶已存在')));
        	}
        	 $data['add_time'] = time();
        	// 保存用戶
        	 $res = $this->db->table('admins')->insert($data);
          }else{
          	 $this->db->table('admins')->where(array('id'=>$id))->update($data);
          }

		if (!$res) {
			exit(json_encode(array('code'=>1,'msg'=>'保存失敗')));
		}
		exit(json_encode(array('code'=>0,'msg'=>'保存成功')));
	}
    
    // 刪除管理員
	public function delete(){
       $id = (int)input('post.id');
       $res = $this->db->table('admins')->where(array('id'=>$id))->delete();
       if(!$res){
         exit(json_encode(array('code'=>1,'msg'=>'刪除失敗')));
       }
         exit(json_encode(array('code'=>0,'msg'=>'刪除成功')));
	}
}
?>