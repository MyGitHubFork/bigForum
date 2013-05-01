<?php
    include_once 'global.php';
	
	/**
	 * 用户类
	 */
	class UserModel{
		private $db;
		public function __construct($db){
			$this->db = $db;
		}
		
		/**
		 * 验证用户名密码是否正确
		 * @method check
		 * @param $account {string} 用户名
		 * @param $password {string} 密码
		 * @return {bollean} 是否正确
		 */
		public function check($account, $password){
			$sql = "select id from b_user where account='$account' and password='$password'"; 
			
			$query = $this->db->query($sql);
			
			if($row=$this->db->fetch_array($query)){
				return true;
			}
			
			return false;
		}
		
		public function update($password_md5){
			if($password_md5 != NULL){
				$sql = "update `b_user` set `password`='$password_md5' where `account`='admin'";
			}else{
				
			}

			$query = $this->db->query($sql);
			
			if($query) return true;
			return FALSE;
		}
	}
?>