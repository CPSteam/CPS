<?php
namespace Teacher\Controller;
use Think\Model;
use Think\Controller;

class ProfessorController extends Controller {
	function my_replyGroup(){
		$course_id = I('course_id');
		$reply_info = M('reply')->where("course_id = '$course_id'")->field('reply_group_id,group_leader_id')->select();
		foreach ($reply_info as $key => $s) {
			$reply_leader_id = $reply_info[$key]['group_leader_id'];
			$reply_teacher_group_id = $reply_info[$key]['reply_group_id'];
			$reply_info[$key]['groupleader'] = M('teacher')->where("teacher_id = '$reply_leader_id'")->field('teacher_id,teacher_name')->select();
			$reply_info[$key]['reply_group_members'] = M('reply_member')->table('reply_member as A,teacher as B')->where("A.reply_group_id = '$reply_teacher_group_id' and A.teacher_id = B.teacher_id")->field('B.teacher_id,B.teacher_name')->select();

			$reply_info[$key]['stu_groupleader'] = M('reply_stugroup')->table('reply_stugroup as A,student_group_member as B,student as C')->where("A.reply_group_id = '$reply_teacher_group_id' and A.stu_groupId = B.group_id and B.is_groupLeader = 1 and B.student_id = C.student_id")->field('B.group_id,C.student_id')->select();
		}

		if(!empty($_POST)){
			$reply_group_id = explode(',',$_POST['teacher_group']);
			$replyMember_task = M('reply_member');
			$replyMember_task_array = array(
				'allocated_stugroup_id' => $_POST['student_group'],
			);
			$replyMember_task -> where("reply_group_id = '$reply_group_id[0]' and teacher_id = '$reply_group_id[1]'")->save($replyMember_task_array);
		}

		$this -> assign('reply_info',$reply_info);
		$this -> assign('my_replyGroup_url',U('my_replyGroup'));
		$this -> assign('replyMember_task_url',U('replyMember_task'));
		$this -> display();
	}

	function replyMember_task(){
		$reply_group_id = I('reply_group_id');

		$reply_member_task = M('reply_member')->table('reply_member as A,teacher as B')->where("A.reply_group_id = '$reply_group_id' and A.teacher_id = B.teacher_id")->field('A.reply_group_id,A.teacher_id,A.allocated_stugroup_id,B.teacher_name')->select();
		foreach ($reply_member_task as $key => $s) {
			$stu_group_id = $reply_member_task[$key]['allocated_stugroup_id'];
			$reply_member_task[$key]['stu_groupMember'] = M('student')->table('student as A,student_group_member as B')->where("A.student_id = B.student_id and B.group_id = '$stu_group_id'")->field('A.student_id,A.student_name')->select();
			$reply_member_task[$key]['project_info'] = M('project')->table('project as A,student_group as B')->where("A.project_id = B.project_id and B.group_id = '$stu_group_id'")->field('A.project_name')->select();
		}

		$this -> assign('reply_member_task_info',$reply_member_task);
		$this -> display();
	}

	function course_info() {
		$info = D('Course')->select();
		$this -> assign('login_url',U('Home/Login/login'));
		$this -> assign('info',$info);
		$this -> assign('teacher_project_applied_url',U('teacher_project_applied'));
		$this -> assign('my_replyGroup_url',U('my_replyGroup'));
		$this -> assign('apply_subject_url',U('apply_subject'));
		$this -> display();
	}

	function teacher_project_applied() {
		$course_id = I('course_id');
		$info = M("project") -> table('project as A, teacher as B') -> where("A.course_id = '$course_id' and A.teacher_id = B.teacher_id") -> field('A.project_id, A.teacher_id, A.project_name, A.project_status, A.main_project, B.teacher_name,A.review_score,A.review_context') -> select();
		$this -> assign('login_url', U('Home/Login/login'));

		if(!empty($_POST)){
			$review_project_id = $_POST['review_project_id'];
			$review_course_id = $_POST['review_course_id'];
			$review_project = M('project');
			$review_project_array = array(
				'review_score' => $_POST['review_score'],
				'review_context' => $_POST['review_context'],
			);
			$review_project -> where("project_id = '$review_project_id' and course_id = '$review_course_id'")->save($review_project_array);
			$this -> redirect('course_info');
		}

		$accept_project_status = I('accept_status');
		$accept_projectId = I('project_id');
		$accept_courseId = I('course_id');
		if($accept_project_status == 1){
			$accept_project = M('project');
			$accept_project_array = array(
				'project_status' => 2,
			);
			$accept_project -> where("course_id = '$accept_courseId' and project_id = '$accept_projectId'")->save($accept_project_array);
		}else{
			$accept_project = M('project');
			$accept_project_array = array(
				'project_status' => 0,
			);
			$accept_project -> where("course_id = '$accept_courseId' and project_id = '$accept_projectId'")->save($accept_project_array);
		}
		
		$this -> assign('course_id',$course_id);
		$this -> assign('teacher_project_applied_url',U('teacher_project_applied'));
		$this -> assign('info',$info);
		$this->display();
	}

	function my_project(){
		$this -> assign('stuGroup_url',U('project_stuGroup'));
		$this -> assign('project_configure_url',U('project_configure'));
		$this -> display();
	}

	function project_stuGroup(){
		$this -> assign('stuGroup_report_url',U('stuGroup_report'));
		$this -> display();
	}

	function stuGroup_report(){
		$this -> display();
	}

	function apply_subject() {
		$course_name = I('course_name');
		$this -> assign('login_url', U('Home/Login/login'));
		$this -> assign('course_name', $course_name);
		$this -> assign('apply_subject_url',U('apply_subject'));
		$course_info = M("course") -> where("course_name = '$course_name'") -> field('course_id') -> select();

		foreach ($course_info as $key => $value) {
			$course_id = $course_info[$key]['course_id'];
		}

		if(!empty($_POST)) {
			$add_project = M("project");
			$teacher_name = $_POST['teacher_name'];
			$teacher_info = M("teacher") -> where("teacher_name = '$teacher_name'") -> field('teacher_id') -> select();
			$order = M("project") -> order('project_id desc') -> limit(1) -> select();
			foreach ($order as $key => $value) {
				$project_id = $order[$key]['project_id'] + 1;
			}
			foreach ($teacher_info as $key => $value) {
				$teacher_id = $teacher_info[$key]['teacher_id'];
			}

			$add_info = array(
				'project_id' => $project_id,
				'course_id' => $course_id,
				'teacher_id' => $teacher_id,
				'project_name' => $_POST['project_name'],
				'project_status' => '1',
				'main_project' => $_POST['main_project'],
				'final_expected_result' => $_POST['final_expected_result'],
				'final_expected_context' => $_POST['final_expected_context'],
				);
			$add_project -> add($add_info);
			$this -> redirect('course_info');
		} else {

		}
		$this -> display();
	}

}
