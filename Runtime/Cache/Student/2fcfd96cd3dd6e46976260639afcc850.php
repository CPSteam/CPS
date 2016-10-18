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
    <div>
        <h3 style="text-align: center;">申请课题</h3><br/>
        <div class="stugroup" style="text-align: left;margin:0 auto;">
        <form action="<?php echo ($teamMember_url); ?>" method="get" enctype="multipart/form-data">
         <h5>课程名称</h5>
         <input type="text" class="form-control" placeholder="<?php echo ($v["course_name"]); ?>" />
         <h5>课题名称</h5>
         <input type="text" class="form-control" placeholder="<?php echo ($v["project_name"]); ?>" />
         <h5>课题id</h5>
         <input type="text" class="form-control" placeholder="<?php echo ($v["project_id"]); ?>"/>
         <h5>学生组</h5>
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModa1">选择学生组</button><br/>
         <!-- 模态框（Modal） -->
            <div class="modal fade" id="myModa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                           <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                              &times;
                           </button>
                           <h4 class="modal-title" id="myModalLabel3">
                           学生组列表
                           </h4>
                        </div>
                     <div class="modal-body">
                     <div class="stugroup">
                         <form action="<?php echo ($teamMember_url); ?>" method="post" enctype="multipart/form-data">
                             <h5 style="text-align: left;">请选择学生组</h5>
                             <input type="text" name="student_id" class="form-control"/>
                             <input type="submit" class="btn btn-info width-input" value="确定">
                             </form>
                          </div>
                     </div>
                  </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
         <h5>提交附件</h5>
         <input type="file">
         <br>
         <button class="btn btn-info" style="margin-left: 60px;" type="submit">提交</button>
         </form>
        </div>
    </div>
</body>
</html>