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
		$info = M("course")->where("course_id = '$course_id'")->select();
		$this->assign('edit_courseInfo_url',U('edit_courseInfo'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function check_file() {
		$this->assign('course_file_conf_url',U('course_file_conf'));
		$this -> assign('login_url',U('Home/Login/login'));
		$this->assign('check_file_conf_url',U('check_file_conf'));
		$this -> display();
	}
	function check_file_conf() {
		$this->assign('edit_file_url',U('edit_file'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> display();
	}
	function check_group() {
		$course_id = I('course_id');
		$info = M("course")->where("course_id = '$course_id'")->select();
		$this->assign('edit_group_url',U('edit_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function edit_courseInfo() {
		$course_name = I('course_name');
		$course_detail_info = I('course_detail_info');
		$this -> assign('list_course_name',$course_name);
		$this -> assign('list_course_detail_info',$course_detail_info);
		$this -> assign('edit_courseInfo_url',U('edit_courseInfo'));

		if(!empty($_POST)){
			$list_course_name = $_POST['list_course_name'];
			$modify_course_info = M("course");
			$modify_info = array(
				'reply_num' => $_POST['modify_reply_num'], 
				'group_num' => $_POST['modify_group_num'], 
				'teacher_course_max' => $_POST['modify_teacher_max_course_num'], 
				'stu_course_max' => $_POST['modify_stu_max_course_num'], 
				);
			$modify_course_info->where("course_name = '$list_course_name'")->field('reply_num,group_num,teacher_course_max,stu_course_max')->save($modify_info);
			$this -> redirect('manage_info');
			//dump($modify_course_info->getLastSql());
		}else{
			
		}
		$this -> display();
	}
	function edit_file() {
		$this -> display();
	}
	function edit_group() {
		$course_id = I('course_id');
		$info = M("course")->where("course_id = '$course_id'")->select();
		$this -> assign('check_group_url',U('check_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> display();
	}
	function group_info() {
		$this -> display();
	}
}
