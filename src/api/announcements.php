<?php

require_once "db_connect.php";

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

function getAnnouncement($id)
{
    global $conn;
    $sql = "SELECT * FROM announcements WHERE `ann_id`='$id'";    
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows[0];
}
?>