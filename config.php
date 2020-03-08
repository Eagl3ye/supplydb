<?php
	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"],1);

	/* Attempt to connect to MySQL database */
	$link = mysql_connect($server, $username, $password);
	mysql_select_db($db);
	// Check connection
	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$sql = CREATE TABLE IF NOT EXISTS users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP);

	if(mysqli_query($link, $sql)){
		echo "Records inserted successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
?>