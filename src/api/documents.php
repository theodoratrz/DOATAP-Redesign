<?php

function getApplicationDocuments($applicationID)
{
    global $conn;
    $sql = "SELECT * FROM documents WHERE app_id = $applicationID AND type = 'id'";
    $id = $conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
    $sql = "SELECT * FROM documents WHERE app_id = $applicationID AND type = 'par'";
    $par = $conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
    $sql = "SELECT * FROM documents WHERE app_id = $applicationID AND type = 'app'";
    $app = $conn->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
    return array(
        "id" => array(
            $id['file_location'],
            $id['approved']
        ),
        "application" => array(
            $app['file_location'],
            $app['approved']
        ),
        "fee" => array(
            $par['file_location'],
            $par['approved']
        ),
    );
}

?>