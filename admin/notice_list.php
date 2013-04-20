<?php
    /**
	 * 添加通知php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_notice.php';
	 $notice = new NoticeModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 $page_size = 20;
	 $total_row = $notice->get_total_row();
	 $total_page = $notice->get_total_page($page_size);
	 $current_page = 1;
	 if(isset($_GET['current_page'])){
	 	$current_page = (int)$_GET['current_page'];
	 }
	 
	 //升值上一页和下一页
	 $pre_page = $current_page - 1;
	 $next_page = $current_page + 1;
	 
	 //判断下一页和最后一页的状态
	 if($current_page >= $total_page){
	 	$next_page_status = 'disabled';
		$last_page_status = 'disabled';
	 }
	 
	 //判断上一页首页的状态
	 if($current_page <= 1){
	 	$first_page_status = 'disabled';
		$pre_page_status = 'disabled';
	 }
	 
	 $result = $notice->get_page($current_page, $page_size);
	 
	 //指派通知列表
	 $smarty->assign('notices', $result);
	 
	 //指派页码信息
	 $smarty->assign(array("total_row" => $total_row,
	 						"total_page" => $total_page,
							"page_size" => $page_size,
							"pre_page" => $pre_page,
							"next_page" => $next_page,
							"first_page_status" => $first_page_status,
							"pre_page_status" => $pre_page_status,
							"next_page_status" =>$next_page_status,
							"last_page_status" => $last_page_status));
	
	 //指派列表导航激活信息						
	 $smarty->assign("notice_list", "active");
	 $smarty->display("notice_list.html");
?>