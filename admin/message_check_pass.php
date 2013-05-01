<?php
     /**
	 * 留言通过审核php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_message.php';
	 $message = new MessageModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 $status = 1;
	 
	 $result = $message->update_status_by_id($status, $id);
	 isset($_SERVER['HTTP_REFERER']) ? $location = $_SERVER['HTTP_REFERER'] : $location = 'message_list.php';
	 header("location: $location");
?>