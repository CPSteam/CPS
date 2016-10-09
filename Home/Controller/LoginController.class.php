<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
	function login(){	
		$this->assign('reset_url',U('rPassword'));
		$this -> assign('firstPage_url',U('Student/Stu/course_info'));

		if(!empty($_POST)){
			$student_id=$_POST['student_id'];			
            $password=$_POST['password'];
            $verify=$_POST['verify'];
            $Verify = new \Think\Verify();  

            $student=D('student');
            $studentinfo = $student->select($student_id);
            if(empty($student_id)){
            	$this->error('学号不能为空！');
            }
            if(empty($password)){
            	$this->error('密码不能为空！');
            }
            if(empty($verify)){
            	$this->error('验证码不能为空！');
            }
            if(!$Verify->check($verify)){
            	$this->error("验证码错误！");
            }
            else{
	            foreach($studentinfo as $key => $s){
	            	if(!empty($studentinfo)){
		                if($studentinfo[$key]['password'] == $password){
		                    $this->success('登陆成功！');
		                    session('id',$student_id);
		                    $student = D('student')->select($_SESSION['id']);
					   	 	foreach ($student as $key => $value) {
					   	 		session('name',$student[$key]['student_name']);
					   	 	}	
		                    $this->redirect('Student/Stu/course_info',array('student_id'=>$student_id));
		                }else{
		                    $this->error('密码出错，请重新输入！402'); 
		                    $this->redirect('Login/login');
		                }
	            	}
	            	else{
	                //学号不存在
	                	$this->error('学号不存在！ 403');
	            	}
	            }
        	}
        }else{
        	$this -> display();
        }
	}

	function rPassword(){
		$this->assign('login_url',U('login'));
		$this -> display();
	}
}