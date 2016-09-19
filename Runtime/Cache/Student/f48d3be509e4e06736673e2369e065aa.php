<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>课题信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
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
                 <th>课题名称</th>
                 <th>课题ID</th>
                 <th>指导教师</th>
                 <th>课题详情</th>
                 <th>操作</th>
              </tr>
           </thead>
           <tbody>
              <tr>
                 <td>综合课程设计1</td>
                 <td>25615161</td>
                 <td>基于安卓的开发平台</td>
                  <td>621655</td>
                 <td>xxx</td>
                 <td>
                   <a href="#">查看</a>
                 </td>
                 <td>
                     <!-- 按钮触发模态框 -->
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">
                          申请
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
                                    <div class="stugroup" style="text-align: left;">
                                     <h5>课程名称</h5>
                                     <input type="text"/>
                                     <h5>课题名称</h5>
                                     <input type="text"/>
                                     <h5>课题id</h5>
                                     <input type="text"/>
                                     <h5>选择学生组</h5>
                                     <button>创建学生组</button>
                                     <h5>提交附件</h5>
                                     <input type="file" id="inputfile">
                                     <br>
                                      <button class="btn btn-info" style="margin-left: 40px;">提交</button>
                                      </div>
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
                  <td>621655</td>
                 <td>xxx</td>
                 <td>
                   <a href="#">查看</a>
                 </td>
                 <td>
                     <!-- 按钮触发模态框 -->
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal2">
                          申请
                    </button>

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
                                    <div class="stugroup" style="text-align: left;">
                                     <h5>课程名称</h5>
                                     <input type="text"/>
                                     <h5>课题名称</h5>
                                     <input type="text"/>
                                     <h5>课题id</h5>
                                     <input type="text"/>
                                     <h5>选择学生组</h5>
                                     <button>创建学生组</button>
                                     <h5>提交附件</h5>
                                     <input type="file">
                                     <br>
                                      <button class="btn btn-info" style="margin-left: 40px;">提交</button>
                                      </div>
                                 </div>
                              </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                 </td>
              </tr>

           </tbody>
        </table>
    </div>

</body>
</html>