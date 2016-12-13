<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
 <title>课程</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
 <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
 <script src="/CPS/Teacher/Public/js/global.js"></script>
 <link href="/CPS/Teacher/Public/css/style.css" rel="stylesheet">
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
		<li><a href="/CPS/index.php/Teacher/Professor/course_info">课程</a></li>
		<li>审核课题</li>
	</ol>
</div>

  <div style="width: 1080px; margin: 0 auto">
  	<table class="table table-bordered table-striped text-center">
     <thead>
      <tr>
       <th>序号</th>
       <th>教师姓名</th>
       <th>教师ID</th>
       <th>课题名称</th>
       <th>状态</th>
       <th>详情</th>
       <th>评审课题</th>
       <th>操作</th>
     </tr>
   </thead>
   <tbody>
     <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
       <td><?php echo ($v["project_id"]); ?></td>
       <td><?php echo ($v["teacher_name"]); ?></td>
       <td><?php echo ($v["teacher_id"]); ?></td>
       <td><?php echo ($v["project_name"]); ?></td>
       <?php if($v["project_status"] == 1): ?><td><p style="color: blue;">待审核</p></td>
         <td>
          <?php echo ($v["main_project"]); ?><br>
          <a href="/CPS/index.php/Teacher/Professor/project_file_download?course_name=<?php echo ($v["course_name"]); ?>&project_name=<?php echo ($v["project_name"]); ?>">详情</a>
         </td>
         <td>
          <?php if(($v["review_score"] == '') or ($v["review_context"] == '')): ?><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModa1<?php echo ($v["project_id"]); ?>">评审</button>
          <?php else: ?>
            <button type="button" class="btn btn-info disabled">评审</button><?php endif; ?>
         </td>
         <?php if(($v["review_score"] == '') or ($v["review_context"] == '')): ?><td>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#review_error">同意</button><br>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#review_error">拒绝</button>
              <!-- 模态框（Modal） -->
                  <div class="modal fade" id="review_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                                    &times;
                                 </button>
                                 <h4 class="modal-title" id="myModalLabel3">
                                 评审错误
                                 </h4>
                              </div>
                           <div class="modal-body">
                            <div style="width: 200px;margin: 0 auto">
                                <h3 style="color: red">请先完成评审！</h3>
                            </div>
                           </div>
                        </div><!-- /.modal-content -->
                  </div><!-- /.modal -->
                </div>
           </td>
         <?php else: ?>
           <td>
            <a href="<?php echo ($teacher_project_applied_url); ?>/project_id/<?php echo ($v["project_id"]); ?>/course_id/<?php echo ($course_id); ?>/accept_status/1"><button type="button" class="btn btn-success">同意</button></a><br>
            <a href="<?php echo ($teacher_project_applied_url); ?>/project_id/<?php echo ($v["project_id"]); ?>/course_id/<?php echo ($course_id); ?>/accept_status/0"><button type="button" class="btn btn-danger">拒绝</button></a>
          </td><?php endif; ?>
       <?php elseif($v["project_status"] == 2): ?>
         <td><p style="color: green;">已通过</p></td>
         <td>
            <?php echo ($v["main_project"]); ?><br>
            <a href="/CPS/index.php/Teacher/Professor/project_file_download?course_name=<?php echo ($v["course_name"]); ?>&project_name=<?php echo ($v["project_name"]); ?>">详情</a>
         </td>
          <td>
            <button type="button" class="btn btn-info disabled">评审</button>
           </td>
           <td>
            <a href="#"><button type="button" class="btn btn-success disabled">同意</button></a>
          </td>
       <?php else: ?>
          <td><p style="color: red;">拒绝</p></td>
          <td>
            <?php echo ($v["main_project"]); ?><br>
            <a href="/CPS/index.php/Teacher/Professor/project_file_download?course_name=<?php echo ($v["course_name"]); ?>&project_name=<?php echo ($v["project_name"]); ?>">详情</a>
          </td>
          <td>
            <button type="button" class="btn btn-info disabled">评审</button>
           </td>
           <td>
            <a href="#"><button type="button" class="btn btn-danger disabled">拒绝</button></a>
          </td><?php endif; ?>
    </tr>
    <!-- 模态框（Modal） -->
      <div class="modal fade" id="myModa1<?php echo ($v["project_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                        &times;
                     </button>
                     <h4 class="modal-title" id="myModalLabel3">
                     评审课题
                     </h4>
                  </div>
               <div class="modal-body">
                <div style="width: 200px;height:260px;margin: 0 auto">
                      <form action="<?php echo ($teacher_project_applied_url); ?>" method="post" enctype="multipart/form-data"> 
                        <h5 style="text-align: left;">评分</h5>
                        <input type="text" name="review_score" class="form-control" placeholder="请输入评分" />
                        <input type="text" name="review_project_id" value="<?php echo ($v["project_id"]); ?>" hidden="hidden">
                        <input type="text" name="review_course_id" value="<?php echo ($course_id); ?>" hidden="hidden">
                        <h5 style="text-align: left;">评论</h5>
                        <textarea class="form-control" name="review_context" rows="4" placeholder="请输入评语"></textarea>
                        <h6 style="color: red;">注：提交过后不能再修改！</h6>
                        <button class="btn btn-info" style="margin-left: 0px;" type="submit">提交</button>
                      </form>
                  </div>
               </div>
            </div><!-- /.modal-content -->
      </div><!-- /.modal -->
    </div><?php endforeach; endif; ?>
</tbody>
</table>
</div>
</body>
</html>