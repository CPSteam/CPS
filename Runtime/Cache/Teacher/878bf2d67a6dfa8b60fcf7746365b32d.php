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

    <div class="breadTab clearfloat">
	<ol class="breadcrumb" style="background-color:#FFFFFF;">
		<li><a href="/CPS/index.php/Teacher/Professor/course_info">课程</a></li>
		<li>申请课题</li>
	</ol>
</div>

    <form action="/CPS/index.php/Teacher/Professor/teacher_apply_file_upload" method="post" enctype="multipart/form-data">
      <div style="width: 400px; margin: 0 auto;">
        <div class="form-group">
          <label for="course_name">课程名称</label>
          <input type="text" class="form-control" name="course_name" value="<?php echo ($course_name); ?>" readonly="readonly">
        </div>
        <div class="form-group">
          <label for="project_name">课题名称</label>
          <input type="text" class="form-control" name="project_name" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="teacher_name">指导教师</label>
          <input type="text" class="form-control" name="teacher_name" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="main_project">主要任务</label>
          <input type="text" class="form-control" name="main_project" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="final_expected_result">预期成果目标</label>
          <input type="text" class="form-control" name="final_expected_result" placeholder="请输入">
        </div>
        <div class="form-group">
          <label for="final_expected_context">预期成果形式</label>
          <textarea class="form-control" rows="3" name="final_expected_context" placeholder="请输入"></textarea>
        </div>
        <div class="form-group">
          <label for="teacher_apply_project_file">附件</label>
          <input type="file" class="form-control" name="teacher_apply_project_file">
        </div>
        <div>
          <button type="submit" class="btn btn-info" style="display: block; margin: 0 auto; width: 100px;">提交</button>
        </div>
      </div>
    </form>
</body>
</html>