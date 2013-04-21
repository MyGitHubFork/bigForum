<?php
     /**
	 * 删除通知php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_message.php';
	 $message = new MessageModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 
	 $result = $message->delete_by_id($id);
	 isset($_SERVER['HTTP_REFERER']) ? $location = $_SERVER['HTTP_REFERER'] : $location = 'message_list.php';
	 header("location: $location");
?>