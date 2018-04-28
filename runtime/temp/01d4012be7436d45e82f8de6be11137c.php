<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp\wamp64\www\video\public/../application/admins\view\admin\index.html";i:1524840462;}*/ ?>
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
<body style="padding: 10px">
      <div class="header">
      	  <span>管理員列表</span>
          <button class="layui-btn layui-btn-sm" onclick="add()">添加</button>
          <div></div>
      </div>
      <table class="layui-table">
         <thred>
            <tr>
                <th>ID</th>
                <th>用戶名</th>
                <th>真實姓名</th>
                <th>角色</th>
                <th>狀態</th>
                <th>添加時間</th>
                <th>操作</th>
            </tr>
         </thred>
         <tbody>
          <?php if(is_array($data['lists']) || $data['lists'] instanceof \think\Collection || $data['lists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['lists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
             <tr>
                <td><?php echo $vo['id']; ?></td> 
                <td><?php echo $vo['username']; ?></td>
                <td><?php echo $vo['truename']; ?></td>
                <td><?php echo isset($data['groups'][$vo['gid']])?$data['groups'][$vo['gid']]['title']:''; ?></td>
                <td><?php echo $vo['status']==0?'正常':'<span style="color: red">禁用</span>'; ?></td>
                <td><?php echo date('Y-m-d H:i:s',$vo['add_time']); ?></td>
                <td>
                    <button class="layui-btn layui-btn-xs" onclick="add(<?php echo $vo['id']; ?>)">編輯</button>
                    <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $vo['id']; ?>)">刪除</button>
                </td>
             </tr>
           <?php endforeach; endif; else: echo "" ;endif; ?>
         </tbody>
      </table>

      <script type="text/javascript">
         layui.use(['layer'],function(){
          $ =layui.jquery;
         });

         //添加編輯
         function add(id){
           //iframe层
            layer.open({
                type: 2,
                title: id>0?'編輯管理员':'添加管理員',  
                shade: 0.3,
                area: ['480px', '420px'],
                content: '../admin/add?id='+id
            }); 
         }
       
         // 添加刪除
         function del(id){
           //询问框

           layer.confirm('確定要刪除嗎？', {
             btn: ['確定','取消'] //按钮
             }, function(){
                $.post('../admin/delete',{'id':id},function(res){
                    if (res.code>0) {
                       layer.alert(res.msg,{icon:2});
                    }else{
                       layer.msg(res.msg);
                       setTimeout(function(){window.location.reload()},1000);
                    }
                },'json');
            });
         }
      </script>
</body>
</html>