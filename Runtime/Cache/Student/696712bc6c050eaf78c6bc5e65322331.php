<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>我的队伍</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <link href="/CPS/Student/Public/css/style.css" rel="stylesheet">
</head>
<body>
   <div class="breadTab">
   <ol class="breadcrumb" style="background-color:#FFFFFF;">
    <li><a href="course_info.html">课程信息</a></li>
     <li><a href="myproject.html">我的课题</a></li>
     <li><a href="myteam.html">我的队伍</a></li>
     <li><a href="team_manage.html">队伍管理</a></li>
   </ol>
   </div>
   <div style="width: 1080px;">
       <table class="table table-bordered table table-striped text-center">
      <thead>
         <tr>
            <th>课程名称</th>
            <th>课程ID</th>
            <th>邀请信息</th>
            <th>处理状态</th>
            <th>操作</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td>综合课程设计1</td>
            <td>25615161</td>
            <td>学生20142202020001-xx邀请您加入队伍</td>
            <td>
               <p style="color:green">已同意</p>
            </td>
            <td>
               <a href="team_info.html"><button type="button" class="btn btn-primary">查看队伍</button></a>
            </td>
         </tr>

      </tbody>
      <tbody>
         <tr>
            <td>综合课程设计1</td>
            <td>25615161</td>
            <td>学生20142202020001-xx邀请您加入队伍</td>
            <td>
               <p style="color:blue">未处理</p>
            </td>
            <td>
               <button type="button" class="btn btn-success">同意</button>
               <button type="button" class="btn btn-danger">拒绝</button>
            </td>
         </tr>

      </tbody>
       </table>
   </div>

</body>
</html>