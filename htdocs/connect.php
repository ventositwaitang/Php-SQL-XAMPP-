<?php
	// include("connect.php");
	$servername = "localhost";#"sophia";
	$username = "root";#"*******";
	$password = "";#"******";
	$dbName = "fitness_company";
	 
	// create connection
	$con = new mysqli($servername,$username,$password,$dbName);#,'/tmp/mysql.sock');
	 
	// check connection
	if ($con->connect_error) {
		die("Fail to connect: " . $conn->connect_error);
	} 

?>

