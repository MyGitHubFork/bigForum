<?php
    /**
	 * 添加相关下载php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_video.php';
	 $video = new VideoModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 //判断是否有添加内容
	 if(isset($_POST['content']) && isset($_POST['title'])){						
		$title = $_POST['title'];
		$content = $_POST['content'];
		$result = $video->insert($title, $content);

		if($result == true){
			$smarty->assign('video_add_infor', "添加成功");
		}else{
			$smarty->assign('video_add_infor', "更新数据库失败");
		}
	 }
	 
	 $smarty->assign("video_add", "active");
	 $smarty->display("video_add.html");
?>