<?php
     /**
	 * 删除通知php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_notice.php';
	 $notice = new NoticeModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 
	 $result = $notice->delete_by_id($id);
	 isset($_SERVER['HTTP_REFERER']) ? $location = $_SERVER['HTTP_REFERER'] : $location = 'notice_list.php';
	 header("location: $location");
?>