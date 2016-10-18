<?php
namespace Manager\Controller;
use Think\Model;
use Think\Controller;

class ManageController extends Controller {
	function manage_info() {
		$course = D('Course');
		$info = $course -> select();
		$this->assign('course_url',U('check_courseinfo'));
		$this->assign('group_url',U('check_group'));
		$this->assign('file_url',U('check_file'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function check_courseInfo() {
		$course_id = I('course_id');
		$course_sql = "select * from course where course.course_id = ".$course_id;
		$course = D('Course');
		$info = $course -> query($course_sql);
		$this->assign('edit_courseInfo_url',U('edit_courseInfo'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function check_file() {

		$this->assign('edit_file_url',U('edit_file'));
		$this -> assign('login_url',U('Home/Login/login'));

		// $this -> assign('info',$info);
		$this -> display();
	}
	function check_group() {
		$course_id = I('course_id');
		$group_sql = "select * from course where course.course_id = ".$course_id;
		$course = D('Course');
		$info = $course -> query($group_sql);
		$this->assign('edit_group_url',U('edit_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function edit_courseInfo() {
		$this -> display();
	}
	function edit_file() {
		$this -> display();
	}
	function edit_group() {
		$course_id = I('course_id');
		$group_sql = "select * from course where course.course_id = ".$course_id;
		$course = D('Course');
		$info = $course -> query($group_sql);
		$this -> assign('check_group_url',U('check_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function group_info() {
		$this -> display();
	}
}
