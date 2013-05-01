<?php
    include_once 'global.php';
	
	/**
	 * 留言类
	 */
	class MessageModel{
		private $db;
		public function __construct($db){
			$this->db = $db;
		}
		public function insert($content){
			$date = date('Y-m-d H:m:s', mktime());
			$sql = "insert into `b_message` (`content`, `datetime`, `status`) values('$content', '$date', 0)";
			
			$query = $this->db->query($sql);
			if($query) return true;
			return FALSE;
		}
		public function update_status_by_id($status, $id){
			$sql = "update `b_message` set `status`='$status' where `id`=$id";
			
			$query = $this->db->query($sql);
			if($query) return true;
			return FALSE;
		}
		public function delete_by_id($id){
			$sql = "delete from `b_message` where `id`=$id";
			
			$query = $this->db->query($sql);
			if($query) return true;
			return FALSE;
		}
		
		public function get_total_row(){
		 	$sql = "select id from `b_message`";
			
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
		 	$sql = "select * from `b_message` order by `datetime` desc limit $offset, $page_size";
			
			$query = $this->db->query($sql); 
			$result = array();
			
			while ($row = $this->db->fetch_array($query)){
				$result[] = array(
					'id' => $row['id'],
					'content' => $row['content'],
					'date' => $row['datetime']
				);
			}
			
			return $result;
		 }
		 
		 public function get_total_row_by_status($status){
		 	$sql = "select id from `b_message` where `status`=$status ";
			
			$query = $this->db->query($sql);
			
			$row = $this->db->db_num_rows();

			return $row;
		 }
		 
		 public function get_total_page_by_status($page_size, $status){
		 	$arr = ceil($this->get_total_row_by_status($status)/$page_size);
			return $arr;
		 }
		 
		 public function get_page_by_status($page, $page_size, $status){
		 	$offset = ($page - 1) * $page_size;
		 	$sql = "select * from `b_message` where `status`=$status order by `id` desc limit $offset, $page_size";
			
			$query = $this->db->query($sql); 
			$result = array();
			
			while ($row = $this->db->fetch_array($query)){
				$result[] = array(
					'id' => $row['id'],
					'content' => $row['content'],
					'date' => $row['datetime']
				);
			}
			
			return $result;
		 }
	}
?>