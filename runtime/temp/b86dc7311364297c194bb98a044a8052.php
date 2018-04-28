<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp\wamp64\www\video\public/../application/admins\view\account\login.html";i:1524743856;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="/video/public/static/layui/css/layui.css">
  <script type="text/javascript" src="/video/public/static/layui/layui.js"></script>
  <meta charset="utf-8">
</head>
<body style="background: #1E9FFF">
  <form action="../account/dologin" method="post">
   <div style="position: absolute; left: 50%;top: 50%;width: 500px;margin-left: -250px;margin-top: -200px;">
      <div style="background: #ffffff;padding: 20px;border-radius: 4px;box-shadow: 5px 5px 20px #444444">
           <div class="layui-form" >
              <div class="layui-form-item">
                  <h2 style="color: gray;">后台管理系统</h2>  
              </div>
              <hr>
              <div class="layui-form-item">
                  <label class="layui-form-label" >用户名</label>
                  <div class="layui-input-block">
                     <input type="text" class="layui-input" name="username"  id="username" placeholder="请输入用户名" required lay-verify="required">
                  </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                  <div class="layui-input-block">
                     <input type="password" class="layui-input" name="password"  id="password" placeholder="请输入密码" required lay-verify="required">
                  </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">验证码</label>
                  <div class="layui-input-inline">
                      <input type="text" name="verifycode" id="verifycode" placeholder="请输入验证码"  class="layui-input" required lay-verify="required">
                  </div>
                  <img src="<?php echo captcha_src(); ?>" id="verifycode" alt="验证码"  onclick="this.src='<?php echo captcha_src(); ?>'">
              </div>
              <div class="layui-form-item">
                 <div class="layui-input-block">
                      <button class="layui-btn" type="submint">登录</button>
                 </div>
              </div>
           </div>
        </div>
    </div> 
  </form> 
  <script type="text/javascript">
    layui.use(['layer'],function(){
        $ = layui.jquery;
        layer = layui.layer;

        //用戶名控件獲取焦點
        $('#username').focus();
        // 回車登錄
        $('input').keydown(function(e){
             if (e.keyCode == 13) {
                  dologin();
             }
        });        
    });
  </script>
</body>
</html>