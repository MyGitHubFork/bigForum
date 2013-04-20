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
	 
	 //获取当前也通知列表
	 $result = $notice->get_page($current_page, $page_size);
	 
	 //获取页码列表
	 $pagination_count = 5;
	 
	 for($i = $pagination_count; $i >0 ; $i--){
	 	if(($current_page - $i) >= 1){
	 		$temp[] = $current_page - $i;
	 	}	 	
	 }
	 $temp[] = $current_page;
	 for($i = 1; $i <= $pagination_count; $i++){
	 	if(($current_page + $i) <= $total_page){
	 		$temp[] = $current_page + $i;
	 	}	 	
	 }
	 
	 for($i = 0; $i < count($temp); $i++){
	 	
		$page_status = '';
		if($temp[$i] == $current_page){
			$page_status = 'active';
		}
	 	$paginations[] = array('id' => $temp[$i],
								'page_status' => $page_status);
	 }
	 
	 //指派页码
	 $smarty->assign('paginations', $paginations);
	 
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