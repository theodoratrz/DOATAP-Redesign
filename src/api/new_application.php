<?php

require_once "applications.php";

$res = newApplication($_SESSION['user_id'], $_POST['state'], $_POST['attendance'],
$_POST['studiesType'], $_POST['ECTS'], $_POST['dateIntro'], $_POST['dateGrad'],
$_POST['yearsOfStudy'], $_POST['department'], $_POST['university'],
$_FILES['file-id'], $_FILES['file-app'], $_FILES['file-par']);

if ($res == true) {
    echo 'success';
} else {
    echo $db_error_message;
}