<?php
    include_once 'global.php';
	
	$query = $db->query("select id from b_user where account='admin' and password='admin'");
	
	$row = $db->fetch_array($query);
	
	echo $row[0];
?>