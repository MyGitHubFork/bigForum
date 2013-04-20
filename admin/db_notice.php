<?php
    include_once 'global.php';
	
	/**
	 * 通知类
	 */
	class NoticeModel{
		private $db;
		public function __construct($db){
			$this->db = $db;
		}
		
		/**
		 * 添加通知
		 * @method check
		 * @param $title {string} 标题
		 * @param $content {string} 内容
		 * @param $date {string} 时间
		 * @return {bollean} 是否添加成功
		 */
		public function insert($title, $content, $date){
			$sql = "insert into `b_notice` (`title`, `content`, `date`) values('$title', '$content', '$date')";
			
			$query = $this->db->query($sql);
			if($query) return true;
			return FALSE;
		}
		
		/**
		 * 获取总行数
		 */
		 public function get_total_row(){
		 	$sql = "select id from `b_notice`";
			
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
		 	$sql = "select * from `b_notice` order by `date` desc limit $offset, $page_size";
			
			$query = $this->db->query($sql); 
			$result = array();
			
			while ($row = $this->db->fetch_array($query)){
				$result[] = array(
					'id' => $row['id'],
					'title' => $row['title'],
					'content' => $row['content'],
					'date' => $row['date']
				);
			}
			
			return $result;
		 }
	}
?>