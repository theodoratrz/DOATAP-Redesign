<?php

require_once("users.php");

if (userAuth($_POST['username'], $_POST['password'])){
    echo true;
}
else{
    echo $db_error_message;
}


?>
