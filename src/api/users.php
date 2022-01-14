<?php

require "db_connect.php";

function newUser(string $username, string $password, string $email, int $isAdmin){
    global $conn;
    global $db_error_message;

    # Remove illegal characters
    $username = preg_replace("/[^A-Za-z0-9_]/", '', $username);

    # Escape sql characters
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);

    # Encrypt password
    $password = hash('sha256', $password);

    // TODO check for username/email availability and make message
    
    # Make query
    $sql = "INSERT INTO users(`username`, `password`, `email`, `isAdmin`) VALUES('$username', '$password', '$email', $isAdmin);";
    $conn->query($sql);
}

function userAuth(string $username, string $password){
    global $conn;

    # Escape sql characters
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    # Encrypt password
    $password = hash('sha256', $password);

    # Execute query
    $sql = "SELECT * FROM users WHERE `username`='$username' AND `password`='$password';";
    $result = $conn->query($sql);

    if (!$result){
        echo "no";
        return false;
    }

    $row = $result->fetch_array();
    if ($row['username'] === $username){
        return true;
    }else{
        return false;
    }
}
