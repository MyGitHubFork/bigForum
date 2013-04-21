<?php
	/**
	 * 验证用户帐号密码是否正确
	 */
	include_once 'global.php';
	include_once 'db_user.php';
	
	$user = new UserModel($db);
	$result = false;
	if(isset($_POST['account']) && isset($_POST['password'])){
		//过滤用户输入
		$result = $user->check(addslashes($_POST["account"]), md5(addslashes($_POST['password'])));
	}
	
	if($result){
		//登录成功
		$_SESSION['account'] = $_POST['account'];
		header("location: index.php");
	}else{
		//重新登录
		$smarty->assign("error_infor", "帐号或密码错误");
		$smarty->assign("account", $_POST['account']);
		//header("location: login.php");
		include 'login.php';
	}
?>