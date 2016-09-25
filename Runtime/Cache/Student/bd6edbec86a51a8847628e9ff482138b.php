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
         <li><a href="/CPS/index.php/Student/Stu/course_info">课程信息</a></li>
          <li><a href="/CPS/index.php/Student/Stu/myproject">我的课题</a></li>
          <li><a href="/CPS/index.php/Student/Stu/myteam">我的队伍</a></li>
          <li><a href="/CPS/index.php/Student/Stu/team_manage">队伍管理</a></li>
        </ol>
        </div>
        <div style="width: 1080px;">
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
                        <input type="submit" value="踢出" class="btn btn-danger"/><br/><?php endforeach; endif; ?>
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