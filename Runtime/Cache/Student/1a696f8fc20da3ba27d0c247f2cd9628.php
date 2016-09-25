<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>队伍管理</title>
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
                    <span>当前学期：</span>
                    <img class="logo navbar-brand" src="/CPS/Public/img/logo.png">
                    <a id="course" class="navbar-brand nav-height" href="#" onclick="delaye()" style="color: white;">实验实践教学选课选题管理系统</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <!--                             <span class="dropdown">
                                                            <a style="color: #656565;text-decoration:none;" id="termList" role="button" data-toggle="dropdown" data-target="#" href="#">
                                                                <span id="termID">2016-2017-1</span><span class="caret"></span>
                                                            </a>
                                                            <ul id="term-dropdown" class="dropdown-menu" role="menu" aria-labelledby="termList">
                                                                <li><a onclick="changeTerm('2015-2016-1')" href="#">2015-2016-1</a></li><li><a onclick="changeTerm('2015-2016-2')" href="#">2015-2016-2</a></li><li><a onclick="changeTerm('2016-2017-1')" href="#">2016-2017-1</a></li>                                                            </ul>
                                                        </span> -->
                            <span class="dropdown">
                                <a id="termList" href="#term-dropdown" style="text-decoration: none;color:white;">
                                    <span id="termID">2016-2017-1</span><span class="caret"></span>
                                </a>
                                <ul id="term-dropdown" style="display: none;position: absolute;left: 0;top: 38px;border:1px solid #555;border-radius: 5px;background:#e6e6e6;padding:2px 5px; ">
                                    <li><a onclick="changeTerm('2015-2016-1')" href="#">2015-2016-1</a></li><li><a onclick="changeTerm('2015-2016-2')" href="#">2015-2016-2</a></li><li><a onclick="changeTerm('2016-2017-1')" href="#">2016-2017-1</a></li>                                </ul>
                            </span>
                            &nbsp;
                            <a style="float: right;" href="javascript:;">当前用户:&nbsp;李陈扬</a>
                            <!---->
                        </li>
                        <li><a href="#" onclick="delaye()" style="padding-right:0px;" id="lout">注销</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
  </div>
        <div id="breadTab" class="breadTab">
        <ol class="breadcrumb" style="background-color:#FFFFFF;">
         <li><a href="/CPS/index.php/Student/Stu/course_info">课程信息</a></li>
          <li><a href="/CPS/index.php/Student/Stu/myproject">我的课题</a></li>
          <li><a href="/CPS/index.php/Student/Stu/myteam">我的队伍</a></li>
          <li><a href="/CPS/index.php/Student/Stu/team_manage">队伍管理</a></li>
        </ol>
        </div>
        <div style="width: 1080px; margin: 0 auto;">
           <table class="table table-bordered table table-striped text-center">
           <thead>
              <tr>
                 <th>队伍ID</th>
                 <th>申请状态</th>
                 <th>队员</th>
              </tr>
           </thead>
           <tbody>
           <?php if(is_array($team)): foreach($team as $key=>$v): ?><tr>
                 <td name="group_id">
                     <?php echo ($v["group_id"]); ?>
                 </td>
                 <td>
                   <?php echo ($v["project_status"]); ?>
                 </td>
                 <td>
                 <form action="<?php echo ($teamMember_url); ?>" method="post" enctype="multipart/form-data">
                     <?php if(is_array($v["students"])): foreach($v["students"] as $key=>$h): ?><input type="text" style="border: none;outline: none;color:#000;background-color: transparent;" name="students" value="<?php echo ($h["student_id"]); ?>-<?php echo ($h["student_name"]); ?>"/>
                        <input type="submit" value="踢出" class="btn btn-danger kick-btn"/><br/><?php endforeach; endif; ?>
                  </form>
                 </td>
              </tr><?php endforeach; endif; ?>
           </tbody>
          </table>
        </div>

        <div>



        </div>
</body>
</html>