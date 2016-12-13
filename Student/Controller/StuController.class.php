<?php
namespace Student\Controller;
use Think\Model;
use Think\Controller;

class StuController extends Controller{

	function course_info(){
   	$info = D('course')->select();
		$this -> assign('login_url',U('Home/Login/login'));
  	$this->assign('info',$info);
  	$this->assign('query_url',U('project_info'));
		$this->display();
	}

	function myproject(){
		$student_id = $_SESSION['id'];
		$projectInfo = M("course")->table('course A,project B,student_group_member C,student_group D')->where("A.course_id=B.course_id and B.project_id=D.project_id and C.group_id=D.group_id and C.student_id = '$student_id'")->field('A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id,D.group_id,D.group_project_status')->select();

 		$this -> assign('projectInfo_url',U('project_report'));
 		$this -> assign('login_url',U('Home/Login/login'));

 		foreach($projectInfo as $key => $s){
 			$group_id = $projectInfo[$key]['group_id'];
 			$projectInfo[$key]['students'] = M("student_group_member")->table('student as A,student_group as B,student_group_member as C')->where("A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = '$group_id'")->field('A.student_id,A.student_name')->select();
	 	   }
	 	$this -> assign('projectInfo',$projectInfo);
	 	$this -> assign('groupMember',$groupMember);
		$this->display();
	}

	function apply_project(){
		$student_id = $_SESSION['id'];
		$course_name = I('course_name');
		$this -> assign('course_name',$course_name);
		$project_name = I('project_name');
		$this -> assign('project_name',$project_name);
		$project_id = I('project_id');
		$this -> assign('project_id',$project_id);

		$is_exist_project = M("student_group")->table('student_group as A,student_group_member as B')->where("A.group_id=B.group_id and B.student_id = '$student_id' and B.is_groupLeader = 1 and A.project_id = '$project_id'")->select();
		if($is_exist_project){
			$this->error('您已经有学生组申请过此课题，请选择其它课题');
		}

		$this -> assign('apply_project_url',U('apply_project'));
		$apply_group_id = M("student_group")->table('student_group as A,student_group_member as B')->where("A.group_id=B.group_id and B.student_id = '$student_id' and B.is_groupLeader = 1 and A.project_id = 0")->field('A.group_id')->select();
		$this -> assign('apply_group_id',$apply_group_id);

		foreach ($apply_group_id as $key => $s) {
			$apply_id = $apply_group_id[$key]['group_id'];
			$this->assign('apply_id',$apply_id);
		}
		$this->display();
	}

	function project_report(){
		$project_id = I('project_id');
		$student_id = $_SESSION['id'];
		$this->assign('project_report_url',U('project_report'));
		$report = M("course")->table('course as A,project as B,student_group_member as C,student_group as D')->where("A.course_id=B.course_id and D.project_id=B.project_id and C.group_id=D.group_id and B.project_id='$project_id' and C.student_id = '$student_id'")->field('A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id,D.group_id,D.group_project_status,B.main_project,B.middle_expected_result,B.final_expected_result,B.project_comment_info,D.group_middle_report_score,D.group_final_report_score')->select();
		 $this -> assign('login_url',U('Home/Login/login'));

		 foreach($report as $key => $s){
		 	$report_groupId = $report[$key]['group_id'];
		 	$course_id =  $report[$key]['course_id'];
		 	$groupMember = M("student_group_member")->table('student as A,student_group as B,student_group_member as C')->where("A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = '$report_groupId'")->field('A.student_id,A.student_name')->select();

		 	$file_info = M("file_property")->where("course_id = '$course_id'")->field('file_type_id, file_type_name, file_deadline, allowed_suffix_list, allowed_max_size')->select();
			$this -> assign('file_info',$file_info);

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
		 $this -> assign('groupMember',$groupMember);
		 $this->display();
	}

	function myteam(){
		$student_id = $_SESSION['id'];
		$inviteMessage = M("student_group_member")->table('student_group_member as A,student_group as B')->where("A.group_id=B.group_id and A.student_id = '$student_id'")->field('A.student_message,A.student_message_status,B.project_id,B.group_id')->select();
		$this->assign('myteam_url',U('myteam'));
		$this->assign('team_info',U('team_info'));

		foreach($inviteMessage as $key => $s){
			$student_message = $inviteMessage[$key]['student_message'];
			$group_id = $inviteMessage[$key]['group_id'];
			$inviteMessage[$key]['teamInviter'] = M("student_group")->table('student_group_member as C,student_group as D,student as E')->where("C.group_id=D.group_id and C.student_id=E.student_id and C.student_id = '$student_message'")->field('distinct E.student_id,E.student_name')->select();
 			//当申请了课题显示
 			$projectId=M("student_group")->where("group_id = '$group_id'")->field('project_id')->select();

 			$inviteMessage[$key]['course_project'] = M("student_group")->table('course as A,project as B,student_group as C')->where("A.course_id=B.course_id and B.project_id=C.project_id and C.group_id = '$group_id'")->field('A.course_name,B.project_name,C.group_id')->select();
		}
	 	$this -> assign('inviteMessage',$inviteMessage);
	 	$this -> assign('teamInviter',$teamInviter);
	 	$this -> assign('projectId',$projectId);
	 	$this -> assign('course_project',$course_project);
		$invite_status = I('invite_status');
		$status_group_id = I('group_id');
		if($invite_status == 2){
			$updateMessage = M("student_group_member");
			$updateMessage->student_message_status = 2;
			$updateMessage->where("student_id = '$student_id' and group_id = '$status_group_id'")->save();
			$this -> redirect('course_info');
		}else if($invite_status == 0){
			$updateMessage = M("student_group_member");
			$updateMessage->student_message_status = 0;
			$updateMessage->where("student_id = '$student_id' and group_id = '$status_group_id'")->save();
		}else{

		}
		$this->display();
	}

	function project_info(){
		$course_id = I('course_id');
		$info = M("course")->table('course as A,project as B')->where("A.course_id=B.course_id and B.course_id= '$course_id'")->field('A.course_name,A.course_id,B.project_name,B.project_id,B.teacher_id')->select();


		 $this->assign('info',$info);
		 $this ->assign('apply_project',U('apply_project'));
		 $this->display();
	}

	function team_info(){
		$teamgroup_id = I('group_id');
		$this -> assign('teamgroup_id',$teamgroup_id);
		$project_id = M("student_group")->where("group_id = '$teamgroup_id'")->field('project_id')->select();

		foreach ($project_id as $key => $s) {
			if($project_id[$key]['project_id'] == 0){
				$projectid = 0;
				$this -> assign('projectid',$projectid);
			}else{
				$projectid = 1;
				$this -> assign('projectid',$projectid);
				$teamInfo = M("student_group")->table('course as A,project as B,student_group_member as C,student_group as D')->where("A.course_id=B.course_id and B.project_id=D.project_id and C.group_id=D.group_id and C.group_id = '$teamgroup_id'")->field('distinct A.course_name,B.project_name,B.teacher_id,D.group_id')->select();
			}
		}

		$memember = M("student_group_member")->table('student as A,student_group as B,student_group_member as C')->where("A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.group_id = '$teamgroup_id'")->field('A.student_id,A.student_name,B.group_id')->select();
		$this -> assign('teamInfo',$teamInfo);
		$this -> assign('group_member',$memember);
		$this->display();
	}

	function team_manage(){
		   $student_id = $_SESSION['id'];
		   $this -> assign('session_id',$student_id);
		   //创建学生组
		   $teamCreate = I('teamCreate');

		   $order = M("student_group")->order('group_id desc')->limit(1)->select();
		   foreach ($order as $key => $s) {
		   	 $order_result = $order[$key]['group_id'];
		   	 if($teamCreate == 1) {
		   		$teamNew = D("student_group");
		   		$team_array = array(
		   			'group_id' => $order_result+1,
		   			'reply_group_id' => 1,
		   			'project_id' => 0,
		   			'stu_group_leader_id' => $_SESSION['id'],
		   			'group_project_status' => 1,
		   			'group_middle_report_score' => 1,
		   			'group_final_report_score' => 0,
		   			'group_reply_score' => 0,
		   			'group_manage' => '',
		   			'group_lock' => 0,
		   			);
		   		$newTeam = $teamNew->add($team_array);

		   		$groupNew = D("student_group_member");
		   		$group_array = array(
		   			'student_id' => $_SESSION['id'],
		   			'group_id' => $order_result+1,
		   			'student_message' => '',
		   			'student_message_status' => 2,
		   			'reply_group_id' => 1,
		   			'stu_contribute_score' => 0,
		   			'invite_status' => 1,
		   			'is_available' => 1,
		   			'is_groupLeader' => 1,
		   			);
		   		$newGroup = $groupNew->add($group_array);
		   }
		   }
		   //显示学生组
		   $peojectTeam = M("student_group")->table('student_group_member as C,student_group as D')->where("C.group_id=D.group_id and C.student_id = '$student_id'")->field('D.group_project_status,D.group_id,D.group_manage,C.is_groupLeader')->select();

	 	    $this->assign('teamManage_url',U('team_manage'));
		    $this->assign('Manage_url',U('teamMember'));
			$this -> assign('login_url',U('Home/Login/login'));

	 	   foreach($peojectTeam as $key => $s){
	 	   		$group_id = $peojectTeam[$key]['group_id'];
	 	   		$peojectTeam[$key]['students'] = M("student_group_member")->table('student as A,student_group as B,student_group_member as C')->where("A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.student_message_status=2 and C.group_id = '$group_id'")->field('A.student_id,A.student_name')->select();
	 	   		$this -> assign('groupMember',$groupMember);

	 	   		$groupLeader = M("student_group")->table('student as A,student_group as B,student_group_member as C')->where("A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.is_groupLeader=1 and C.group_id = '$group_id'")->field('A.student_id')->select();
	 	   		$this -> assign('groupLeader',$groupLeader);

			   if($peojectTeam[$key]['group_project_status'] == 0){
					$peojectTeam[$key]['group_project_status'] = '<p style="color: red;">拒绝</p>';
					$button_disabled = 'disabled';
	                $this -> assign('button_disabled',$button_disabled);
	                $this -> assign('Manage_url','#');
			   }
				else if($peojectTeam[$key]['group_project_status'] == 1){
	                $peojectTeam[$key]['group_project_status'] = '<p style="color: blue;">待审核</p>';
	            }
			   else{
					 $peojectTeam[$key]['group_project_status'] = '<p style="color: green;">已通过</p>';
			   }
	 	   }
	 	   $this->assign('team',$peojectTeam);
	 	   $this -> assign('i',$I);
   		   $this->display();
	}

	function teamMember(){
		   $group_id = I('group_id');
		   $team = M("student_group")->where("group_id = '$group_id'")->field('group_project_status,group_id,group_manage')->select();

		   $this->assign('teamMember_url',U('teamMember'));
		   $this -> assign('login_url',U('Home/Login/login'));
		   $this->assign('teamManage_url',U('team_manage'));

	 	   foreach($team as $key => $s){
	 	   		$team_groupId = $team[$key]['group_id'];
	 	   		$team[$key]['students'] = M("student_group_member")->table('student as A,student_group as B,student_group_member as C')->where("A.student_id=C.student_id and B.group_id=C.group_id and C.is_available=1 and C.student_message_status=2 and C.group_id = '$team_groupId'")->field('A.student_id,A.student_name')->select();
	 	   		$this->assign('groupMember',$groupMember);

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
					$post_student_id = $_POST['student_id'];
					$post_group_id = $_POST['group_id'];
					$deleteMessage = M("student_group_member");
					$deleteMessage->is_available = 0;
					$deleteMessage->where("student_id = '$post_student_id' and group_id = '$post_group_id'")->save();
   		   			$this -> redirect('team_manage');
 	   			}
   		   }else{

   		   }

   		    if(!empty($_GET)){
   		    	$send_message = D("student_group_member");
   		    	$send_message_array = array(
   		    		'student_id' => $_GET['studentId'],
		   			'group_id' => $_GET['get_group_id'],
		   			'student_message' => $_SESSION['id'],
		   			'student_message_status' => 1,
		   			'reply_group_id' => 1,
		   			'stu_contribute_score' => '',
		   			'invite_status' => 1,
		   			'is_available' => 1,
		   			'is_groupLeader' => 0,
   		    		);
   		    	$send_message->add($send_message_array);
   		   }else{

   		   }
   		   $this->display();
	}
	//学生组上传报告文件
	function StuGroup_fileUpload(){
	            if(empty($_FILES)){
	                  $this->error('请选择您想上传的文件');
	            }else{
	                  $upload = new \Think\Upload();// 实例化上传类
	                $upload->maxSize   =     3145728 ;// 设置附件上传大小
	                $upload->exts      =     array('doc', 'docx');// 设置附件上传类型
	                $upload->saveName  =       $_SESSION['id'].'_'.$_POST['stuGroup_id'].'_'.$_POST['file_type_name'];
	                $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	                $upload->savePath  =     './StudentGroup_file/'; // 设置附件上传（子）目录
	                // 上传文件 
	                $info   =   $upload->upload();
	                if(!$info) {// 上传错误提示错误信息
	                    $this->error($upload->getError());
	                }else{// 上传成功
	                    $this->success('上传成功！');
	                }
	            }
	      }

	//学生组上传申请课题材料
	function StuGroup_applyUpload(){
	      if(empty($_FILES)){
	            $this->error('请选择您想上传的文件');
	      }else{
	            $upload = new \Think\Upload();// 实例化上传类
	          $upload->maxSize   =     3145728 ;// 设置附件上传大小
	          $upload->exts      =     array('doc', 'docx');// 设置附件上传类型
	          $upload->saveName  =       $_SESSION['id'].'_'.$_POST['apply_stugroup_id'].'_'.$_POST['apply_course_name'].'_'.$_POST['apply_project_name'];
	          $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	          $upload->savePath  =     './StudentGroup_apply/'; // 设置附件上传（子）目录
	          // 上传文件 
	          $info   =   $upload->upload();
	          if(!$info) {// 上传错误提示错误信息
	              $this->error($upload->getError());
	          }else{// 上传成功
	            if(!empty($_POST['apply_group_id'])){
	                  $post_apply_group_id = $_POST['apply_group_id'];
	                  $student_group = M("student_group"); // 实例化student_group对象
	                  // 要修改的数据对象属性赋值
	                  $student_group->project_id = $_POST['project_id'];
	                  $student_group->where("group_id = '$post_apply_group_id'")->save(); // 根据条件更新记录
	                  }
	              $this->success('上传成功！');
	          }
	      }
	}

	//课题内容文件下载
	function project_file_download($course_name,$project_name)
	{
		 $filename = './Uploads/project_file/'.$course_name.'-'.$project_name.'.docx';
		 $filename= iconv("utf-8", "gbk", $filename);
		  if ($filename == ''){
		      return FALSE;
		  }
		  if (FALSE === strpos($filename, '.')){
		      return FALSE;
		  }
		  if(!is_file($filename)){
		  	$this -> error('无相关文件！');
		  }

		  $x = explode('.', $filename);
		  $extension = end($x);
		  $mimes = getMimes();

		  $showname = $course_name.'-'.$project_name.'.docx';
		  // Set a default mime if we can't find it
		  if ( ! isset($mimes[$extension])){
		      $mime = 'application/octet-stream';
		  }else{
		      $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
		  }

		  // Generate the server headers
		  if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		  {
		      header('Content-Type: "'.$mime.'";charset=utf-8');
		      header('Content-Disposition: attachment; filename="'.$showname.'"');
		      header('Expires: 0');
		      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		      header("Content-Transfer-Encoding: binary");
		      header('Pragma: public');
		      header("Content-Length: ".filesize($filename));
		  }
		  else
		  {
		      header('Content-Type: "'.$mime.'"');
		      header('Content-Disposition: attachment; filename="'.$showname.'"');
		      header("Content-Transfer-Encoding: binary");
		      header('Expires: 0');
		      header('Pragma: no-cache');
		      header("Content-Length: ".filesize($filename));
		  }
		  readfile($filename);
	}
}
