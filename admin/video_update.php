<?php
    /**
	 * 更改视频php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_video.php';
	 $video = new VideoModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 //判断是否有文件上传
	 if(isset($_GET['id']) && isset($_POST['title']) && isset($_POST['content'])){			
		$title = $_POST['title'];
		$content = $_POST['content'];
		$result = $video->update_by_id($_GET['id'], $title, $content);

		if($result == true){
			$smarty->assign('video_add_infor', "更新文件成功");
		}else{
			$smarty->assign('video_add_infor', "更新数据库失败");
		}
	 }
	 
	 //获取通知的内容
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 
	 $result = $video->select_by_id($id);
	 
	 //指派变量
	 if($result != NULL){
	 	$smarty->assign(array("title" => $result['title'], "content" => $result['content']));
	 }
	 $smarty->display("video_update.html");
?>