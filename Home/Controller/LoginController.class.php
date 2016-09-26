<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
	function login(){	
		$this->assign('reset_url',U('rPassword'));
		$this -> assign('firstPage_url',U('Student/Stu/course_info'));
		$this -> display();
	}

	function rPassword(){
		$this->assign('login_url',U('login'));
		$this -> display();
	}
}