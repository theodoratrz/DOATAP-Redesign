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

    # Check valid username
    if (!preg_match("/^[A-Za-z0-9_]+$/", $username)) {
        $db_error_message = "This username is not valid. Try using only characters, numbers and underscores";
        return false;
    }

    # Check valid email
    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        $db_error_message = "Please insert a valid email";
        return false;
    }


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
    if ($row['username'] === $username) {
        $_SESSION['user_id'] = $row['user_id'];
        return true;
    } else {
        $db_error_message = "Wrong username or password";
        return false;
    }
}

function getUsername(int $id){
    global $conn;
    $sql = "SELECT username FROM users WHERE `user_id`=$id;";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        return '';
    }
    $row = $result->fetch_assoc();
    return $row['username'];
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