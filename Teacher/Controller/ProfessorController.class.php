<?php
namespace Teacher\Controller;
use Think\Model;
use Think\Controller;

class ProfessorController extends Controller {
	function my_replyGroup(){
		$this -> assign('replyMember_task_url',U('replyMember_task'));
		$this->display();
	}

	function replyMember_task(){
		$this->display();
	}

	function course_info(){
		$info = D('Course')->select();
		$this -> assign('login_url',U('Home/Login/login'));
		$this->assign('info',$info);
		$this->assign('teacher_project_applied_url',U('teacher_project_applied'));
		$this->assign('my_replyGroup_url',U('my_replyGroup'));
		$this->assign('apply_subject_url',U('apply_subject'));
		$this->display();
	}

	function teacher_project_applied(){
		$course_id = I('course_id');
		$info = M("Project") -> where("course_id = '$course_id'") -> table('project as A,teacher as B') -> where("A.teacher_id = B.teacher_id") -> field('A.project_id,A.teacher_id,A.project_name,A.project_status,,B.teacher_name') -> select();

		$group_teacher = M("Teacher") -> select();
		$this -> assign('login_url',U('Home/Login/login'));
		$this -> assign('info',$info);
		$this->display();
	}
}
