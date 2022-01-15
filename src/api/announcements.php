<?php

require "db_connect.php";

function getAnnouncements($type = 'all')
{
    global $conn;
    if ($type === 'all'){
        $sql = 'SELECT * FROM announcements';
    }
    else{
        $sql = "SELECT * FROM announcements WHERE `type`='$type'";
    }
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}