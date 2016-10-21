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

	function apply_project(){
		$course_name = I('course_name');
		$this -> assign('course_name',$course_name);
		$project_name = I('project_name');
		$this -> assign('project_name',$project_name);
		$project_id = I('project_id');
		$this -> assign('project_id',$project_id);
		$this -> assign('apply_project_url',U('apply_project'));

		$apply_group = "select A.group_id from student_group as A,student_group_member as B where  A.group_id=B.group_id and B.student_id=".$_SESSION['id']." and B.is_groupLeader = 1 and A.project_id = 0";
		$apply_group_id = D('student_group') -> query($apply_group);
		$this -> assign('apply_group_id',$apply_group_id);

		foreach ($apply_group_id as $key => $s) {
			$apply_id = $apply_group_id[$key]['group_id'];
			$this->assign('apply_id',$apply_id);
		}

		if(!empty($_POST)){
			$update_projectId_sql = "update student_group set project_id = ".$_POST['project_id']." where group_id =".$_POST['apply_group_id'];
			D('student_group') -> query($update_projectId_sql);
		}else{
			
		}
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
		$invite_id = "select A.student_message,A.student_message_status,B.project_id,B.group_id from student_group_member as A,student_group as B where A.group_id=B.group_id and A.student_id =".$_SESSION['id'];
		$inviteMessage = D('student_group_member')->query($invite_id);
		$this->assign('myteam_url',U('myteam'));
		$this->assign('team_info',U('team_info'));

		foreach($inviteMessage as $key => $s){
			$teamInviterSql = "select distinct E.student_id,E.student_name from student_group_member as C,student_group as D,student as E where  C.group_id=D.group_id and C.student_id=E.student_id and C.student_id = ".$inviteMessage[$key]['student_message'];
 			$inviteMessage[$key]['students'] = D('course') -> query($teamInviterSql);

 			//当申请了课题显示
 			$projectId_sql = "select project_id from student_group where group_id =".$inviteMessage[$key]['group_id'];
 			$pId = D('project')->query($projectId_sql);

			$course_project_sql = "select A.course_name,B.project_name,C.group_id from course as A,project as B,student_group as C where A.course_id=B.course_id and B.project_id=C.project_id and C.group_id =".$inviteMessage[$key]['group_id'];
			$inviteMessage[$key]['course_project'] =D('course') -> query($course_project_sql);
		}
	 	$this -> assign('inviteMessage',$inviteMessage);
		$invite_status = I('invite_status');
		$status_group_id = I('group_id');
		if($invite_status == 2){
			$updateMessage_status = "update student_group_member set student_message_status = 2 where student_id = ".$_SESSION['id']." and group_id = ".$status_group_id;
			D('student_group_member') -> query($updateMessage_status);
			$this -> redirect('team_info');
		}else if($invite_status == 0){
			$updateMessage_status = "update student_group_member set student_message_status = 0 where student_id = ".$_SESSION['id']." and group_id = ".$status_group_id;
			D('student_group_member') -> query($updateMessage_status);
		}else{

		}
		$this->display();
	}
	
	function project_info(){
		$course_id = I('course_id');
		$new_sql = "select A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id from course as A,project as B where A.course_id=B.course_id and B.course_id=".$course_id;
		 $course = new \Model\CourseModel();
		 $info = $course -> query($new_sql);
		 $this->assign('info',$info);
		 $this ->assign('apply_project',U('apply_project'));
		 $this->display();
	}

	function team_info(){
		$teamgroup_id = I('group_id');
		$is_project = "select project_id from student_group where group_id =".$teamgroup_id;
		$project_id =D('project')->query($is_project);
		
		foreach ($project_id as $key => $s) {
			if($project_id[$key]['project_id'] == 0){
				$projectid = 0;
				$this -> assign('projectid',$projectid);
			}else{
				$projectid = 1;
				$this -> assign('projectid',$projectid);
				$team_info = "select  distinct A.course_name,B.project_name,B.teacher_id,D.group_id from course as A,project as B,student_group_member as C,student_group as D where A.course_id=B.course_id and B.project_id=D.project_id and C.group_id=D.group_id and C.group_id =".$teamgroup_id;
				$teamInfo = D('course')->query($team_info);
			}
		}

		$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = ".$teamgroup_id;
		$memember = D('course')->query($groupMember_sql);
		$this -> assign('teamInfo',$teamInfo);
		$this -> assign('group_member',$memember);
		$this->display();
	}

	function team_manage(){
		   $student_id = $_SESSION['id'];
		   $this -> assign('session_id',$student_id);
		   //创建学生组
		   $teamCreate = I('teamCreate');
		   if($teamCreate == 1){
		   		$teamNew_sql = "insert into student_group values(6,1,0,".$_SESSION['id'].",1,1,0,0,'',0)";
		   		D('student_group')->query($teamNew_sql);
		   		$groupNew_sql = "insert into student_group_member values(".$_SESSION['id'].",6,'',2,1,0,1,1,1)";
		   		D('student_group_member')->query($groupNew_sql);
		   }
		   //显示学生组
	 	   $projectTeam_sql = "select D.group_project_status,D.group_id,D.group_manage,C.is_groupLeader from student_group_member as C,student_group as D where C.group_id=D.group_id and C.student_id=".$student_id;
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
	 	    $this->assign('teamManage_url',U('team_manage'));
		    $this->assign('Manage_url',U('teamMember'));
			$this -> assign('login_url',U('Home/Login/login'));
	 	   foreach($team as $key => $s){
	 	   		$groupMember_sql = "select A.student_id,A.student_name,C.is_groupLeader from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.student_message_status=2 and C.group_id = ".$team[$key]['group_id'];
	 	   		$team[$key]['students'] = $course->query($groupMember_sql);

				$groupLeader_sql = "select A.student_id from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.is_groupLeader=1 and C.group_id = ".$team[$key]['group_id'];
	 	   		$team[$key]['Leader'] = $course->query($groupLeader_sql);
	 	   		$Leader = $team[$key]['Leader'];

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
   		   $this->display();
	}

	function teamMember(){
		   $group_id = I('group_id');
		   $projectTeam_sql = "select D.group_project_status,D.group_id,D.group_manage from student_group as D where D.group_id = ".$group_id;
	 	   $course = new \Model\CourseModel();
	 	   $team =  $course->query($projectTeam_sql);
		   $this->assign('teamMember_url',U('teamMember'));
		   $this -> assign('login_url',U('Home/Login/login'));
		   $this->assign('teamManage_url',U('team_manage'));

	 	   foreach($team as $key => $s){
	 	   		$groupMember_sql = "select A.student_id,A.student_name from student as A,student_group as B,student_group_member as C where A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.student_message_status=2 and C.group_id = ".$team[$key]['group_id'];
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
 	   				$delete_sql = "update student_group_member set is_available=0 where student_id = ".$_POST['student_id']." and group_id = ".$_POST['group_id'];
   		   			D('student')->query($delete_sql);
   		   			$this -> redirect('team_manage');
 	   			}
   		   }else{
				$this->display();
   		   }

   		    if(!empty($_GET)){
   		   		$send_message = "insert into student_group_member values(".$_GET['studentId'].",6,".$_SESSION['id'].",1,1,'',1,1,0)";
   		   		D('student_group_member')->query($send_message);
   		   }else{
				
   		   }
	}
}