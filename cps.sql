# Host: localhost  (Version: 5.5.53)
# Date: 2016-12-13 21:24:18
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "course"
#

CREATE TABLE `course` (
  `course_id` char(11) NOT NULL DEFAULT '' COMMENT '课程编号id',
  `course_status` smallint(6) NOT NULL DEFAULT '0' COMMENT '课程状态值',
  `course_detail_info` text NOT NULL COMMENT '课程criteria',
  `course_name` varchar(255) DEFAULT NULL COMMENT '课程名称',
  `reply_num` int(11) DEFAULT '0' COMMENT '答辩组人数',
  `group_num` int(11) DEFAULT '0' COMMENT '学生组人数',
  `teacher_course_max` int(11) DEFAULT '0' COMMENT '教师最大申请课题数',
  `stu_course_max` int(11) DEFAULT '0' COMMENT '学生最大申请课题数',
  PRIMARY KEY (`course_id`) COMMENT '课程表'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "course"
#

INSERT INTO `course` VALUES ('1',1,'发水电费','综合课程设计1',2,5,6,7),('2',0,'水电费的萨芬都是','综合课程设计2',60,60,3,3),('3',0,'是对方的身份','综合课程设计3',4,5,6,7);

#
# Structure for table "file"
#

CREATE TABLE `file` (
  `file_id` char(11) NOT NULL DEFAULT '' COMMENT '文件编号id',
  `course_id` char(11) DEFAULT NULL COMMENT '课程id',
  `group_id` char(11) NOT NULL DEFAULT '' COMMENT '学生组编号id',
  `file_name` varchar(50) NOT NULL DEFAULT '' COMMENT '文件名称',
  `file_size` int(11) NOT NULL DEFAULT '0' COMMENT '文件大小',
  `file_uri` varchar(100) NOT NULL DEFAULT '' COMMENT '文件路径名',
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上次更新时间',
  `file_notes` varchar(255) NOT NULL DEFAULT '' COMMENT '文件备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文件状态',
  `review_result` char(10) DEFAULT NULL COMMENT '评审结果',
  `final_reviewer_id` int(11) NOT NULL DEFAULT '0' COMMENT '最终评审人编号id',
  PRIMARY KEY (`file_id`) COMMENT '文件表'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "file"
#


#
# Structure for table "file_property"
#

CREATE TABLE `file_property` (
  `file_type_id` int(11) NOT NULL DEFAULT '0' COMMENT '文件类型编号id',
  `course_id` char(11) NOT NULL DEFAULT '' COMMENT '课程id',
  `project_id` char(1) DEFAULT NULL COMMENT '课题id',
  `file_id` char(11) DEFAULT NULL COMMENT '文件编号id',
  `file_type_name` varchar(32) NOT NULL DEFAULT '' COMMENT '文件类型名称',
  `allowed_mime_list` varchar(100) NOT NULL DEFAULT '' COMMENT '允许的MIME列表，以逗号分隔',
  `allowed_suffix_list` varchar(45) NOT NULL DEFAULT '' COMMENT '允许的后缀列表，以逗号分隔',
  `allowed_max_size` int(11) NOT NULL DEFAULT '0' COMMENT '允许的最大文件大小，单位M',
  `file_deadline` date DEFAULT NULL COMMENT '截止日期',
  `need_to_submit_papety_doc` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否需要提交纸质版本：0->No，1->Yes',
  `score_enable` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否允许评分：0->No,1->Yes',
  `score_max_value` smallint(4) NOT NULL DEFAULT '0' COMMENT '分数最大值',
  `score_increasement_unit` float DEFAULT NULL COMMENT '分数增长步长，比如按1分增长，或按0.5分增长',
  `comments_enable` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否允许评论：0->No,1->Yes',
  `notes` varchar(1024) NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`file_type_id`,`course_id`,`file_type_name`) COMMENT '文件属性表'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "file_property"
#

INSERT INTO `file_property` VALUES (1,'1',NULL,'0','平时报告','','doc',6,'0000-00-00',0,0,100,1,1,'报告测试'),(1,'1',NULL,'0','期中报告','','zip',4,'2016-11-22',0,0,100,1,1,'报告测试'),(1,'1',NULL,'0','结题报告','','docx',7,'2016-11-18',0,0,100,1,1,'报告测试');

#
# Structure for table "professor"
#

CREATE TABLE `professor` (
  `project_id` varchar(10) NOT NULL DEFAULT '' COMMENT '课题编号id',
  `teacher_id` char(11) NOT NULL DEFAULT '' COMMENT '教师编号id',
  PRIMARY KEY (`project_id`,`teacher_id`) COMMENT '专家',
  KEY `FK_Reference_17` (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "professor"
#


#
# Structure for table "project"
#

CREATE TABLE `project` (
  `project_id` varchar(10) NOT NULL DEFAULT '' COMMENT '课题编号id',
  `course_id` char(11) DEFAULT NULL COMMENT '课程编号id',
  `teacher_id` char(11) DEFAULT NULL COMMENT '教师编号id',
  `project_name` char(11) NOT NULL DEFAULT '' COMMENT '课题名称',
  `project_status` decimal(4,0) DEFAULT NULL COMMENT '课题状态：0->拒绝,1->待审核,2->已同意',
  `main_project` text NOT NULL COMMENT '课题主要内容',
  `middle_expected_result` text NOT NULL COMMENT '期中课题期待结果',
  `middle_expected_context` text COMMENT '中期预期形式',
  `accessary_path` varchar(1) NOT NULL DEFAULT '' COMMENT '附件路径',
  `project_comment_info` text COMMENT '课题评论criteria',
  `final_reviewer_id` int(11) NOT NULL DEFAULT '0' COMMENT '最终评审人编号id',
  `final_expected_result` text COMMENT '结题期待成果',
  `final_expected_context` text COMMENT '预期成果形式',
  `review_score` int(10) DEFAULT NULL COMMENT '教授审核教师申请课题评审成绩',
  `review_context` text COMMENT '教授审核教师申请课题评审内容',
  PRIMARY KEY (`project_id`) COMMENT '课题'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "project"
#

INSERT INTO `project` VALUES ('1','1','1','不是都',1,'地山东分公司的风格说的根深蒂固','分哀伤的故事点噶十大股东撒公司的',NULL,'是','水电费',1,'受到公司的公司的公司的公司的公司打工','第三方的身份',93,'sad '),('2','1','1','微分法',2,'十对方公司的风格的发生过似的','公啊上的尴尬是大时代公司的广告',NULL,'十','归属感',1,'啊是的噶十多个萨嘎三国杀大概多少个','三等功',97,'第三方'),('3','2','1','德国',2,'受的方式公司的风格山东分公司地方','发撒大哥撒大哥撒大哥撒个',NULL,'对','撒旦法',2,'是的噶是的噶是噶是噶时光','范甘迪',90,'分公司');

#
# Structure for table "reply"
#

CREATE TABLE `reply` (
  `reply_group_id` char(11) NOT NULL DEFAULT '' COMMENT '答辩组编号id',
  `course_id` char(11) DEFAULT NULL COMMENT '课程编号id',
  `group_leader_id` char(11) NOT NULL DEFAULT '' COMMENT '答辩组组长编号id',
  PRIMARY KEY (`reply_group_id`) COMMENT '答辩组'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "reply"
#

INSERT INTO `reply` VALUES ('1','1','2'),('2','2','5'),('3','1','1'),('4','1','1'),('5','1','2');

#
# Structure for table "reply_member"
#

CREATE TABLE `reply_member` (
  `reply_group_id` char(11) NOT NULL DEFAULT '' COMMENT '答辩组编号id',
  `teacher_id` char(11) NOT NULL DEFAULT '' COMMENT '教师编号id',
  `allocated_stugroup_id` char(11) DEFAULT NULL COMMENT '分配给答辩组教室的学生组',
  PRIMARY KEY (`reply_group_id`,`teacher_id`) COMMENT '答辩组成员'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "reply_member"
#

INSERT INTO `reply_member` VALUES ('1','1','4'),('1','2',NULL),('1','3',NULL),('2','4',NULL),('2','5',NULL),('2','6',NULL),('3','1',NULL),('3','3',NULL),('3','5',NULL),('4','1',NULL),('4','2',NULL),('4','7',NULL),('5','2',NULL),('5','4',NULL),('5','6',NULL);

#
# Structure for table "reply_stugroup"
#

CREATE TABLE `reply_stugroup` (
  `reply_group_id` char(11) NOT NULL DEFAULT '' COMMENT '答辩组id',
  `stu_groupId` char(11) NOT NULL DEFAULT '' COMMENT '学生组id',
  PRIMARY KEY (`reply_group_id`,`stu_groupId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='答辩组-学生组';

#
# Data for table "reply_stugroup"
#

INSERT INTO `reply_stugroup` VALUES ('1','4');

#
# Structure for table "reply_teacher"
#

CREATE TABLE `reply_teacher` (
  `group_id` char(1) NOT NULL DEFAULT '0' COMMENT '学生组编号id',
  `teacher_id` char(1) NOT NULL DEFAULT '0' COMMENT '教师编号id',
  PRIMARY KEY (`group_id`,`teacher_id`) COMMENT '答辩老师'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "reply_teacher"
#


#
# Structure for table "review_table"
#

CREATE TABLE `review_table` (
  `teacher_id` char(11) DEFAULT NULL COMMENT '教师编号id',
  `review_file_id` char(11) DEFAULT NULL COMMENT '评审文件编号id',
  `reviewer_id` char(11) DEFAULT NULL COMMENT '评审组编号id',
  `student_file_id` char(11) DEFAULT NULL COMMENT '学生文件编号id',
  `comment` text COMMENT '评论criteria',
  `review_time` datetime DEFAULT NULL COMMENT '评审时间',
  `review_status` tinyint(1) DEFAULT NULL COMMENT '评审状态：0->未评审，1->已评审',
  KEY `FK_Reference_18` (`teacher_id`) COMMENT '审核表'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "review_table"
#


#
# Structure for table "student"
#

CREATE TABLE `student` (
  `student_id` char(20) NOT NULL DEFAULT '' COMMENT '学生编号id',
  `student_name` char(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '学生姓名',
  `password` text CHARACTER SET utf8 COMMENT '学生登录密码',
  PRIMARY KEY (`student_id`) COMMENT '学生'
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

#
# Data for table "student"
#

INSERT INTO `student` VALUES ('2014220202001','张三','2014220202001'),('2014220202002','李四','2014220202002'),('2014220202003','王五','2014220202003'),('2014220202004','刘一','2014220202004'),('2014220202005','朱六','2014220202005'),('2014220202006','邓七','2014220202006'),('2014220202007','sdf','2014220202007'),('2014220202008','张帅','201422020200'),('2014220202009','邓发','2014220202009');

#
# Structure for table "student_group"
#

CREATE TABLE `student_group` (
  `group_id` char(11) NOT NULL DEFAULT '0' COMMENT '学生组编号id',
  `reply_group_id` char(11) DEFAULT NULL COMMENT '答辩组编号id',
  `project_id` varchar(10) DEFAULT NULL COMMENT '课题编号id',
  `stu_group_leader_id` char(20) NOT NULL DEFAULT '0' COMMENT '学生组组长编号id',
  `group_project_status` decimal(4,0) DEFAULT NULL COMMENT '学生组申请项目状态：0->拒绝，1->待审核，2->已通过',
  `group_middle_report_score` int(11) NOT NULL DEFAULT '0' COMMENT '学生组中期报告分数',
  `group_final_report_score` int(11) NOT NULL DEFAULT '0' COMMENT '学生组结题报告分数',
  `group_reply_score` int(11) NOT NULL DEFAULT '0' COMMENT '学生组答辩分数',
  `group_manage` text NOT NULL COMMENT '队伍操作管理',
  `group_lock` tinyint(2) DEFAULT '0' COMMENT '队伍加锁操作：0->允许队员管理，1->不允许队员管理',
  `is_replyAllocated` int(2) DEFAULT '0' COMMENT '是否已被分配答辩组：0->未被分配；1->已被分配',
  PRIMARY KEY (`group_id`) COMMENT '学生组'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "student_group"
#

INSERT INTO `student_group` VALUES ('1','1','1','4',0,0,0,0,'',0,0),('2','2','2','2',1,95,98,0,'',0,0),('3','3','3','6',2,90,89,0,'',0,0),('4','1','2','2014220202003',1,1,0,0,'',0,1),('5','1','0','2014220202007',1,1,0,0,'',0,0),('6','1','0','2014220202007',1,1,0,0,'',0,0);

#
# Structure for table "student_group_member"
#

CREATE TABLE `student_group_member` (
  `student_id` char(20) NOT NULL DEFAULT '' COMMENT '学生id（主表student)',
  `group_id` char(11) NOT NULL DEFAULT '' COMMENT '学生组id（主表student_group)',
  `student_message` text COMMENT '学生邀请信息',
  `student_message_status` tinyint(3) DEFAULT '0' COMMENT '受邀请学生同意邀请与否：0->拒绝，1->待审核，2->同意',
  `reply_group_id` char(11) DEFAULT NULL COMMENT '答辩组编号id',
  `stu_contribute_score` text NOT NULL COMMENT '学生贡献分数criteria',
  `invite_status` tinyint(3) DEFAULT NULL COMMENT '学生邀请信息同意情况：0->拒绝，1->待审核，2->同意',
  `is_available` tinyint(3) DEFAULT '0' COMMENT '该学生是否处于学生组内（对应删除功能）:0->不在，1->在',
  `is_groupLeader` tinyint(2) DEFAULT '0' COMMENT '是否为学生组组长：0->不是，1->是',
  PRIMARY KEY (`student_id`,`group_id`) COMMENT '学生id与组id共同作为主键'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "student_group_member"
#

INSERT INTO `student_group_member` VALUES ('2014220202002','1','',2,'1','80',NULL,1,1),('2014220202003','4','',2,'1','0',1,1,1),('2014220202006','4','2014220202003',2,'1','',1,1,0),('2014220202007','2','',2,'1','0',1,1,1),('2014220202007','5','',2,'1','0',1,1,1),('2014220202007','6','',2,'1','0',1,1,1),('2014220202009','3','',2,'2','',NULL,1,1);

#
# Structure for table "teacher"
#

CREATE TABLE `teacher` (
  `teacher_id` char(11) NOT NULL DEFAULT '' COMMENT '教师编号id',
  `teacher_name` char(11) DEFAULT NULL COMMENT '老师姓名',
  PRIMARY KEY (`teacher_id`) COMMENT '教师'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "teacher"
#

INSERT INTO `teacher` VALUES ('1','李娃'),('2','刘伟'),('3','刘雯雯'),('4','张珊珊'),('5','武术'),('6','张道'),('7','吴时'),('8','陆丹丹'),('9','卢大');
