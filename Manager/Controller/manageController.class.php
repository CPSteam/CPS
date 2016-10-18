<?php
namespace Manager\Controller;
use Think\Model;
use Think\Controller;

class ManageController extends Controller {
	function manage_info() {
		$course = D('Course');
		$info = $course -> select();
		$this->assign('course_url',U('check_courseinfo'));
		$this->assign('group_url',U('check_check_group'));
		$this->assign('file_url',U('check_file'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function check_courseInfo() {
		$course_id = I('course_id');
		$course_sql = "select * from course where course.course_id = ".$course_id;
		$course = D('Course');
		$info = $course -> query($course_sql);

		$this -> assign('info',$info);
		$this -> display();
	}
	function check_file() {
		$this -> display();
	}
	function check_group() {
		$this -> display();
	}
	function edit_courseInfo() {
		$this -> display();
	}
	function edit_file() {
		$this -> display();
	}
	function edit_group() {
		$this -> display();
	}
	function group_info() {
		$this -> display();
	}
}
