<?php

require_once "applications.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $res = newApplication(
        $_SESSION['user_id'],
        $_POST['state'],
        $_POST['attendance'],
        $_POST['studiesType'],
        $_POST['country'],
        $_POST['ECTS'],
        $_POST['dateIntro'],
        $_POST['dateGrad'],
        $_POST['yearsOfStudy'],
        $_POST['department'],
        $_POST['university'],
        $_FILES['file-id'],
        $_FILES['file-app'],
        $_FILES['file-par'],
        $_POST['app_id']
    );
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($_GET['operation'] === "delete") {
        $res = deleteApplication($_GET['app_id'], $_SESSION['user_id']);
    }
}


if ($res == true) {
    echo 'success';
} else {
    echo $db_error_message;
}
