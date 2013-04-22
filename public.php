<?php
	/**
	 * public php
	 */
	 include_once 'admin/db_net.php';
	 
	 $net = new NetModel($db);
	 
	 //查询当前标题
	 if(($result = $net->select_by_class('title')) != NULL){
	 	$smarty->assign('title_content', $result[0]['content']);
	 }
	 
	 //查询当前h1
	 if($result = $net->select_by_class('h1')){
	 	$smarty->assign('h1_content', $result[0]['content']);
	 }

	//查询当前页脚
	 if($result = $net->select_by_class('footer')){
	 	$smarty->assign('footer_content', $result[0]['content']);
	 }	 
?>