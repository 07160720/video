<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp\wamp64\www\video\public/../application/admins\view\menu\index.html";i:1525091693;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/video/public/static/layui/css/layui.css">
    <script type="text/javascript" src="/video/public/static/layui/layui.js"></script>
    <meta charset="utf-8">
    <style type="text/css">
        .header span{background: #009688;margin-left: 10px;color: #ffffff}
        .header div{border-bottom: solid 2px #009688;margin-top: 8px;}
        .header button{float: right; margin-top: -5px;}
    </style>
</head>
<body>
     <div class="header">
      	  <span>菜单管理</span>
          <div></div>
      </div>
      <form class="layui-form">
      <table class="layui-table">
      	<?php if($pid>0): ?>
      	  <button class="layui-btn layui-btn-primary layui-btn-sm" style="float: right; margin: 5px 0px;" onclick="back(<?php echo $backid; ?>); return false;">返回上级</button>
      	<?php endif; ?> 
      	<input type="hidden" name="pid" value="<?php echo $pid; ?>">
      	  <thead>
      	  	   <tr>
      	  	   	   <th>ID</th>
      	  	   	   <th>排序</th>
      	  	   	   <th>菜单名称</th>
      	  	   	   <th>controller</th>
      	  	   	   <th>method</th>
      	  	   	   <th>是否隐藏</th>
      	  	   	   <th>是否禁用</th>
      	  	   	   <th></th>
      	  	   </tr>
      	  </thead>
      	  <tbody>
      	  	  <?php if(is_array($data['lists']) || $data['lists'] instanceof \think\Collection || $data['lists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['lists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      	  	   <tr>
      	  	   	   <td><?php echo $vo['mid']; ?></td>
      	  	   	   <td><input type="text" name="ords[<?php echo $vo['mid']; ?>]" class="layui-input" value="<?php echo $vo['ord']; ?>"</td>
      	  	   	   <td><input type="text" name="titles[<?php echo $vo['mid']; ?>]" class="layui-input" value="<?php echo $vo['title']; ?>"></td>
      	  	   	   <td><input type="text" name="controllers[<?php echo $vo['mid']; ?>]" class="layui-input" value="<?php echo $vo['controller']; ?>"></td>
      	  	   	   <td><input type="text" name="methods[<?php echo $vo['mid']; ?>]" class="layui-input" value="<?php echo $vo['method']; ?>"></td>
      	  	   	   <td><input type="checkbox" lay-skin="primary" name="ishiddens[<?php echo $vo['mid']; ?>]" title="隐藏" <?php echo !empty($vo['ishidden'])?'checked':''; ?>
      	  	   	   	value=1></td>
      	  	   	   <td><input type="checkbox" lay-skin="primary" name="status[<?php echo $vo['mid']; ?>]" title="禁用" <?php echo !empty($vo['status'])?'checked':''; ?>
      	  	   	   	value=1></td>m
                   <td><button class="layui-btn layui-btn-xs" onclick="child(<?php echo $vo['mid']; ?>);return false;">子菜单</button></td>
      	  	   </tr>
      	  	  <?php endforeach; endif; else: echo "" ;endif; ?>
      	  	   <tr>
      	  	       <td></td>
      	  	   	   <td><input type="text" name="ords[0]" class="layui-input"></td>
      	  	   	   <td><input type="text" name="titles[0]" class="layui-input"></td>
      	  	   	   <td><input type="text" name="controllers[0]" class="layui-input"></td>
      	  	   	   <td><input type="text" name="methods[0]" class="layui-input"></td>
      	  	   	   <td><input type="checkbox" lay-skin="primary" name="ishiddens[0]" title="隐藏" value=1></td>
      	  	   	   <td><input type="checkbox" lay-skin="primary" name="status[0]" title="禁用" value=1></td>
      	  	   	   <td></td>
      	  	   </tr>
      	  </tbody>
      </table>
      </form>
      <button class="layui-btn" onclick="save()">保存</button>
      <script type="text/javascript">
      	  layui.use(['layer','form'],function(){
      	  	  $ = layui.jquery;
              layer = layui.layer;
              form = layui.form;
      	 });
          
          // 子菜单
      	 function child(pid){
              window.location.href="../Menu/index?pid="+pid;
      	 }

      	 // 返回上一级
      	 function back(pid){
             window.location.href="../Menu/index?pid="+pid;
      	 }

      	 // 保存
      	 function save(){
             $.post('../menu/save',$('form').serialize(),function(res){
                 if (res.code>0) {
                     layer.alert(res.msg,{'icon':2});
                 }else{
                 	 layer.alert(res.msg,{'icon':1});
                 }
                 setTimeout(function(){window.location.reload();},1000);
             },'json');
      	 }
      </script>
</body>
</html>