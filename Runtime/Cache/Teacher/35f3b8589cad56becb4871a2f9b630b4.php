<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>管理员</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
   <script src="/CPS/Manager/Public/js/global.js"></script>
   <link href="/CPS/Manager/Public/css/style.css" rel="stylesheet">
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
                            <span>当前学期：</span>
                            <span class="dropdown">
                                <a id="termList" href="#term-dropdown" style="text-decoration: none;color:white;">
                                    <span id="termID">2016-2017-1</span><span class="caret"></span>
                                </a>
                                <ul id="term-dropdown" style="display: none;position: absolute;left: 0;top: 38px;border:1px solid #555;border-radius: 5px;background:#e6e6e6;padding:2px 5px; ">
                                    <li><a onclick="changeTerm('2015-2016-1')" href="#">2015-2016-1</a></li><li><a onclick="changeTerm('2015-2016-2')" href="#">2015-2016-2</a></li><li><a onclick="changeTerm('2016-2017-1')" href="#">2016-2017-1</a></li>
                                </ul>
                            </span>
                            &nbsp;
                            <a style="float: right;" href="javascript:;">当前用户:&nbsp;<?php echo ($_SESSION['name']); ?></a>
                            <!---->
                        </li>
                        <li><a href="<?php echo ($login_url); ?>" onclick="delaye()" style="padding-right:0px;" id="lout">注销</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
  </div>

    
    <form action="<?php echo ($edit_courseInfo_url); ?>" method="post" role="form">
      <div style="width: 400px; margin: 0 auto;">
        <div class="form-group">
          <label for="course_name">课程名称</label>
          <input type="text" class="form-control" name="list_course_name" value="<?php echo ($list_course_name); ?>" readonly>
        </div>
        <div class="form-group">
          <label for="reply_num">课题名称</label>
          <input type="text" class="form-control" name="modify_reply_num" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="group_num">指导教师</label>
          <input type="text" class="form-control" name="modify_group_num" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="teacher_max_course_num">主要任务</label>
          <input type="text" class="form-control" name="modify_teacher_max_course_num" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="stu_max_course_num">预期成果目标</label>
          <input type="text" class="form-control" name="modify_stu_max_course_num" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="stu_max_course_num">预期成果形式</label>
          <input type="text" class="form-control" name="modify_stu_max_course_num" placeholder="请输入">
        </div>
        <div>
          <button type="submit" class="btn btn-info" style="display: block; margin: 0 auto; width: 100px;">提交</button>
        </div>
      </div>
    </form>
</body>
</html>