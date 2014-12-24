<?php
	mysql_connect('localhost','root');
	mysql_select_db('music');
	mysql_query("SET NAMES 'utf8'");
	
	require("models/category.php");

?>