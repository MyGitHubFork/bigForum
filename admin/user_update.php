<?php

	/**
	 * 更新用户边
	 */
	 include_once 'global.php';
	 include_once 'db_user.php';
	 
	 $user = new UserModel($db);
	 
	 if($_POST['password'] == $_POST['password2']){
	 	//俩次密码一样
	 	$password_md5 = md5($_POST['password']);
		
		$result = $user->update($password_md5);
	 }
	