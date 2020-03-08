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
?>