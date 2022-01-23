<?php
if (!isset($_SESSION)) {
    session_start();
}

$url = $_SERVER['REQUEST_URI'];

if (strpos($url, "/profile/") !== FALSE && !isset($_SESSION['user_id'])){
    header("Location: /login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOATAP.gr</title>

    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/custom.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>    
</head>