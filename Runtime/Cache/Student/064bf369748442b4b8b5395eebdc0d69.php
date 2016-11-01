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
                 <th>队员管理</th>
              </tr>
           </thead>
           <tbody>
           <?php if(is_array($team)): foreach($team as $key=>$v): ?><tr>
                 <td name="group_id">
                     <?php echo ($v["group_id"]); ?>
                 </td>
                 <td>
                   <?php echo ($v["group_project_status"]); ?>
                 </td>
                 <td>
                   <?php if(is_array($v["students"])): foreach($v["students"] as $key=>$h): echo ($h["student_id"]); ?>-<?php echo ($h["student_name"]); ?><br/><?php endforeach; endif; ?>
                 </td>
                 <td>
                   <button type="button" class="btn btn-danger kick-btn danger-button" data-toggle="modal" data-target="#myModa1">踢出队员</button><br/>
                   <!-- 模态框（Modal） -->
                      <div class="modal fade" id="myModa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                                        &times;
                                     </button>
                                     <h4 class="modal-title" id="myModalLabel3">
                                     队员管理
                                     </h4>
                                  </div>
                               <div class="modal-body">
                               <div class="stugroup">
                                   <form action="<?php echo ($teamMember_url); ?>" method="post" enctype="multipart/form-data">
                                       <h5 style="text-align: center;">请确认想要踢除的学生学号</h5>
                                       <input type="text" name="student_id" class="form-control"/>
                                       <input type="hidden" name="group_id" value="<?php echo ($v["group_id"]); ?>"/>
                                       <input type="submit" class="btn btn-danger width-input" value="确定">
                                       </form>
                                    </div>
                               </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal -->
                  </div>
                     <button class="btn btn-info" data-toggle="modal" data-target="#myModa2">邀请队友</button>
                    <!-- 模态框（Modal） -->
                     <div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                               <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                                                  &times;
                                               </button>
                                               <h4 class="modal-title" id="myModalLabel">
                                               邀请队员
                                               </h4>
                                            </div>
                                         <div class="modal-body">
                                           <div class="stugroup">
                                               <form action="<?php echo ($teamMember_url); ?>" method="get" enctype="multipart/form-data">
                                               <h5 style="text-align: center;">学生学号</h5>
                                               <input type="text" class="form-control" name="studentId"/>
                                               <input type="hidden" name="get_group_id" value="<?php echo ($v["group_id"]); ?>">
                                               <input type="submit" class="btn btn-info width-input" value="邀请">
                                               </form>
                                            </div>
                                         </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                       </div>
                 </td>
              </tr><?php endforeach; endif; ?>
           </tbody>
          </table>
        </div>
      <div>
    </div>
</body>
</html>