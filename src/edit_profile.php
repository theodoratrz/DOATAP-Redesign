<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/api/users.php" ;

setUserInfo($_POST['user_id'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['mothers_name'],
            $_POST['fathers_name'],
            $_POST['country'],
            $_POST['city'],
            $_POST['address'],
            $_POST['docType'],
            $_POST['docNumber'],
            $_POST['birthday'],
            $_POST['mobile'],
            $_POST['phone']
);

echo json_encode($_POST);

?>
