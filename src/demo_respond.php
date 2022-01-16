<?php
// Get the JSON contents
$json = file_get_contents('php://input');

if ( !array_key_exists('departments', $_POST) || count($_POST['departments']) === 0) {
    http_response_code(400);
    die("Status: 400 Bad Request");
}

// decode the json data
# $data = json_decode($json);
$data = array();
foreach ($_POST["departments"] as $pair) {
    array_push( $data, array($pair[0], $pair[1]) );
}
echo json_encode($data);
?>
