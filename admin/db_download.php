<?php
    include_once 'global.php';
	
	/**
	 * 相关下载类
	 */
	class DownloadModel{
		private $db;
		public function __construct($db){
			$this->db = $db;
		}
		
		/**
		 * 添加通知
		 * @method check
		 * @param $title {string} 标题
		 * @param $url {string} 地址
		 * @return {bollean} 是否添加成功
		 */
		public function insert($title, $url){
			$date = date('Y-m-d H:m:s', mktime());
			$sql = "insert into `b_download` (`title`, `url`, `datetime`) values('$title', '$url', '$date')";
			
			$query = $this->db->query($sql);
			if($query) return true;
			return FALSE;
		}
		
		public function update_by_id($id, $title, $content){
			if($content != NULL){
				$sql = "update `b_download` set `title`='$title', `url`='$content' where `id`=$id";
			}else{
				$sql = "update `b_download` set `title`='$title' where `id`=$id";
			}
			$query = $this->db->query($sql);
			
			if($query) return true;
			return FALSE;
		}
		
		public function select_by_id($id){
			$sql = "select * from `b_download` where `id`=$id";
			
			$query = $this->db->query($sql);
			$result = NULL;
			if($row = $this->db->fetch_array($query)){
				$result = array(
					'id' => $row['id'],
					'title' => $row['title'],
					'content' => $row['url'],
					'date' => $row['datetime']
				);
			}
			
			return $result;
		}
		
		public function delete_by_id($id){
			$sql = "delete from `b_download` where `id`=$id";
			
			$query = $this->db->query($sql);
			if($query) return true;
			return FALSE;
		}
		/**
		 * 获取总行数
		 */
		 public function get_total_row(){
		 	$sql = "select id from `b_download`";
			
			$query = $this->db->query($sql);
			
			$row = $this->db->db_num_rows();

			return $row;
		 }
		 
		 public function get_total_page($page_size){
		 	$arr = ceil($this->get_total_row()/$page_size);
			return $arr;
		 }
		 
		 public function get_page($page, $page_size){
		 	$offset = ($page - 1) * $page_size;
		 	$sql = "select * from `b_download` order by `id` desc limit $offset, $page_size";
			
			$query = $this->db->query($sql); 
			$result = array();
			
			while ($row = $this->db->fetch_array($query)){
				$result[] = array(
					'id' => $row['id'],
					'title' => $row['title'],
					'content' => $row['url'],
					'date' => $row['datetime']
				);
			}
			
			return $result;
		 }
	}
?>