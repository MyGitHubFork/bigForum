<?php
     /**
	 * 删除下载php
	 */
	 
	 include_once 'global.php';
	 include_once 'db_download.php';
	 $download = new DownloadModel($db);
	 
	 //包含验证是否登录
	 include_once 'check_logining.php';
	 
	 isset($_GET['id']) ? $id = $_GET['id'] : $id = -1;
	 
	 $result = $download->delete_by_id($id);
	 isset($_SERVER['HTTP_REFERER']) ? $location = $_SERVER['HTTP_REFERER'] : $location = 'download_list.php';
	 header("location: $location");
?>