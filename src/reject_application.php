<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

if ( (!array_key_exists('basic_info', $_POST)) || (!array_key_exists('studies_info', $_POST)) 
    || (!array_key_exists('documents', $_POST)) || (gettype($_POST['documents']) !== 'array')
    || (!array_key_exists('id', $_POST['documents'])) || (!array_key_exists('form', $_POST['documents']))
    || (!array_key_exists('title', $_POST['documents'])) || (!array_key_exists('fee', $_POST['documents']))) {
    http_response_code(400);
    die("Status: 400 Bad Request");
}

$basic_info = $_POST["basic_info"];
$studies_info = $_POST["studies_info"];
$documents = $_POST["documents"];

# send query...

echo json_encode( array(
    "basic" => $basic_info,
    "studies" => $studies_info,
    "docs" => $documents
    )
);

?>
