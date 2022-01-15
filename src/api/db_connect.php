<?php

require $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";

$db_error_message = '';

$MYSQL_HOST = "127.0.0.1";
$MYSQL_USER = $mysqlUser;
$MYSQL_PASSWORD = $mysqlPassword;
$MYSQL_DB = "doatap";

$conn = mysqli_connect("db", "root", "1234", "doatap");


function close_connection(){
    global $conn;
    $conn->close();
}

function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

?>