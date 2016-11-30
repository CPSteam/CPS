<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>管理员</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script src="/CPS/Public/bootstrap/js/jquery.min.js"></script>
   <link href="/CPS/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/CPS/Public/bootstrap/js/bootstrap.min.js"></script>
   <script src="/CPS/Manager/Public/js/global.js"></script>
   <link href="/CPS/Manager/Public/css/style.css" rel="stylesheet">
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
     <li><a href="/CPS/index.php/Manager/Manage/manage_info">课程</a></li>
     <li><a href="javascript: history.back(-1)">答辩组信息</a></li>
	 <li>分配学生组</li>
  </ol>
</div>

    <div style="width: 1080px; margin: 0 auto">
    <table class="table table-bordered table table-striped text-center">
       <thead>
          <tr>
             <th>答辩组id</th>
             <th>答辩组组长</th>
             <th>答辩组成员</th>
          </tr>
       </thead>
       <tbody>
       <?php if(is_array($reply_group_info)): foreach($reply_group_info as $key=>$v): ?><tr>
             <td>
               <?php echo ($v["reply_group_id"]); ?>
             </td>
             <td>
               <?php echo ($v["group_leader_id"]); ?>
             </td>
             <td>
               <?php if(is_array($v["reply_groupMember"])): foreach($v["reply_groupMember"] as $key=>$m): echo ($m["teacher_id"]); ?>-<?php echo ($m["teacher_name"]); ?><br><?php endforeach; endif; ?>
             </td>
          </tr><?php endforeach; endif; ?>
       </tbody>
    </table>
    <form action="<?php echo ($check_group_url); ?>" method="post" enctype="multipart/form-data">
          <div style="width: 400px; margin: 0 auto;">
            <h5 style="text-align: left;">学生组ID-组长</h5>
            <select class="form-control" name="reply_stuGroup_id">
              <?php if(is_array($stu_groupInfo)): foreach($stu_groupInfo as $key=>$h): ?><option value="<?php echo ($h["group_id"]); ?>"><?php echo ($h["group_id"]); ?>-<?php echo ($h["student_id"]); ?></option><?php endforeach; endif; ?>
            </select>
           <br>
           <input type="text" name="reply_id" value="<?php echo ($reply_id); ?>" hidden="hidden">
           <button class="btn btn-info" style="margin-left: 0px;" type="submit">提交</button>
           </div>
         </form>
  </div>
</body>
</html>