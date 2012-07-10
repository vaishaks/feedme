<html>
	<head></head>
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
			
			#feedme {
				color: #f1c524;
				text-align: center;
				font-family: "Comic Sans MS";
				font-size: 50px;
				font-weight: 500;
			}
			
			#manage {
				color: #a49ea0;
				text-align: center;
				font-family: "Lucida Sans Typewriter";
			}
			
			.box {
				height: 255px;
				width: 205px;
				float: left;
				padding: 20px;
				font-size: 12px;
				text-overflow: ellipsis;
				overflow: hidden;
			}
			
			.channel {
				height: 390px;
				width: 1604px;
				text-overflow: clip;
			}
			
			.title {
				font-family:Tahoma;
				font-size: 25px;
				font-weight: 600;
				text-decoration: none;
				color: #7b4f8a;
			}
			
			.headline {
				font-family:Tahoma;
				font-size: 18px;
				font-weight: 500;
				text-decoration: none;
				color: #7b4f00;
			}
			a {
				color: inherit;
				text-decoration: none;
			}
	</style>
	<body>
		<div id="wrapper">
			<div id="feedme">feedme</div>
			<div id="manage">
				<a href="/feedme/manage.php">Manage</a>
			</div>
<?php
	include 'config.php';
    $connection = mysql_connect($host,$user,$pass) or die('MySQL connection failed!');
	mysql_select_db($db) or die('Could not select database!');
	$query = "SELECT * FROM rss;";
	$result = mysql_query($query) or die('Could not execute query!');
	if (mysql_num_rows($result)>0) {
		while ($row = mysql_fetch_object($result)) {
			$xml = simplexml_load_file($row->url);
			echo "<div class='channel'><div class='title'><a href=".$xml->channel->link.">".$xml->channel->title."</a></div><br>";
			$items = $xml->xpath('/rss/channel/item');
			for ($i=0; $i < $row->count ; $i++) {
				echo "<div class='box'>"; 
				$item = $items[$i];
				echo "<div class='headline'><a href=".$item->link.">".$item->title."</a></div><br>";
				echo $item->description;
				echo "</div>";
			}
			echo "</div><br>";
			unset($xml);
		}
	}
?>		
		</div>
	</body>
</html>