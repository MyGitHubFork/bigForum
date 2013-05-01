<?php
	/**
	 * 主页php
	 */
	 
	 include_once 'global.php';//包含全局函数
	 include_once 'db_user.php';
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 //判断是否更改密码
	 if(isset($_POST['password']) && isset($_POST['password2'])){
	 	$user = new UserModel($db);
	 
		 if($_POST['password'] == $_POST['password2']){
		 	//俩次密码一样
		 	$password_md5 = md5($_POST['password']);
			
			$result = $user->update($password_md5);
			
			if($result){
				$smarty->assign(array("status" => 'success', "info" => '修改密码成功'));	
			}else{
				$smarty->assign(array("status" => 'error', "info" => '修改密码失败'));	
			}			
		 }else{
		 	$smarty->assign(array("status" => 'error', "info" => '两次密码不一样'));
		 }
	 }
	 
	 
	 //只是正在访问链接
	 $smarty->assign("index", "active");
	 $smarty->display("index.html");
?>