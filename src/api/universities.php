<?php

require_once "applications.php";

if ($_GET['id'] == 'undefined'){
    exit();
}

$universities = getUniversities($_GET['id']);

foreach($universities as $key => $uni){
    echo $uni['name'];
    if ($key < count($universities)-1){
        echo "\n";
    }
}

?>