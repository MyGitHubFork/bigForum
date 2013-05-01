<?php
     /**
	 * 删除录像php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_video.php';
	 $video = new VideoModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 
	 $result = $video->delete_by_id($id);
	 isset($_SERVER['HTTP_REFERER']) ? $location = $_SERVER['HTTP_REFERER'] : $location = 'video_list.php';
	 header("location: $location");
?>