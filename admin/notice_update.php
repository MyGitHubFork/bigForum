<?php
    /**
	 * 更改通知php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_notice.php';
	 $notice = new NoticeModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 //判断是否有文件上传
	 if(isset($_POST['title']) && isset($_GET['id'])){
	 	if(isset($_FILES['content']) && $_FILES['content']['error'] == UPLOAD_ERR_OK){
	 		$guid = create_guid();
			$extension = end(explode(".",strtolower($_FILES['content']['name'])));
			$url = "notice/".$guid.".".$extension;
	 		//上传成功
	 		$result = move_uploaded_file($_FILES["content"]["tmp_name"], $url);
			
			//判断是否移动成功
			if($result){
				//删除原来文件
				$result = $notice->select_by_id($_GET['id']);
				$file_delete = $result['content'];
				$result = unlink($file_delete);
				
				$date = date('Y-m-d', mktime());
				$title = $_POST['title'];
				$content = $url;
				$result = $notice->update_by_id($_GET['id'], $title, $content);

				if($result == true){
					$smarty->assign('notice_add_infor', "更新文件成功");
				}else{
					$smarty->assign('notice_add_infor', "更新数据库失败");
				}
				
			}else{
				$smarty->assign('notice_add_infor', "移动文件失败");
			}
	 	}else{
	 		$result = $notice->update_by_id($_GET['id'], $_POST['title'], NULL);
	 		if($result == true){
				$smarty->assign('notice_add_infor', "更新成功");
			}else{
				$smarty->assign('notice_add_infor', "更新数据库失败");
			}
	 	}
	 }
	 
	 //获取通知的内容
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 
	 $result = $notice->select_by_id($id);
	 
	 //指派变量
	 if($result != NULL){
	 	$smarty->assign(array("title" => $result['title']));
	 }
	 $smarty->display("notice_update.html");
?>