<?php
	/**
	 * 退出php
	 */
	 
	 include_once 'global.php';
	 
	 $_SESSION['account'] = NULL;
	 
	 header("location: login.php"); 
?>
	