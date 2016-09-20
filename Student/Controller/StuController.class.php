<?php
namespace Student\Controller;
use Think\Controller;

class StuController extends Controller{

	function course_info(){
		//$course = D('Course');
       // var_dump($course);
       $course = new \Model\CourseModel();
       $info = $course->select();
       $this->assign('info',$info);
		$this->display();
	}
	function myproject(){
		$this->display();
	}
	function myteam(){
		$this->display();
	}
	
	function project_info(){
		$this->display();
	}
	function team_info(){
		$this->display();
	}
	function team_manage(){
	       $projectTeam_sql = "select A.course_name,A.course_id,B.project_name,B.project_status,D.group_id,D.group_manage from course as A,project as B,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id ;";
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
	 	   foreach($team as $key => $s){
			   if($team[$key]['project_status'] == 0){
					$team[$key]['project_status'] = '<p style="color: red;">拒绝</p>';
					$team[$key]['group_manage'] = ' <button type="button" class="btn btn-danger">删除</button>';
			   }
				else if($team[$key]['project_status'] == 1){
                    $team[$key]['project_status'] = '<p style="color: blue;">待审核</p>';
                    $team[$key]['group_manage'] = '  <button class="btn btn-info" data-toggle="modal" data-target="#myModal">管理</button><br>
                                                     <button type="button" class="btn btn-danger">删除</button>';
                }
			   else{
					 $team[$key]['project_status'] = '<p style="color: green;">已通过</p>';
					 $team[$key]['group_manage'] = ' <button class="btn btn-info" data-toggle="modal" data-target="#myModal">管理</button>';
			   }
	 	   }
	 	   $this->assign('team',$team);
	 	   $groupMember_sql = "select C.student_id,C.student_name from course as A,project as B,student as C,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id and D.group_id=C.group_id; ";
   		   $studentid = $course->query($groupMember_sql);
   		   $this->assign('studentid',$studentid);


   		    if(!empty($_GET)){
				dump($_GET['student_id']);
            }else{

            }
 			//$msg=M('student');
           // $result = $msg->where('student_id = 2')->delete();
            //dump($result);

   		   if(!empty($_POST)){
   		   		dump($_POST['student_id']);
   		   }else{
				$this->display();
   		   }

	}
}