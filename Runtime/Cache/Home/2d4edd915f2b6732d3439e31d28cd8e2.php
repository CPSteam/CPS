<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>重置密码</title>
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
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header inline">
                    <img class="logo navbar-brand" src="/CPS/Public/img/logo.png">
                    <a id="course" class="navbar-brand nav-height" href="#" onclick="delaye()" style="color: white;">实验实践教学选课选题管理系统</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a style="float: right;" href="<?php echo ($login_url); ?>">个人信息</a>
                            <!---->
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
  </div>

  
<div class="login-container">
      <form action="<?php echo ($login_url); ?>" method="post" class="form-sigin" enctype="multipart/form-data">
      <div class="title">
        <h3 class="form-sigin-heading"><span class="glyphicon glyphicon-user icon-size"></span>找回密码</h3>
      </div>
        <div class="border-container">
         <div class="input-group" >
            <span class="input-group-addon"><span>*账号</span></span>
            <input type="text" id="username" name="username" class="form-control input-margin" placeholder="请输入要找回的账号">
         </div>
         <div class="input-group">
            <span class="input-group-addon"><span>*密码</span></span>
            <input type="text" id="password" name="password" class="form-control input-margin" placeholder="请输入账号绑定的邮箱">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            <input name="verify" width="50%" height="34" class="form-control" style="width: 180px;" placeholder="验证码" type="text">                  
            <img width="30%" height="34" alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新" onclick="this.src=this.src+'?'+Math.random()">  
        </div>
        <button class="btn btn-lg btn-primary btn-block input-margin" type="submit">确定</button>
      </form>
      </div>
  </div>
</body>
</html>