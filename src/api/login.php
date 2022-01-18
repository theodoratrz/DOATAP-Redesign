<?php

include("users.php");

if (userAuth($_POST['username'], $_POST['password'])){
    echo 'login';
}
else{
    echo $db_error_message;
}



?>
