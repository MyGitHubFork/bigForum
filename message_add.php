<?php
	 /**
	 * 添加留言php
	 */
	include_once ('global.php');
	include_once 'admin/db_message.php';
	
	$message = new MessageModel($db);
	
	if(isset($_POST['content']) && $_POST['content'] != ''){
		$content = addslashes(htmlspecialchars($_POST['content']));
		$message->insert($content);
	}
	
	header("location: message.php")
?>