<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

if (!array_key_exists('university', $_GET)) {
    http_response_code(400);
    die("Status: 400 Bad Request");
}

$universityID = $_GET["university"];

$results = getDepartments($universityID);

echo json_encode($results);
?>
