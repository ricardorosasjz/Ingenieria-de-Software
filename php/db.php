<?php

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'admin');
	define('DB_DATABASE', 'database');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,"",DB_DATABASE);

?>