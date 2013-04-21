<?php
	 /**
	 * 通知php
	 */
	include_once ('global.php');
	include_once 'admin/db_notice.php';
	$notice = new NoticeModel($db);

	isset($_GET['id']) ? $id = $_GET['id'] : $id = 1;

	$result = $notice -> select_by_id($id);

	//指派变量
	if ($result != NULL) {
		$smarty -> assign(array("title" => $result['title'], "content" => $result['content'], "date" => $result['date']));
	}

	$smarty -> display("notice.html");
?>