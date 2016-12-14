<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
 <title>教授</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
 <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
 <script src="/CPS/Teacher/Public/js/global.js"></script>
 <link href="/CPS/Teacher/Public/css/style.css" rel="stylesheet">
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
		<li><a href="/CPS/index.php/Teacher/Professor/my_project">我的课题</a></li>
		<li>配置课题信息</li>
	</ol>
</div>

  <div style="width: 1080px; margin: 0 auto">
    <form action="<?php echo ($course_file_conf_url); ?>" method="post" role="form">
      <div style="width: 400px; margin: 0 auto;">
        <div class="form-group">
          <label for="doc_name">课题名称</label>
          <input type="text" disabled="disabled" class="form-control" name="file_project_name" value="<?php echo ($file_project_name); ?>">
          <input type="hidden" class="form-control" name="file_project_id" value="<?php echo ($file_project_id); ?>">
          <input type="hidden" class="form-control" name="file_course_id" value="<?php echo ($file_course_id); ?>">
        </div>
        <div class="form-group">
          <label for="name">考核类型</label>
          <select class="form-control" name="file-type">
            <option>平时报告</option>
            <option>期中报告</option>
            <option>结题报告</option>
          </select>
        </div>
        <div class="form-group">
          <div>
            <label for="doc_type">文件类型</label>
          </div>
          <label class="checkbox-inline">
            <input type="checkbox" name="allowed_suffix_doc" value="doc">doc
          </label> 
          <label class="checkbox-inline">
            <input type="checkbox" name="allowed_suffix_docx" value="docx">docx
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="allowed_suffix_zip" value="zip">zip
          </label>
          <label></label>
        </div>
        <div class="form-group">
          <label for="deadline">截止日期</label>
          <input type="date" class="form-control" name="file_deadline">
        </div>
        <div class="form-group">
          <label for="size_limit">大小限制（单位：MB）</label>
          <input type="text" class="form-control" name="allowed_max_size" placeholder="请输入">
        </div>
          <button type="submit" class="btn btn-info" style="display: block; margin: 0 auto; width: 100px;">提交</button>
        </div>
      </div>
    </form>
</div>
</body>
</html>