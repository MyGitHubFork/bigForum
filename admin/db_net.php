<?php
    include_once 'global.php';
	
	/**
	 * 用户类
	 */
	class NetModel{
		private $db;
		public function __construct($db){
			$this->db = $db;
		}		
		
		public function update($class, $content){
			$sql = "update `b_net` set `content`='$content' where `class`='$class'";
			
			$query = $this->db->query($sql);
			
			if($query) return true;
			return FALSE;
		}
		
		public function select_by_class($class){
			$sql = "select * from `b_net` where `class`='$class'";
			$result = NULL;
			$query = $this->db->query($sql);
			
			if($row = $this->db->fetch_array($query)){
				$result[] = array("id" => $row['id'],"content" => $row['content']);
			}
			return $result;
		}
	}
?>