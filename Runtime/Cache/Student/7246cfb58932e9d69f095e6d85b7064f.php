<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>课程</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
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
                            <span>当前学期：</span>
                            <span class="dropdown">
                                <a id="termList" href="#term-dropdown" style="text-decoration: none;color:white;">
                                    <span id="termID">2016-2017-1</span><span class="caret"></span>
                                </a>
                                <ul id="term-dropdown" style="display: none;position: absolute;left: 0;top: 38px;border:1px solid #555;border-radius: 5px;background:#e6e6e6;padding:2px 5px; ">
                                    <li><a onclick="changeTerm('2015-2016-1')" href="#">2015-2016-1</a></li><li><a onclick="changeTerm('2015-2016-2')" href="#">2015-2016-2</a></li><li><a onclick="changeTerm('2016-2017-1')" href="#">2016-2017-1</a></li>                                </ul>
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
    <li><a href="/CPS/index.php/Student/Stu/course_info">课程信息</a></li>
    <li><a href="/CPS/index.php/Student/Stu/myproject">我的课题</a></li>
    <li><a href="/CPS/index.php/Student/Stu/myteam">我的队伍</a></li>
    <li><a href="/CPS/index.php/Student/Stu/team_manage">队伍管理</a></li>
  </ol>
  </div>
        <div style="width: 1080px; margin: 0 auto">
          <table class="table table-bordered table table-striped text-center">
           <thead>
              <tr>
                 <th>课程名称</th>
                 <th>课题名称</th>
                 <th>指导教师</th>
                 <th>队伍ID</th>
                 <th>队员</th>
                 <th>课题详情</th>
              </tr>
           </thead>
           <tbody>
           <?php if($projectid == 0): ?><tr>
                   <td>--</td>
                   <td>--</td>
                   <td>--</td>
                   <td><?php echo ($teamgroup_id); ?></td>
                   <td>
                   <?php if(is_array($group_member)): foreach($group_member as $key=>$m): echo ($m["student_id"]); ?>-<?php echo ($m["student_name"]); ?><br/><?php endforeach; endif; ?>
                   </td>
                    <td>--</td>
                </tr>
           <?php else: ?>
             <?php if(is_array($teamInfo)): foreach($teamInfo as $key=>$v): ?><tr>
                   <td><?php echo ($v["course_name"]); ?></td>
                   <td><?php echo ($v["project_name"]); ?></td>
                   <td>
                      <?php echo ($v["teacher_id"]); ?>
                   </td>
                   <td>
                     <?php echo ($v["group_id"]); ?>
                   </td>
                   <td>
                   <?php if(is_array($group_member)): foreach($group_member as $key=>$m): echo ($m["student_id"]); ?>-<?php echo ($m["student_name"]); ?><br/><?php endforeach; endif; ?>
                   </td>
                    <td>
                     <a href="#">查看</a>
                   </td>
                </tr><?php endforeach; endif; endif; ?>
           </tbody>
         </table>
        </div>
</body>
</html>