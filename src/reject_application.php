<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

if ( (!array_key_exists('application_id', $_POST)) || (!array_key_exists('basic_info', $_POST)) || (!array_key_exists('studies_info', $_POST)) 
    || (!array_key_exists('documents', $_POST)) || (gettype($_POST['documents']) !== 'array')
    || (!array_key_exists('id', $_POST['documents'])) || (!array_key_exists('app', $_POST['documents']))
    || (!array_key_exists('par', $_POST['documents'])) || (!array_key_exists('title', $_POST['documents']))) {
    http_response_code(400);
    die("Status: 400 Bad Request");
}

$application_id = $_POST["application_id"];
$basic_info = $_POST["basic_info"];
$studies_info = $_POST["studies_info"];
$approvals = array(
    "basic_info" => $_POST["basic_info"],
    "studies_info" => $_POST["studies_info"],
    "documents" => $_POST["documents"]
);
$comments = $_POST["comments"];

rejectApplication($application_id, $approvals, $comments);

http_response_code(200);

?>
