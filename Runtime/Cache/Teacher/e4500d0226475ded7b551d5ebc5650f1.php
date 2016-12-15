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
	</ol>
</div>

  <div style="width: 1080px; margin: 0 auto">
    <table class="table table-bordered table-striped text-center">
     <thead>
      <tr>
       <th>课程名称</th>
       <th>课题ID</th>
       <th>课题名称</th>
       <th>主要任务内容</th>
       <th>预期成果形式</th>
       <th>预期成果目标</th>
       <th>评分</th>
       <th>评论</th>
       <th>状态</th>
       <th>操作</th>
     </tr>
   </thead>
   <tbody>
    <?php if(is_array($project_info)): foreach($project_info as $key=>$v): ?><tr>
         <td><?php echo ($v["course_name"]); ?></td>
         <td><?php echo ($v["project_id"]); ?></td>
         <td><?php echo ($v["project_name"]); ?></td>
         <td><?php echo ($v["main_project"]); ?></td>
         <td><?php echo ($v["final_expected_context"]); ?></td>
         <td>
            <?php echo ($v["final_expected_result"]); ?><br>
         </td>
         <?php if(($v["review_score"] == '') or ($v["review_context"] == '')): ?><td>--</td>
          <td>--</td>
         <?php else: ?>
          <td><?php echo ($v["review_score"]); ?></td>
          <td><?php echo ($v["review_context"]); ?></td><?php endif; ?>
           <?php if($v["project_status"] == 0): ?><td>
              <p style="color: red">拒绝</p>
            </td>
            <td>
              <button type="button" class="btn btn-success disabled">学生组</button>
              <button type="button" class="btn btn-info disabled">配置课题</button>
            </td>
           <?php elseif($v["project_status"] == 1): ?>
            <td>
              <p style="color: blue">待审核</p>
            </td>
            <td>
              <button type="button" class="btn btn-success disabled">学生组</button>
              <button type="button" class="btn btn-info disabled">配置课题</button>
            </td>
           <?php else: ?>
            <td>
              <p style="color: green">已通过</p>
            </td>
            <td>
              <a href="<?php echo ($stuGroup_url); ?>/project_id/<?php echo ($v["project_id"]); ?>"><button type="button" class="btn btn-success">学生组</button></a>
              <a href="<?php echo ($project_configure_url); ?>/project_id/<?php echo ($v["project_id"]); ?>/project_name/<?php echo ($v["project_name"]); ?>/course_id/<?php echo ($v["course_id"]); ?>"><button type="button" class="btn btn-info">配置课题</button></a>
            </td><?php endif; ?>
       </tr><?php endforeach; endif; ?>
   </tbody>
 </table>
</div>
</body>
</html>