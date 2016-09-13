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
		$this->display();
	}
}