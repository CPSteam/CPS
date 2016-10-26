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
    <li><a href="/CPS/index.php/Manager/Manage/check_group">答辩组信息</a></li>
	<li><a href="/CPS/index.php/Manager/Manage/check_group">答辩组管理</a></li>
  </ol>
</div>

  	<div style="width: 1080px; margin: 0 auto">
  	<table class="table table-bordered table-striped text-center">
      <thead>
         <tr>
            <th>课程名称</th>
            <th>课程内容</th>
            <th>答辩组信息</th>
         </tr>
      </thead>
      <tbody>
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
            <td><?php echo ($v["course_name"]); ?></td>
            <td>
              <p><?php echo ($v["course_detail_info"]); ?></p>
              <p><a href="#">详情</a></p>
            </td>
            <td>
              <a href="<?php echo ($check_group_url); ?>/course_id/<?php echo ($v["course_id"]); ?>"><button class="btn btn-info" type="button">查看</button></a>
            </td>
          </tr><?php endforeach; endif; ?>
      </tbody>
  	</table>
    <form class="form-horizontal" action="#" method="" role="form">
      <div style="width: 400px; margin: 0 auto;">
        <label for="members">答辩组组长</label>
        <div class="form-group">
          <div class="col-sm-11">
            <select class="form-control" style="margin-top: 5px;">
              <option>123344-xx</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        </div>

        <label for="members">答辩组组员</label>
        <div class="form-group">
          <div class="col-sm-11">
            <select class="form-control" style="margin-top: 5px;">
              <option>123344-xx</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="col-sm-1">
            <a href="#"><button class="btn btn-info" type="button">+</button></a>
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-info" style="display: block; margin: 0 auto; width: 100px;">提交</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>