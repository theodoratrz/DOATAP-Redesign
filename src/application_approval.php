<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

if ( (!array_key_exists('university', $_POST)) || (!array_key_exists('department', $_POST)) ) {
    http_response_code(400);
    die("Status: 400 Bad Request");
}

$universityName = $_POST["university"];
$departmentName = $_POST["department"];

#$results = getDepartments($universityID);

echo json_encode(array($universityName, $departmentName));
?>
