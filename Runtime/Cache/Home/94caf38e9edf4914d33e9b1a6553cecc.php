<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>我的课题</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="bootstrap/js/jquery.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <style type="text/css">
   		th{
   			text-align: center;
   		}

         #div_title{
            background-color: gray;
            width: 300px;
            height:20px;
            opacity: 0.5;
            border-radius: 5px;
         }
   li a:hover{
            color:   #ADADAD;
            text-decoration:none;
         }
         
         li a{
            color: #5B5B5B;
         }

         #breadTab{
            width: 1080px;
            margin-bottom: 0px;
            height:36px;
         }
   </style>
</head>
<body>
<div id="breadTab">
<ol class="breadcrumb" style="background-color:#FFFFFF;">
  <li><a href="课程信息.html">课程信息</a></li>
  <li><a href="我的课题.html">我的课题</a></li>
  <li><a href="我的队伍.html">我的队伍</a></li>
  <li><a href="队伍管理.html">队伍管理</a></li>
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
         <th>详情</th>
         <th>状态</th>
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
         <td style="color: green;">
         	已通过
         </td>
      </tr>
     
   </tbody>
	</table>
</div>

<div id="div_title">
      <h4 style="color: black; text-align: center; font-family: 微软雅黑;">期中报告</h4>
</div>

<div style="width: 1080px;">
   <table class="table table-bordered table table-striped text-center">
   <thead>
      <tr>
         <th>期中预期成果</th>
         <th>期中任务内容</th>
         <th>评分</th>
         <th>评论</th>
         <th>报告操作</th>

      </tr>
   </thead>
   <tbody>
      <tr>
         <td>xx</td>
         <td>xx</td>
         <td>90</td>
         <td>
            <p>
            dsghsjkghsdkjghs<br>kljghaskljdhg
            </p> 
         </td>
         <td>
         <button type="button" class="btn btn-primary">查看</button>
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">提交</button>
         </td>
      </tr>
     
   </tbody>
   </table>
</div>

<div id="div_title">
      <h4 style="color: black; text-align: center;">结题报告</h4>
</div>

<div style="width: 1080px;">
   <table class="table table-bordered table table-striped text-center">
   <thead>
      <tr>
         <th>结题预期成果</th>
         <th>结题任务内容</th>
         <th>评分</th>
         <th>评论</th>
         <th>报告操作</th>

      </tr>
   </thead>
   <tbody>
      <tr>
         <td>xx</td>
         <td>xx</td>
         <td>90</td>
         <td>
            <p>
            dsghsjkghsdkjghs<br>kljghaskljdhg
            </p> 
         </td>
         <td>
         <button type="button" class="btn btn-primary">查看</button>
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">提交</button>
         </td>
         </td>
      </tr>
     
   </tbody>
   </table>
</div>

 <!-- 模态框（Modal） -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                           <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">
                              &times;
                           </button>
                           <h4 class="modal-title" id="myModalLabel">
                           文件提交
                           </h4>
                        </div>
                     <div class="modal-body">
                           <p style="color:red;">特别提示：<span style="color: black;">
                             上传报告时，“上传”与“提交”是两个不同操作，“上传”报告后，须检查无误后再行“提交”。一旦提交，不可更改；
                              没有“提交”之前，可以更新实验报告（须确保报告有修改，否则无法更新）。“上传”、“提交”之后，均可下载报告查阅。
                          </span></p>
                          <div style="margin-left: 200px;">
                          <label>课程名称
                          </label>
                          <input type="text" class="form-control" id="name" style="width: 200px;" placeholder="综合课程设计1">
                          <label>课题名称
                          </label>
                          <input type="text" class="form-control" id="name" style="width: 200px;" placeholder="基于安卓的。。。">
                          <label>报告文件
                          </label>
                          <input type="file" id="inputfile">
                          <br>
                          <button type="button" class="btn btn-info"
                          style="margin-left: 20px;">确定</button>
                          <button type="button" class="btn btn-info"style="margin-left: 30px;">取消</button>
                          </div>
                     </div>
                  </div><!-- /.modal-content -->
            </div><!-- /.modal -->

</body>
</html>