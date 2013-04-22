<?php
	/**
	 * 配置网站php
	 */
	 
	 include_once 'global.php';//包含全局函数
	 include_once 'db_net.php';
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 $net = new NetModel($db);
	 
	 //判断是否更新title
	 if(isset($_POST['title'])){
	 	$result = $net->update('title', $_POST['title']);
		 
		if($result){
			$smarty->assign(array('title_status' => "success", 'title_info'=>"更新成功"));		
		}else{
			$smarty->assign(array('title_status' => "error", 'title_info'=>"更新失败"));
		}
	 }
	 
	 //判断是否更新标题
	 if(isset($_POST['h1'])){
	 	$result = $net->update('h1', $_POST['h1']);
		 
		if($result){
			$smarty->assign(array('h1_status' => "success", 'h1_info'=>"更新成功"));		
		}else{
			$smarty->assign(array('h1_status' => "error", 'h1_info'=>"更新失败"));
		}
	 }
	 
	 //判断是否更新页脚
	 if(isset($_POST['footer'])){
	 	$result = $net->update('footer', htmlspecialchars($_POST['footer']));
		 
		if($result){
			$smarty->assign(array('footer_status' => "success", 'footer_info'=>"更新成功"));		
		}else{
			$smarty->assign(array('footer_status' => "error", 'footer_info'=>"更新失败"));
		}
	 }
	 
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
	 
	 //只是正在访问链接
	 $smarty->assign("setting", "active");
	 $smarty->display("setting.html");
?>