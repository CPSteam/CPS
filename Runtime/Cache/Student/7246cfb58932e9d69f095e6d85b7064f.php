<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>队伍信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
   <script src="/CPS/Public/bootstrap/js/jquery.js"></script>
   <link href="/CPS/Student/Public/css/style.css" rel="stylesheet">
</head>
<body>
        <div id="breadTab">
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
                 <th>课题名称</th>
                 <th>指导教师</th>
                 <th>队伍ID</th>
                 <th>队员</th>
                 <th>课题详情</th>
                 <th>申请状态</th>
              </tr>
           </thead>
           <tbody>
              <tr>
                 <td>综合课程设计1</td>
                 <td>25615161</td>
                 <td>基于安卓的开发平台</td>
                 <td>
                    xxx
                 </td>
                 <td>
                   102658
                 </td>
                 <td>
                    1452695-xx<br>
                    1235864-xx<br>
                    1698524-xx
                 </td>
                  <td>
                   <a href="#">查看</a>
                 </td>
                 <td>
                    <p style="color:green">已通过</p>
                 </td>
              </tr>

           </tbody>
            <tbody>
              <tr>
                <td>综合课程设计1</td>
                 <td>25615161</td>
                 <td>基于安卓的开发平台</td>
                 <td>
                    xxx
                 </td>
                 <td>
                   102658
                 </td>
                 <td>
                    1452695-xx<br>
                    1235864-xx<br>
                    1698524-xx
                 </td>
                  <td>
                    <a href="#">查看</a>
                 </td>
                 <td>
                    <p style="color:blue">待审核</p>
                 </td>
              </tr>

           </tbody>
            </table>
        </div>
</body>
</html>