<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

if ((!array_key_exists('application_id', $_POST)) ||
    (!array_key_exists('university', $_POST)) ||
    (!array_key_exists('department', $_POST)) ||
    (!array_key_exists('comments', $_POST))) {
    http_response_code(400);
    die("Status: 400 Bad Request");
}

$universityName = $_POST["university"];
$departmentName = $_POST["department"];
approveApplication($_POST['application_id'],
                    $_POST["university"],
                    $_POST["department"],
                    $_POST["comments"]);

echo json_encode('Η αίτηση εγκρίθηκε με επιτυχία.');

?>
