<?php

if (!isset($_SESSION)) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";

$db_error_message = '';

$conn = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASSWORD, $MYSQL_DB);

function close_connection(){
    global $conn;
    $conn->close();
}

function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

?>
