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
		$course_id = I('course_id');
		$course_info = M("course")->where("course_id = '$course_id'")->select();
		$this->assign('course_file_conf_url',U('course_file_conf'));
		$this -> assign('login_url',U('Home/Login/login'));
		$this->assign('check_file_conf_url',U('check_file_conf'));

		$this -> assign('course_info',$course_info);
		$this -> display();
	}

	function course_file_conf(){
		$course_name = I('course_name');
		$course_id = I('course_id');
		$this -> assign('list_course_name',$course_name);
		$this -> assign('list_course_id',$course_id);

		if(!empty($_POST)){
			$file_type_array = array(
				'file_type_id' => 1,
				'course_id' => $_POST['list_course_id'],
				'file_id' => 0,
				'file_type_name' => $_POST['file-type'],
				'allowed_mime_list' => '',
				'allowed_suffix_list' => $_POST['allowed_suffix_doc'].$_POST['allowed_suffix_docx'].$_POST['allowed_suffix_zip'],
				'allowed_max_size' => $_POST['allowed_max_size'],
				'file_deadline' => '',
				'need_to_submit_papety_doc' => 0,
				'score_enable' => 0,
				'score_max_value' => 100,
				'score_increasement_unit' => 1,
				'comments_enable' => 1,
				'notes' => '报告测试',
				);
			$test = M("file_property")->add($file_type_array);
			$this -> redirect('manage_info');
			//dump(M("file_property")->getLastSql());
		}
		$this -> assign('course_file_conf_url',U('course_file_conf'));
		$this -> display();
	}

	function check_file_conf() {
		$course_id = I("course_id");
		$file_info = M("file_property")->where("course_id = '$course_id'")->field('file_type_id, file_type_name, file_deadline, allowed_suffix_list, allowed_max_size')->select();
		$this->assign('edit_file_url',U('edit_file'));
		$this -> assign('login_url',U('Home/Login/login'));
		$this -> assign('course_id',$course_id);

		$this -> assign('file_info',$file_info);
		$this -> display();
	}

	function check_group() {
		$course_id = I('course_id');
		$this -> assign('course_id',$course_id);
		$this -> assign('edit_allocate_group_url',U('edit_allocate_stugroup'));
		$info = M("course")->where("course_id = '$course_id'")->select();

		$stu_groupInfo = M('stu_group')->table('course as A,project as B,student_group as C,student_group_member as D,student as E')->where("A.course_id = B.course_id and B.project_id = C.project_id and A.course_id = $course_id and C.group_id=D.group_id and D.is_groupLeader = 1 and D.student_id = E.student_id")->field('C.group_id,E.student_id')->select();
		$reply_group = M("reply")->where("course_id = '$course_id'")->field('reply_group_id,group_leader_id')->select();

		foreach ($reply_group as $key => $s) {
			$reply_group_id = $reply_group[$key]['reply_group_id'];
			$reply_group[$key]['reply_groupMember'] = M("reply_member")->table('reply_member as A,teacher as B')->where("A.teacher_id=B.teacher_id and A.reply_group_id = '$reply_group_id'")->field('B.teacher_id,B.teacher_name')->select();
		}

		$this->assign('edit_group_url',U('edit_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('course_info',$info);
		$this -> assign('reply_group_info',$reply_group);
		$this->assign('stu_groupInfo',$stu_groupInfo);
		$this -> display();
	}

	function edit_allocate_stugroup(){
		$course_id = I('course_id');
		$reply_group_id = I('reply_group_id');
		$this -> assign('reply_id',$reply_group_id);

		$reply_group = M("reply")->where("course_id = '$course_id' and reply_group_id = '$reply_group_id'")->field('reply_group_id,group_leader_id')->select();

		foreach ($reply_group as $key => $s) {
			$reply_group_id = $reply_group[$key]['reply_group_id'];
			$reply_group[$key]['reply_groupMember'] = M("reply_member")->table('reply_member as A,teacher as B')->where("A.teacher_id=B.teacher_id and A.reply_group_id = '$reply_group_id'")->field('B.teacher_id,B.teacher_name')->select();
		}

		$stu_groupInfo = M('stu_group')->table('course as A,project as B,student_group as C,student_group_member as D,student as E')->where("A.course_id = B.course_id and B.project_id = C.project_id and A.course_id = $course_id and C.is_replyAllocated = 0 and C.group_id=D.group_id and D.is_groupLeader = 1 and D.student_id = E.student_id")->field('C.group_id,E.student_id')->select();

		if(!empty($_POST)){
				$stuGroup_id = $_POST['reply_stuGroup_id'];
				$add_reply_stugroup = D('reply_stugroup');
				$reply_stugroup_array = array(
					'reply_group_id' => $_POST['reply_id'],
					'stu_groupId' => $_POST['reply_stuGroup_id'],
				);
				$reply_stuGroup = $add_reply_stugroup -> add($reply_stugroup_array);

				$modify_stu_group = M('student_group');
				$modify_stugroup_array = array(
					'is_replyAllocated' => 1,
					'reply_group_id' => $_POST['reply_id'],
				);
				$modify_stugroup = $modify_stu_group -> where("group_id = '$stuGroup_id'")->save($modify_stugroup_array);
				$this -> redirect('manage_info');
			}else{

		}
		
		$this->assign('edit_group_url',U('edit_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('reply_group_info',$reply_group);
		$this->assign('stu_groupInfo',$stu_groupInfo);
		$this->display();
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
			$modify_course_info->where("course_name = '$list_course_name'")->field('reply_num, group_num, teacher_course_max, stu_course_max')->save($modify_info);
			$this -> redirect('manage_info');
		}else{

		}
		$this -> display();
	}

	function edit_file() {
		$file_type_id = I('file_type_id');
		$file_type_name = I('file_type_name');
		$course_id = I('course_id');
		$this -> assign('file_type_name',$file_type_name);
		$this -> assign('file_type_id',$file_type_id);
		$this -> assign('course_id',$course_id);
		$this -> assign('edit_file_url',U('edit_file'));

		if(!empty($_POST)){
			$modify_file_type_id = $_POST['modify_file_type_id'];
			$course_id = $_POST['course_id'];
			$file_type_name = $_POST['file_type_name'];
			$modify_file_type_array = array(
				'allowed_suffix_list' => $_POST['modify_allowed_suffix_doc'].$_POST['modify_allowed_suffix_docx'].$_POST['modify_allowed_suffix_zip'],
				'allowed_max_size' => $_POST['modify_allowed_max_size'],
				'file_deadline' => $_POST['modify_file_deadline'],
				);
			$modify_file_info = M("file_property");
			$modify_file_info->where("file_type_id ='$modify_file_type_id' and course_id = '$course_id' and file_type_name = '$file_type_name'")->field('allowed_suffix_list,allowed_max_size,file_deadline')->save($modify_file_type_array);
		}
		$this -> display();
	}

	function edit_group() {
		$course_id = I('course_id');
		$this -> assign('edit_group_url',U('edit_group'));
		$info = M("Course") -> where("course_id = '$course_id'") -> select();
		$group_teacher = M("Teacher") -> select();
		$this -> assign('check_group_url',U('check_group'));
		$this -> assign('login_url',U('Home/Login/login'));

		$this -> assign('info',$info);
		$this -> assign('group_teacher',$group_teacher);

		if(!empty($_POST)){
			$order = M("reply")->order('reply_group_id desc')->limit(1)->select();
			foreach ($order as $key => $s) {
				$order_result = $order[$key]['reply_group_id'];
				 $add_reply = D("reply");
				 $add_reply_array = array(
					 'reply_group_id' => $order_result + 1,
					 'course_id' => $_POST['course_id'],
					 'group_leader_id' => $_POST['group_leader_id']
				 );
				 $newReply = $add_reply -> add($add_reply_array);

				 $reply_member = D("reply_member");
				 $group_array = null;
				 $group_array = array (
				 					"0" => array (
												 'reply_group_id' => $order_result + 1,
								 				 'teacher_id' => isset( $_POST['member0'] ) ? $_POST['member0'] : null
                  ),
									"1" => array (
												 'reply_group_id' => $order_result + 1,
								 				 'teacher_id' => isset( $_POST['member1'] ) ? $_POST['member1'] : null
                  ),
									"2" => array (
												 'reply_group_id' => $order_result + 1,
								 				 'teacher_id' => isset( $_POST['member2'] ) ? $_POST['member2'] : null
                  ),
         );
				foreach ($group_array as $key => $s) {
					if($group_array[$key]['teacher_id'] == null) {

					} else {
						$newGroup = $reply_member -> add($group_array[$key]);
					}
				}
			 }
			 $this -> redirect('manage_info');
		} else{

		}
		$this -> display();
	}

	function group_info() {
		$this -> display();
	}

	//课程内容文件下载
	function course_file_download($course_id,$course_name)
	{
		  $filename = './Uploads/course_file/'.$course_id.'-'.$course_name.'.docx';
		  $filename= iconv("utf-8", "gbk", $filename);
		  if ($filename == ''){
		      return FALSE;
		  }
		  if (FALSE === strpos($filename, '.')){
		      return FALSE;
		  }
		  if(!is_file($filename)){
		  	$this -> error('无相关文件！');
		  }

		  $x = explode('.', $filename);
		  $extension = end($x);
		  $mimes = getMimes();
		  // Set a default mime if we can't find it
		  if ( ! isset($mimes[$extension])){
		      $mime = 'application/octet-stream';
		  }else{
		      $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
		  }

		  $showname = $course_id.'-'.$course_name.'.docx';

		  // Generate the server headers
		  if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		  {
		      header('Content-Type: "'.$mime.'"');
		      header('Content-Disposition: attachment; filename="'.$showname.'"');
		      header('Expires: 0');
		      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		      header("Content-Transfer-Encoding: binary");
		      header('Pragma: public');
		      header("Content-Length: ".filesize($filename));
		  }
		  else
		  {
		      header('Content-Type: "'.$mime.'"');
		      header('Content-Disposition: attachment; filename="'.$showname.'"');
		      header("Content-Transfer-Encoding: binary");
		      header('Expires: 0');
		      header('Pragma: no-cache');
		      header("Content-Length: ".filesize($filename));
		  }
		  readfile($filename);
	}
}
