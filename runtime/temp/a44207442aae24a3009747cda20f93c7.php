<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp\wamp64\www\video\public/../application/admins\view\roles\index.html";i:1525516511;}*/ ?>
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
                <th>角色名称</th>
                <th>操作</th>
            </tr>
         </thred>
         <tbody>
          <?php if(is_array($data['roles']) || $data['roles'] instanceof \think\Collection || $data['roles'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['roles'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
             <tr>
                <td><?php echo $vo['gid']; ?></td> 
                <td><?php echo $vo['title']; ?></td>
                <td>
                    <button class="layui-btn layui-btn-xs" onclick="add(<?php echo $vo['gid']; ?>)">編輯</button>
                    <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $vo['gid']; ?>)">刪除</button>
                </td>
             </tr>
           <?php endforeach; endif; else: echo "" ;endif; ?>
         </tbody>
      </table>

      <script type="text/javascript">
         layui.use(['layer'],function(){
          $ =layui.jquery;
          layer = layui.layer;
         });

         //添加角色
         function add(gid){
           //iframe层
            layer.open({
                type: 2,
                title: gid>0?'编辑角色':'添加角色',  
                shade: 0.3,
                area: ['480px', '420px'],
                content: '../roles/add?gid='+gid
            }); 
         }
       
         // 添加刪除
         function del(gid){
           //询问框
           layer.confirm('確定要刪除嗎？', {
             icon:3,
             btn: ['確定','取消'] //按钮
             }, function(){
                $.post('../roles/deletes',{'gid':gid},function(res){
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