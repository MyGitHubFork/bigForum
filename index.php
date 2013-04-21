<?php
	/**
	 * 主页php
	 */
	 include_once('global.php');
	 include_once 'admin/db_notice.php';
	$notice = new NoticeModel($db);
	
	$result = $notice->get_page(1, 8);
	
	$smarty->assign('notices', $result);
	
	$smarty->display("index.html");
?>