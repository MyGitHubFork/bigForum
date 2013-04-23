<?php
    /**
	 * 通过审核的留言列表php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_message.php';
	 $message = new MessageModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 $page_size = 20;
	 $status = 1;
	 $total_row = $message->get_total_row_by_status($status);
	 $total_page = $message->get_total_page_by_status($page_size, $status);
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
	 $result = $message->get_page_by_status($current_page, $page_size, $status);
	 
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
	 $smarty->assign('messages', $result);
	 
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
	 $smarty->assign("message_list", "active");
	 $smarty->display("message_list.html");
?>