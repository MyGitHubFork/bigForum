<?php
	/**
	 * 主页php
	 */
	 
	 include_once 'global.php';//包含全局函数
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 //只是正在访问链接
	 $smarty->assign("index", "active");
	 $smarty->display("index.html");
?>