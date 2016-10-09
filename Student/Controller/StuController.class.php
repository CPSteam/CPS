<?php
namespace Student\Controller;
use Think\Model;
use Think\Controller;

class StuController extends Controller{

	function course_info(){
		$course = new \Model\CourseModel();
   	 	$info = $course->select();

		$this -> assign('login_url',U('Home/Login/login'));
    	$this->assign('info',$info);
    	$this->assign('query_url',U('project_info'));
		$this->display();
	}
	function myproject(){
 		$course = new \Model\CourseModel();
 		$peojectSql = "select  A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id,D.group_id,D.group_project_status from course as A,project as B,student_group_member as C,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id and C.group_id=D.group_id and C.student_id = ".$_SESSION['id'];
 		$projectInfo = $course -> query($peojectSql);

 		$this -> assign('projectInfo_url',U('project_report'));
 		$this -> assign('login_url',U('Home/Login/login'));

 		foreach($projectInfo as $key => $s){
 			$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = ".$projectInfo[$key]['group_id'];
	 	   		// dump($groupMember_sql);
	 	   		$projectInfo[$key]['students'] = $course->query($groupMember_sql);

			   if($projectInfo[$key]['group_project_status'] == 0){
					$projectInfo[$key]['group_project_status'] = '<p style="color: red;">拒绝</p>';
					$button_disabled = 'disabled';
                    $this -> assign('button_disabled',$button_disabled);
                    $this -> assign('projectInfo_url','#');
			   }
				else if($projectInfo[$key]['group_project_status'] == 1){
                    $projectInfo[$key]['group_project_status'] = '<p style="color: blue;">待审核</p>';
                    $button_disabled = 'disabled';
                    $this -> assign('button_disabled',$button_disabled);
                    $this -> assign('projectInfo_url','#');
                }
			   else{
					 $projectInfo[$key]['group_project_status'] = '<p style="color: green;">已通过</p>';
			   }

	 	   }
	 	$this -> assign('projectInfo',$projectInfo);
		$this->display();
	}

	function project_report(){
		$project_id = I('project_id');
		$report_sql = "select A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id,D.group_id,D.group_project_status,B.main_project,B.middle_expected_result,B.final_expected_result,B.project_comment_info,D.group_middle_report_score,D.group_final_report_score from course as A,project as B,student_group_member as C,student_group as D where A.course_id=B.course_id and D.project_id=B.project_id and C.group_id=D.group_id and B.project_id=".$project_id." and C.student_id = ".$_SESSION['id'];
		 $course = new \Model\CourseModel();
		 $report = $course -> query($report_sql);
		 $this -> assign('login_url',U('Home/Login/login'));

		 foreach($report as $key => $s){
		 	$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = ".$report[$key]['group_id'];
	 	   		$report[$key]['students'] = $course->query($groupMember_sql);

			   if($report[$key]['group_project_status'] == 0){
					$report[$key]['group_project_status'] = '<p style="color: red;">拒绝</p>';
			   }
				else if($report[$key]['group_project_status'] == 1){
                    $report[$key]['group_project_status'] = '<p style="color: blue;">待审核</p>';
                }
			   else{
					 $report[$key]['group_project_status'] = '<p style="color: green;">已通过</p>';
			   }

	 	   }
		 $this -> assign('report',$report);
		 $this->display();
	}
	
	function myteam(){
		$invite_id = "select student_message,student_message_status from student_group_member where student_id = ".$_SESSION['id'];
		$inviteMessage = D('student_group_member')->query($invite_id);

		$this->assign('myteam_url',U('myteam'));
	 	$invite_status = I('invite_status');

		foreach($inviteMessage as $key => $s){
			$teamInviterSql = "select  A.course_name,B.project_name,E.student_id,E.student_name from course as A,project as B,student_group_member as C,student_group as D,student as E where A.course_id=B.course_id and B.project_id=D.project_id and C.group_id=D.group_id and C.student_id=E.student_id and C.student_id = ".$inviteMessage[$key]['student_message'];
 			$inviteMessage[$key]['course_project'] = D('course') -> query($teamInviterSql);

 			$inviteMessage[$key]['student_message_status'] = $invite_status;;

 			if($inviteMessage[$key]['student_message_status'] == 0){
	 		  	$team_button = '<a href='.U('myteam').'/invite_status/1'.'><button type="button" class="btn btn-success">同意		</button></a>
	               <a href='.U('myteam').'/invite_status/2'.'><button type="button" class="btn btn-danger">拒绝</button></a>';
	            $manage_status = '<p style="color:blue">未处理</p>';
 			}else if($inviteMessage[$key]['student_message_status'] == 1){
 				$team_button = '<a href='.U('team_info').'><button type="button" class="btn btn-primary">查看队伍</button></a>';
 				$manage_status = '<p style="color:green">已同意</p>';
 			}else{
 				$team_button = '<button type="button" class="btn btn-primary disabled">查看队伍</button>';
 				$manage_status = '<p style="color:red">拒绝</p>';
 			}
 			
 			$this -> assign('team_button',$team_button);
 			$this -> assign('manage_status',$manage_status);
		}
	 	$this -> assign('inviteMessage',$inviteMessage);


	 	//dump($invite_status);
		$this->display();
	}
	
	function project_info(){
		$course_id = I('course_id');
		$new_sql = "select A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id from course as A,project as B where A.course_id=B.course_id and B.course_id=".$course_id;
		 $course = new \Model\CourseModel();
		 $info = $course -> query($new_sql);
		 $this->assign('info',$info);
		 $this -> assign('login_url',U('Home/Login/login'));
		 $this->display();
	}

	function team_info(){
		$invite_id = "select student_message,student_message_status from student_group_member where student_id = ".$_SESSION['id'];
		$inviteMessage = D('student_group_member')->query($invite_id);

		foreach($inviteMessage as $key => $s){
			$teamInviterSql = "select  A.course_name,B.project_name,B.teacher_id,D.group_id from course as A,project as B,student_group_member as C,student_group as D,student as E where A.course_id=B.course_id and B.project_id=D.project_id and C.group_id=D.group_id and C.student_id=E.student_id and C.student_id = ".$inviteMessage[$key]['student_message'];
 			$inviteMessage[$key]['course_project'] = D('course') -> query($teamInviterSql);
 			$group = $inviteMessage[$key]['course_project'];
 			foreach($group as $key => $s){
	 			$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = ".$group[$key]['group_id'];
	 			$group[$key]['students'] = D('course')->query($groupMember_sql);
	 			$this -> assign('group_member',$group[$key]['students']);
			}
		}
		$this -> assign('inviteMessage',$inviteMessage);
		$this->display();
	}

	function team_manage(){
		   $student_id = $_SESSION['id'];
	 	   $projectTeam_sql = "select D.group_project_status,D.group_id,D.group_manage from project as B,student_group_member as C,student_group as D where  B.project_id=D.project_id  and C.group_id=D.group_id and C.student_id=".$student_id;
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
	 	    $this->assign('teamManage_url',U('team_manage'));
		    $this->assign('Manage_url',U('teamMember'));
			$this -> assign('login_url',U('Home/Login/login'));
	 	   foreach($team as $key => $s){
	 	   		$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = ".$team[$key]['group_id'];
	 	   		// dump($groupMember_sql);
	 	   		$team[$key]['students'] = $course->query($groupMember_sql);

				   if($team[$key]['group_project_status'] == 0){
						$team[$key]['group_project_status'] = '<p style="color: red;">拒绝</p>';
						$button_disabled = 'disabled';
	                    $this -> assign('button_disabled',$button_disabled);
	                    $this -> assign('Manage_url','#');
				   }
					else if($team[$key]['group_project_status'] == 1){
	                    $team[$key]['group_project_status'] = '<p style="color: blue;">待审核</p>';
	                }
				   else{
						 $team[$key]['group_project_status'] = '<p style="color: green;">已通过</p>';
				   }

	 	   }

	 	   $this->assign('team',$team);

   		    if(!empty($_GET)){
				// dump($_GET['student']);
            }else{

            }

   		   if(!empty($_POST)){
   		   		$send_message = "update student_group_member set student_message='".$_SESSION['id']."' where student_id = ".$_POST['student_id'];
   		   		D('student_group_member')->query($send_message);
   		   		// dump($send_message);
   		   		// dump($_POST['student_id']);
   		   }else{
				$this->display();
   		   }

	}

	function teamMember(){
		   $group_id = I('group_id');
		   $projectTeam_sql = "select A.course_name,A.course_id,B.project_name,D.group_project_status,D.group_id,D.group_manage from course as A,project as B,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id and D.group_id = ".$group_id;
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
		   $this->assign('teamMember_url',U('teamMember'));
		   $this -> assign('login_url',U('Home/Login/login'));
		   $this->assign('teamManage_url',U('team_manage'));

	 	   foreach($team as $key => $s){
	 	   		$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = ".$team[$key]['group_id'];
	 	   		$team[$key]['students'] = $course->query($groupMember_sql);

			   if($team[$key]['group_project_status'] == 0){
					$team[$key]['group_project_status'] = '<p style="color: red;">拒绝</p>';
			   }
				else if($team[$key]['group_project_status'] == 1){
                    $team[$key]['group_project_status'] = '<p style="color: blue;">待审核</p>';
                }
			   else{
					 $team[$key]['group_project_status'] = '<p style="color: green;">已通过</p>';
			   }
	 	   }

	 	   $this->assign('team',$team);

 	   		if(!empty($_POST)){
 	   			if($_POST['student_id'] == $_SESSION['id']){
 	   				$this -> error('不能踢除本人！');
 	   			}else{
 	   				$delete_sql = "update student_group_member set is_available=0 where student_id = ".$_POST['student_id'];
 	   				dump($delete_sql);
   		   			D('student')->query($delete_sql);
   		   			$this -> redirect('team_manage');
 	   			}
   		   }else{
				$this->display();
   		   }
	}
}