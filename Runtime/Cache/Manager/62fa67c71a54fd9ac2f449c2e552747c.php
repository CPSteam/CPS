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
    <li><a href="/CPS/index.php/Manager/Manage/manage_info">课程</a></li>
	  <li><a href="javascript: history.back(-1)">文件信息</a></li>
    <li>文件配置</li>
  </ol>
</div>

  	<div style="width: 1080px; margin: 0 auto">
    <?php if(is_array($file_info)): foreach($file_info as $key=>$v): ?><div class="div_title_middle">
        <h4><?php echo ($v["file_type_name"]); ?></h4>
      </div>

      <table class="table table-bordered table-striped text-center">
       <thead>
          <tr>
             <th>截止日期</th>
             <th>文件类型</th>
             <th>限制大小(MB)</th>
          </tr>
       </thead>
       <tbody>
         <tr>
           <td>
           <?php echo ($v["file_deadline"]); ?>
           </td>
           <td><?php echo ($v["allowed_suffix_list"]); ?></td>
           <td><?php echo ($v["allowed_max_size"]); ?></td>
         </tr>
       </tbody>
      </table>
      <a href="<?php echo ($edit_file_url); ?>/file_type_name/<?php echo ($v["file_type_name"]); ?>/course_id/<?php echo ($course_id); ?>/file_type_id/<?php echo ($v["file_type_id"]); ?>">
        <button type="button" class="btn btn-info">编辑文件</button>
      </a><?php endforeach; endif; ?>
  </div>

</body>
</html>