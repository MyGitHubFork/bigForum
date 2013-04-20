<?php
    /**
	 * 添加通知php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_notice.php';
	 $notice = new NoticeModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 //判断是否有文件上传
	 if(isset($_FILES['content']) && isset($_POST['title'])){
	 	if($_FILES['content']['error'] == UPLOAD_ERR_OK){
	 		$guid = create_guid();
			$extension = end(explode(".",strtolower($_FILES['content']['name'])));
			$url = "notice/".$guid.".".$extension;
	 		//上传成功
	 		$result = move_uploaded_file($_FILES["content"]["tmp_name"], $url);
			
			//判断是否移动成功
			if($result){
				$date = date('Y-m-d', mktime());
				$title = $_POST['title'];
				$content = $url;
				$result = $notice->insert($title, $content, $date);

				if($result == true){
					$smarty->assign('notice_add_infor', "添加成功");
				}else{
					$smarty->assign('notice_add_infor', "更新数据库失败");
				}
				
			}else{
				$smarty->assign('notice_add_infor', "移动文件失败");
			}
	 	}else{
	 		$smarty->assign('notice_add_infor', "上传文件失败");
	 	}
	 }
	 
	 $smarty->assign("notice_add", "active");
	 $smarty->display("notice_add.html");
?>