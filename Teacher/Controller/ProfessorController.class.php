<?php
namespace Teacher\Controller;
use Think\Model;
use Think\Controller;

class ProfessorController extends Controller {
	function my_replyGroup(){
		$this -> assign('replyMember_task_url',U('replyMember_task'));
		$this -> display();
	}

	function replyMember_task() {
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
		$info = M("Project") -> table('project as A, teacher as B') -> where("A.course_id = '$course_id' and A.teacher_id = B.teacher_id") -> field('A.project_id, A.teacher_id, A.project_name, A.project_status, A.main_project, B.teacher_name') -> select();
		$this -> assign('login_url', U('Home/Login/login'));

		foreach($info as $key => $s) {
			   if($info[$key]['project_status'] == 0) {
					 $info[$key]['project_status'] = '<p style="color: red;">拒绝</p>';
			   } else if($info[$key]['project_status'] == 1) {
              $info[$key]['project_status'] = '<p style="color: blue;">待审核</p>';
           } else {
					 			$info[$key]['project_status'] = '<p style="color: green;">已通过</p>';
			       }
		}

		$this -> assign('info',$info);
		$this->display();
	}

	function apply_subject() {
		$course_name = I('course_name');
		$this -> assign('login_url', U('Home/Login/login'));
		$this -> assign('course_name', $course_name);

		$course_info = M("course") -> where("course_name = '$course_name'") -> field('course_id') -> select();

		foreach ($course_info as $key => $value) {
			$course_id = $course_info[$key]['course_id'];
		}

		if(!empty($_POST)) {
			$modify_project = M("project");
			$teacher_name = $_POST['teacher_name'];
			$teacher_info = M("teacher") -> where("teacher_name = '$teacher_name'") -> field('teacher_id') -> select();

			foreach ($teacher_info as $key => $value) {
					$teacher_id = $teacher_info[$key]['teacher_id'];
			}

			$modify_info = array(
				'course_id' => $course_id,
				'project_name' => $_POST['project_name'],
				'teacher_id' => $teacher_id,
				'main_project' => $_POST['main_project'],
				'main_project' => $_POST['main_project'],
				'main_project' => $_POST['main_project'],
				'main_project' => $_POST['main_project'],
				);
			$modify_project -> field('reply_num, group_num, teacher_course_max, stu_course_max')->save($modify_info);
			$this -> redirect('manage_info');
		}else{

		}
		$this -> display();
	}

}
