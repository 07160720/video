<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp\wamp64\www\video\public/../application/admins\view\admin\add.html";i:1524839170;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>添加管理员</title>
	<link rel="stylesheet" type="text/css" href="/video/public/static/layui/css/layui.css">
    <script type="text/javascript" src="/video/public/static/layui/layui.js"></script>
    <meta charset="utf-8">
</head>
<body style="padding: 10px">
    <form class="layui-form">
      <input type="hidden" name="id" value="<?php echo $data['item']['id']; ?>">
      <div class="layui-form-item">
      	   <label class="layui-form-label" >用户名</label>
      	   <div class="layui-input-inline">
      	   	   <input type="text" class="layui-input" name="username" value="<?php echo $data['item']['username']; ?>" <?php echo $data['item']['id']>0?'readonly':''; ?>>
      	   </div>
      </div>
      <div class="layui-form-item">
      	   <label class="layui-form-label">角&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色</label>
      	   <div class="layui-input-inline">
      	   	   <select lay-verify="required" name="gid">
      	   	   	  <option value="0"></option>
      	   	   	  <?php if(is_array($data['groups']) || $data['groups'] instanceof \think\Collection || $data['groups'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['groups'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      	   	   	  <option value="<?php echo $vo['gid']; ?>" <?php echo $vo['gid']==$data['item']['gid']?'selected' : ''; ?>><?php echo $vo['title']; ?></option>
      	   	   	  <?php endforeach; endif; else: echo "" ;endif; ?>
      	   	   </select>
      	   </div>
      </div>
      <div class="layui-form-item">
      	   <label class="layui-form-label">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</label>
      	   <div class="layui-input-inline">
      	   	   <input type="text" class="layui-input" name="pwd" >
      	   </div>
      </div>
      <div class="layui-form-item">
      	   <label class="layui-form-label">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</label>
      	   <div class="layui-input-inline">
      	   	   <input type="text" class="layui-input" name="truename" value="<?php echo $data['item']['truename']; ?>">
      	   </div>
      </div>
       <div class="layui-form-item">
      	   <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态</label>
      	   <div class="layui-input-inline">
      	   	   <input type="checkbox" class="layui-input" name="status" title="禁用" value="1" <?php echo !empty($data['item']['status'])?'checked' : ''; ?>>
      	   </div>
      </div>

    </form>
    <div class="layui-form-item">
    	<div class="layui-input-block">
    		<button class="layui-btn" onclick="save()">保存</button>
    	</div>
    </div>
      <script type="text/javascript">
      	  layui.use(['layer','form'],function(){
      	  	form = layui.form;
      	  	layer = layui.layer;

      	  	$ = layui.jquery;
      	  });

      	  function save(){
      	  	 var id = parseInt($('input[name="id"]').val());
      	  	 var username = $.trim($('input[name="username"]').val());
      	  	 var pwd = $.trim($('input[name="pwd"]').val());
      	  	 var truename = $.trim($('input[name="truename"]').val());
      	  	 var gid = ($('select[name="gid"]').val());
             if (username == '') {
             	layer.alert('請輸入用戶名',{icon:2});
             	return;
             }
             if (isNaN(id) && pwd == '') {
             	layer.alert('請輸入密碼',{icon:2});
             	return;
             }
             if (username == '') {
             	layer.alert('請輸入用戶名',{icon:2});
             	return;
             }
             if (gid == 0) {
             	layer.alert('請選擇角色',{icon:2});
             	return;
             }
             if (truename == '') {
             	layer.alert('請輸入姓名',{icon:2});
             	return;
             }
             $.post('../admin/save',$('form').serialize(),function(res){
                if (res.code>0) {
                	layer.alert(res.msg,{icon:2});
                }else{
                	layer.msg(res.msg);
                    setTimeout(function(){parent.window.location.reload();},1000);
                }
             },'json');
      	  }
      </script>
</body>
</html>