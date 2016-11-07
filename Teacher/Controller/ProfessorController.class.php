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

}