<html>
	<head>
		<script type="text/javascript">
			function clearForm() {
				document.getElementById('frm').reset();
			}
		</script>
	</head>
	<style>
		body { 
				margin: 0; 
 				padding: 0; 
 				text-align: center; 
 				background-color: #f2f2f2;
			} 
			
			#wrapper { 
 				margin: 0 auto;
 				padding: 0; 
 				width: 720px; 
 				text-align: left; 
			}
			
			.table {
				margin-left:auto; 
    			margin-right:auto;
			}
			
			#manage {
				color: #f1c524;
				text-align: center;
				font-family: "Comic Sans MS";
				font-size: 50px;
				font-weight: 500;
			}
			
	</style>
	<body onload="clearForm();">
		<div id="#wrapper">
			<div id="manage">
				manage
			</div>
		<a href="/feedme/user.php">Go Back</a>
<?php
	include 'config.php';
	$connection = mysql_connect($host,$user,$pass) or die('ERROR: MySQL connection failed!');
	mysql_select_db($db) or die('ERROR: Could not select the database!');
	$query = "SELECT * FROM rss;";
	$result = mysql_query($query);
	echo "<h2>Current Subscriptions</h2><br>";
	echo "<table border='0' cellspacing='5' cellpadding='5' class='table'>";
	while ($row = mysql_fetch_object($result)) {
		echo "<tr>
				<td>$row->title</td>
				<td><a href='/feedme/delete.php?id=$row->id'>delete</a></td>
			</tr>";
	}
	echo "</table>";
	mysql_free_result($result);
	mysql_close($connection);
?>
		<div>
			<h2>Add new subscritption</h2>
			<form action="add.php" method="post" id="frm">
				<input type="text" name="title" value="" placeholder="Title"/>
				<br /><br />
				<input type="url" name="url" value="" placeholder="URL"/>
				<br /><br />
				<input type="number" name="count" value="" placeholder="Count"/>
				<br /><br />
				<input type="submit" name="submit" value="Add" />
				<br />
			</form>
		</div>
		</div>
	</body>
</html>