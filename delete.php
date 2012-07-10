<?php
    include 'config.php';
	$connection = mysql_connect($host,$user,$pass) or die('ERROR: MySQL connection failed!');
	mysql_select_db($db) or die('ERROR: Could not select the database!');
    $id = $_GET['id'];
	$query = "DELETE FROM rss WHERE id = '$id';";
	mysql_query($query) or die('ERROR: Could not insert into the table! '.$query);
	mysql_close($connection);
	header("location:/feedme/manage.php");
?>