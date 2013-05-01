<?php
	/**
	 * 验证用户是否已经登录
	 */
    include_once 'global.php';
	
	//判断用户名是否为空
	if($_SESSION['account'] == NULL){
		header("location: login.php");
		exit;
	}
?>