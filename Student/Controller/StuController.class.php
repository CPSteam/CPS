<?php
namespace Student\Controller;
use Think\Model;
use Think\Controller;

class StuController extends Controller{

	function course_info(){
		$course = new \Model\CourseModel();
   	 	$info = $course->select();
    	$this->assign('info',$info);
    	$this->assign('query_url',U('project_info'));
		$this->display();
	}
	function myproject(){
 		$course = new \Model\CourseModel();
 		$peojectSql = "select  A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id,B.project_status from course as A,project as B where A.course_id=B.course_id ";
 		$projectInfo = $course -> query($peojectSql);
 		
 		$this -> assign('projectInfo_url',U('project_report'));
 		foreach($projectInfo as $key => $s){
			   if($projectInfo[$key]['project_status'] == 0){
					$projectInfo[$key]['project_status'] = '<p style="color: red;">拒绝</p>';
			   }
				else if($projectInfo[$key]['project_status'] == 1){
                    $projectInfo[$key]['project_status'] = '<p style="color: blue;">待审核</p>';
                }
			   else{
					 $projectInfo[$key]['project_status'] = '<p style="color: green;">已通过</p>';
			   }

	 	   }
	 	$this -> assign('projectInfo',$projectInfo);
		$this->display();
	}

	function project_report(){
		$project_id = I('project_id');
		$report_sql = "select A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id,B.project_status,B.main_project,B.middle_expected_result,B.final_expected_result,B.project_comment_info from course as A,project as B where A.course_id=B.course_id and B.project_id=".$project_id;
		 $course = new \Model\CourseModel();
		 $report = $course -> query($report_sql);
		 dump($report);
		 foreach($report as $key => $s){
			   if($report[$key]['project_status'] == 0){
					$report[$key]['project_status'] = '<p style="color: red;">拒绝</p>';
			   }
				else if($report[$key]['project_status'] == 1){
                    $report[$key]['project_status'] = '<p style="color: blue;">待审核</p>';
                }
			   else{
					 $report[$key]['project_status'] = '<p style="color: green;">已通过</p>';
			   }

	 	   }
		 $this -> assign('report',$report);
		 $this->display();
	}
	
	function myteam(){
		$this->display();
	}
	
	function project_info(){
		$course_id = I('course_id');
		$new_sql = "select A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id from course as A,project as B where A.course_id=B.course_id and B.course_id=".$course_id;
		 $course = new \Model\CourseModel();
		 $info = $course -> query($new_sql);
		 $this->assign('info',$info);

		$this->display();
	}

	function team_info(){
		$this->display();
	}
	function team_manage(){
	 	   $projectTeam_sql = "select A.course_name,A.course_id,B.project_name,B.project_status,D.group_id,D.group_manage from course as A,project as B,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id group by D.group_id ;";
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
	 	    $this->assign('teamManage_url',U('team_manage'));
		   $this->assign('Manage_url',U('teamMember'));

	 	   foreach($team as $key => $s){
	 	   		$groupMember_sql = "select student_id,student_name from student where group_id = ".$team[$key]['group_id'];
	 	   		$team[$key]['students'] = $course->query($groupMember_sql);

			   if($team[$key]['project_status'] == 0){
					$team[$key]['project_status'] = '<p style="color: red;">拒绝</p>';
					$team[$key]['group_manage'] = ' <button type="button" class="btn btn-danger">删除</button>';
			   }
				else if($team[$key]['project_status'] == 1){
                    $team[$key]['project_status'] = '<p style="color: blue;">待审核</p>';
                    $team[$key]['group_manage'] = '<button type="button" type="button" class="btn btn-danger">删除</button>';
                }
			   else{
					 $team[$key]['project_status'] = '<p style="color: green;">已通过</p>';
					 $team[$key]['group_manage'] = ' ';
			   }

	 	   }

	 	   $this->assign('team',$team);

   		    if(!empty($_GET)){
				dump($_GET['student_id']);
            }else{

            }

   		   if(!empty($_POST)){
   		   		dump($_POST['student_id']);
   		   }else{
				$this->display();
   		   }

	}

	function teamMember(){
		   $group_id = I('group_id');
			$projectTeam_sql = "select A.course_name,A.course_id,B.project_name,B.project_status,D.group_id,D.group_manage from course as A,project as B,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id and D.group_id = ".$group_id;
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
		   $this->assign('teamMember_url',U('teamMember'));

	 	   foreach($team as $key => $s){
	 	   		$groupMember_sql = "select student_id,student_name from student where group_id = ".$team[$key]['group_id'];
	 	   		$team[$key]['students'] = $course->query($groupMember_sql);

			   if($team[$key]['project_status'] == 0){
					$team[$key]['project_status'] = '<p style="color: red;">拒绝</p>';
			   }
				else if($team[$key]['project_status'] == 1){
                    $team[$key]['project_status'] = '<p style="color: blue;">待审核</p>';
                }
			   else{
					 $team[$key]['project_status'] = '<p style="color: green;">已通过</p>';
			   }

	 	   }

	 	   $this->assign('team',$team);
		   $this->display();
	}
}