<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>我的课题</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
	<script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
	<script src="/CPS/Student/Public/js/global.js"></script>
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
		<!-- <div class="toggle-control">
			<a href="#"></a>
		</div> -->
		<table class="table table-bordered table table-striped text-center">
				<thead>
					<tr>
						<th>课程名称</th>
						<th>课程ID</th>
						<th>课题名称</th>
						<th>课题ID</th>
						<th>指导教师</th>
						<th>详情</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
			<tbody id="collapse">
			<?php if(is_array($projectInfo)): foreach($projectInfo as $key=>$v): ?><tr>
					<td><?php echo ($v["course_name"]); ?></td>
					<td><?php echo ($v["course_id"]); ?></td>
					<td><?php echo ($v["project_name"]); ?></td>
					<td><?php echo ($v["project_id"]); ?></td>
					<td><?php echo ($v["teacher_id"]); ?></td>
					<td>
						<a href="#">查看</a>
					</td>
					<td>
						 <?php echo ($v["project_status"]); ?>
					</td>
					<td>
						 <a href="<?php echo ($projectInfo_url); ?>/project_id/<?php echo ($v["project_id"]); ?>"><button type="button" class="btn btn-info" >查看报告</button></a>
					</td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</body>
</html>