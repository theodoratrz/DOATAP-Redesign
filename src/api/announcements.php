<?php

require "db_connect.php";

function getAnnouncements($type = '')
{
    global $conn;
    $sql = 'SELECT * FROM announcements';
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}