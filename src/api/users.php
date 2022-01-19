<?php

require_once "db_connect.php";

function newUser(string $username, string $password, string $email, bool $isAdmin)
{
    global $conn;
    global $db_error_message;

    # Escape sql characters
    $username = e($username);
    $email = e($email);

    # Encrypt password
    $password = hash('sha256', $password);

    $isAdmin = $isAdmin ? 1 : 0;


    # Check existing username
    $sql = "SELECT username FROM users WHERE `username`='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $db_error_message = "User with that username already exists!";
        return false;
    }

    # Check existing email
    $sql = "SELECT username FROM users WHERE `email`='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $db_error_message = "User with that email already exists!";
        return false;
    }

    # Make query
    $sql = "INSERT INTO users(`username`, `password`, `email`, `isAdmin`) VALUES('$username', '$password', '$email', $isAdmin);";
    $conn->query($sql);

    $_SESSION['user_id'] = $conn->insert_id;
    return true;
}

function userAuth(string $username, string $password)
{
    global $conn;
    global $db_error_message;

    # Escape sql characters
    $username = e($username);

    # Encrypt password
    $password = hash('sha256', $password);
    
    # Execute query
    $sql = "SELECT * FROM users WHERE `username`='$username' AND `password`='$password';";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $db_error_message = "Wrong username or password";
        return false;
    }

    $row = $result->fetch_array();
    if ($row['username'] == $username) {
        $_SESSION['user_id'] = $row['user_id'];
        return true;
    } else {
        $db_error_message = "Wrong username or password";
        return false;
    }
}

function getUserInfo(int $id){
    global $conn;
    $sql = "SELECT * FROM users WHERE `user_id`=$id;";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        return null;
    }
    $row = $result->fetch_assoc();
    return $row;
}

function isAdmin(int $id){
    global $conn;
    $sql = "SELECT isAdmin FROM users WHERE `user_id`=$id;";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        return false;
    }
    $row = $result->fetch_assoc();
    return $row['isAdmin'];
}

// userAuth('nikoz', '1234');