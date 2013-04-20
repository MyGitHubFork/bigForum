<?php
	//分页对象
	class MyPage{
		function __construct($table,$mydbhost, $mydbuser, $mydbpw, $mydbname){
			$this->pageTable = $table;
			$this->pagesqli = new mysqli($mydbhost, $mydbuser, $mydbpw, $mydbname);
			if ($this->pagesqli->connect_errno) {
				echo "Failed to connect to MySQL: " . $this->pagesqli->connect_error;
			}
			$this->pagesqli->query("set names $mydbcharset");
		}
		/**
			返回查询的总行数
		*/
		function getTotalRow(){
			$arr = 0;
			$result = $this->pagesqli->query("select count(*) from ".$this->pageTable);
			if($row = $result->fetch_row()){
				$arr = $row[0];
			}
			return $arr;
		}
		/**
			返回查询总页数
		*/
		function getTotalPage($pageSize){
			$arr = ceil($this->getTotalRow()/$pageSize);
			return $arr;
		}
		
		
		public $pageTable = null;//所要查询的表
		public $pagesqli = null;//page连接数据库
	}
?>