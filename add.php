<?php
    include 'config.php';
	$connection = mysql_connect($host,$user,$pass) or die('ERROR: MySQL connection failed!');
	mysql_select_db($db) or die('ERROR: Could not select the database!');
    $title = mysql_escape_string($_POST['title']);
	$url = mysql_escape_string($_POST['url']);
	$count = mysql_escape_string($_POST['count']);
	$query = "INSERT INTO `feedme`.`rss` (`id`, `title`, `url`, `count`) VALUES (NULL, '$title', '$url', '$count');";
	mysql_query($query) or die('ERROR: Could not insert into the table! '.$query);
	mysql_close($connection);
	header("location:/feedme/manage.php");
?>