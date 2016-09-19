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
              <tr>
                 <td>综合课程设计1</td>
                 <td>25615161</td>
                 <td>基于安卓的开发平台</td>
                 <td>
                    415165
                 </td>
                 <td>
                    1452695-xx<br>
                    1235864-xx<br>
                    1698524-xx
                 </td>
                 <td>
                   <p style="color: green;">已通过</p>
                 </td>
                   <td>
                    <!-- 按钮触发模态框 -->
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">
                          管理
                    </button>

                    <!-- 模态框（Modal） -->
                     <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                 <tr>
                                                   <td>2014220202001-xx</td>
                                                   <td>
                                                       <button type="button" class="btn btn-danger">踢出</button>
                                                   </td>
                                                   </tr>
                                                   <tr>
                                                   <td>2014220202001-xx</td>
                                                   <td>
                                                       <button type="button" class="btn btn-danger">踢出</button>
                                                   </td>
                                                   </tr>
                                                   <tr>
                                                   <td>2014220202001-xx</td>
                                                   <td>
                                                       <button type="button" class="btn btn-danger">踢出</button>
                                                   </td>
                                                   </tr>
                                          </tbody>
                                       </table>
                                 </div>
                              </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                 </td>
              </tr>

           </tbody>
           <tbody>
              <tr>
                 <td>综合课程设计1</td>
                 <td>25615161</td>
                 <td>基于安卓的开发平台</td>
                 <td>
                    415165
                 </td>
                 <td>
                    1452695-xx<br>
                    1235864-xx<br>
                    1698524-xx
                 </td>
                 <td>
                   <p style="color: blue;">待审核</p>
                 </td>
                 <td>
                    <!-- 按钮触发模态框 -->
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal2">
                          管理
                    </button>
                    <br>
                    <button type="button" class="btn btn-danger">删除</button>

                     <!-- 模态框（Modal） -->
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                       <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                                          &times;
                                       </button>
                                       <h4 class="modal-title" id="myModalLabel2">
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
                                                 <tr>
                                                   <td>2014220202001-xx</td>
                                                   <td>
                                                       <button type="button" class="btn btn-danger">踢出</button>
                                                   </td>
                                                   </tr>
                                                   <tr>
                                                   <td>2014220202001-xx</td>
                                                   <td>
                                                       <button type="button" class="btn btn-danger">踢出</button>
                                                   </td>
                                                   </tr>
                                                   <tr>
                                                   <td>2014220202001-xx</td>
                                                   <td>
                                                       <button type="button" class="btn btn-danger">踢出</button>
                                                   </td>
                                                   </tr>
                                          </tbody>
                                       </table>
                                 </div>
                              </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                 </td>
              </tr>

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
                                 <h5>课程名称</h5>
                                 <input type="text"/>
                                 <h5>课题名称</h5>
                                 <input type="text"/>
                                 <h5>课题id</h5>
                                 <input type="text"/>
                                 <h5>邀请学生</h5>
                                 <input type="text"/>
                                 <span>
                                 <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModa">+</button>
                                 </span>
                                  <button class="btn btn-info" style="margin-left: 25px; margin-top: 5px;">申请学生组</button>
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
                                     <h5>学生姓名</h5>
                                     <input type="text"/>
                                     <h5>学生学号</h5>
                                     <input type="text"/>
                                      <button class="btn btn-info" style="margin-left: 25px; margin-top: 5px;">邀请</button>
                                 </div>
                              </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                 </div>
        </div>
</body>
</html>