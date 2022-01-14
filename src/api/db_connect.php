<?php

require $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";

$MYSQL_HOST = "127.0.0.1";
$MYSQL_USER = $mysqlUser;
$MYSQL_PASSWORD = $mysqlPassword;
$MYSQL_DB = "doatap";

$conn = mysqli_connect("db", "root", "1234", "doatap");


?>