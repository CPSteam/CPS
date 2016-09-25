<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>课程</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <link href="/CPS/Student/Public/css/style.css" rel="stylesheet">
</head>
<body>
<div class="breadTab">
<ol class="breadcrumb" style="background-color:#FFFFFF;">
  <li><a href="/CPS/index.php/Student/Stu/course_info">课程信息</a></li>
  <li><a href="/CPS/index.php/Student/Stu/myproject">我的课题</a></li>
  <li><a href="/CPS/index.php/Student/Stu/myteam">我的队伍</a></li>
  <li><a href="/CPS/index.php/Student/Stu/team_manage">队伍管理</a></li>
</ol>
</div>
<div style="width: 1080px;">
	<table class="table table-bordered table table-striped text-center">
   <thead>
      <tr>
         <th>课程名称</th>
         <th>课程ID</th>
         <th>课程内容</th>
         <th>课题信息</th>
      </tr>
   </thead>
   <tbody>
   <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
         <td><?php echo ($v["course_name"]); ?></td>
         <td><?php echo ($v["course_id"]); ?></td>
         <td>
         	<p><?php echo ($v["course_detail_info"]); ?></p>
         </td>
         <td>
         	<a href="<?php echo ($query_url); ?>/course_id/<?php echo ($v["course_id"]); ?>"><button type="button" class="btn btn-info">查看</button></a>
         </td>
      </tr><?php endforeach; endif; ?>
   </tbody>
	</table>
</div>

</body>
</html>