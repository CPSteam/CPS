<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>队伍管理</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
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
                 <th>队伍ID</th>
                 <th>队员</th>
                 <th>申请状态</th>
                 <th>队伍操作</th>
              </tr>
           </thead>
           <tbody>
           <?php if(is_array($team)): foreach($team as $key=>$v): ?><tr>
                 <td><?php echo ($v["course_name"]); ?></td>
                 <td><?php echo ($v["course_id"]); ?></td>
                 <td><?php echo ($v["project_name"]); ?></td>
                 <td>
                     <?php echo ($v["group_id"]); ?>
                 </td>
                 <td>
                     <?php if(is_array($studentid)): foreach($studentid as $key=>$h): echo ($h["student_id"]); ?>-<?php echo ($h["student_name"]); ?><br/><?php endforeach; endif; ?>
                 </td>
                 <td>
                   <?php echo ($v["project_status"]); ?>
                 </td>
                   <td>
                    <!-- 按钮触发模态框 -->
                    <!--<button class="btn btn-info" data-toggle="modal" data-target="#myModal1">-->
                          <!--管理-->
                    <!--</button>-->
                       <?php echo ($v["group_manage"]); ?>

                    <!-- 模态框（Modal） -->
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                       <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                                          &times;
                                       </button>
                                       <h4 class="modal-title" id="myModalLabel1">
                                       管理队员
                                       </h4>
                                    </div>
                                 <div class="modal-body">
                                      <table class="table table-bordered table table-striped text-center">
                                           <thead>
                                                 <tr>
                                                    <th>组员</th>
                                                    <th>操作</th>
                                                 </tr>
                                           </thead>
                                           <tbody>
                                           <?php if(is_array($studentid)): foreach($studentid as $key=>$v): ?><form action="/CPS/index.php/Student/Stu/team_manage" type="get">
                                                 <tr>
                                                   <td name="student_id">
                                                       <input type="text" style="border: none;outline: none;color:#000;background-color: transparent;" name="student_id" value="<?php echo ($v["student_id"]); ?>-<?php echo ($v["student_name"]); ?>"/>
                                                   </td>
                                                   <td>
                                                       <input type="submit" value="踢出" class="btn btn-danger"/>
                                                   </td>
                                                   </tr>
                                               </form><?php endforeach; endif; ?>
                                          </tbody>
                                       </table>
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
         <button class="btn btn-info" data-toggle="modal" data-target="#myModa3">创建队伍</button>
         <!-- 模态框（Modal） -->
                    <div class="modal fade" id="myModa3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                   <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                                      &times;
                                   </button>
                                   <h4 class="modal-title" id="myModalLabel3">
                                   管理队员
                                   </h4>
                                </div>
                             <div class="modal-body">
                             <div class="stugroup">
                                 <form action="/CPS/index.php/Student/Stu/team_manage" method="post" enctype="multipart/form-data">
                                 <h5>课程名称</h5>
                                 <input type="text" name="course_name"/>
                                 <h5>课题名称</h5>
                                 <input type="text" name="project_name"/>
                                 <h5>课题id</h5>
                                 <input type="text" name="project_id"/>
                                 <h5>
                                     邀请学生
                                 <span>
                                    <button type="button"  class="btn btn-default"  data-toggle="modal" data-target="#myModa">+</button>
                                 </span>
                                 </h5>
                                 <br/>
                                 <input type="submit" class="btn btn-info" style="margin-left: 25px; margin-top: 5px;" value="申请学生组">
                                 </form>
                                  </div>
                             </div>
                          </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>

             <div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                     <!--<h5>学生姓名</h5>-->
                                     <!--<input type="text"/>-->
                                     <form action="/CPS/index.php/Student/Stu/team_manage" method="post" enctype="multipart/form-data">
                                     <h5>学生学号</h5>
                                     <input type="text" name="student_id"/>
                                     <input type="submit" class="btn btn-info" style="margin-left: 25px; margin-top: 5px;" value="邀请">
                                     </form>
                                 </div>
                              </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                 </div>
        </div>
</body>
</html>