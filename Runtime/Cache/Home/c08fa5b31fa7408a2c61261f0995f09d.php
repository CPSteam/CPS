<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>用户登录</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
   <script src="/CPS/Home/Public/js/global.js"></script>
   <link href="/CPS/Home/Public/css/global.css" rel="stylesheet">
   <script src="/CPS/Student/Public/js/global.js"></script>
   <link href="/CPS/Student/Public/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="navWrap">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="navbar-header inline">
                    <img class="logo navbar-brand" src="/CPS/Public/img/logo.png">
                    <a id="course" class="navbar-brand nav-height" href="#" onclick="delaye()" style="color: white;">实验实践教学选课选题管理系统</a>
                </div>
            </div>
        </div>
    </nav>
  </div>

  
<div class="login-container">
      <form action="/CPS/index.php/Home/Login/login" method="post" class="form-sigin" enctype="multipart/form-data">
      <div class="title">
        <h3 class="form-sigin-heading"><span class="glyphicon glyphicon-user icon-size"></span>登陆</h3>
      </div>
        <div class="border-container">
         <div class="input-group" >
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" name="student_id" class="form-control input-margin" placeholder="用户名">
         </div>
         <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" name="password" class="form-control input-margin" placeholder="密码">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            <input name="verify" width="50%" height="34" class="form-control" style="width: 180px;" placeholder="验证码" type="text">                  
            <img width="30%" height="34" alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新" onclick="this.src=this.src+'?'+Math.random()">  
        </div>
        <p class="text-left remove-margin"><a href="<?php echo ($reset_url); ?>" ><small>忘记密码？</small></a></p>
        <button class="btn btn-lg btn-primary btn-block input-margin" type="submit">登陆</button>
      </form>
      </div>
  </div>
</body>
</html>