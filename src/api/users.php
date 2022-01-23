<?php

require_once "db_connect.php";

function newUser($username, $password, $email, $firstName, $lastName, 
$mothersName, $fathersName, $country, $city, $address,
$docType, $docNumber, $gender, $birthday, $mobile, $phone, $isAdmin)
{
    global $conn;
    global $db_error_message;

    # Escape sql characters
    $username = e($username);
    $email = e($email);
    $firstName = e($firstName);
    $lastName = e($lastName);
    $mothersName = e($mothersName);
    $fathersName = e($fathersName);
    $country = e($country);
    $city = e($city);
    $address = e($address);
    $docType = e($docType);
    $docNumber = e($docNumber);
    $gender = e($gender);
    $birthday = e($birthday);
    $mobile = e($mobile);
    $phone = e($phone);

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
    $sql = "INSERT INTO users(`username`, `password`, `email`, `isAdmin`,
            `first_name`, `last_name`, `mothers_name`, `fathers_name`,
            `country`, `city`, `address`, `docType`, `docNumber`,
            `gender`, `birthday`, `mobile`, `phone`)
            VALUES('$username', '$password', '$email', '$isAdmin',
            '$firstName', '$lastName', '$mothersName', '$fathersName',
            '$country', '$city', '$address', '$docType', '$docNumber',
            '$gender', '$birthday', '$mobile', '$phone');";
    $conn->query($sql);

    $_SESSION['user_id'] = $conn->insert_id;
    return true;
}

function userAuth($username, $password)
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

function setUserInfo($user_id, $firstName, $lastName, 
$mothersName, $fathersName, $country, $city, $address,
$docType, $docNumber, $birthday, $mobile, $phone)
{
    global $conn;
    global $db_error_message;

    # Escape sql characters
    $firstName = e($firstName);
    $lastName = e($lastName);
    $mothersName = e($mothersName);
    $fathersName = e($fathersName);
    $country = e($country);
    $city = e($city);
    $address = e($address);
    $docType = e($docType);
    $docNumber = e($docNumber);
    $birthday = e($birthday);
    $mobile = e($mobile);
    $phone = e($phone);

    # Make query
    $sql = "UPDATE `users`
            SET `first_name`='$firstName',
            `last_name`= '$lastName',
            `mothers_name`='$mothersName',
            `fathers_name`='$fathersName',
            `country`=$country,
            `city`='$city',
            `address`='$address',
            `docType`='$docType',
            `docNumber`='$docNumber',
            `birthday`= '$birthday',
            `mobile`='$mobile',
            `phone`='$phone'
            WHERE `user_id` = $user_id;";

    $conn->query($sql);
}

function getUserInfo($id){
    global $conn;

    $sql = "SELECT 
    user_id,
    username,
    email,
    isAdmin,
    first_name,
    last_name,
    mothers_name,
    fathers_name,
    city,
    address,
    docType,
    docNumber,
    gender,
    birthday,
    mobile,
    phone,
    countries.name as country FROM users INNER JOIN countries ON countries.coun_id = users.country WHERE `user_id`=$id;";

    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        return null;
    }
    $row = $result->fetch_assoc();
    return $row;
}

function isAdmin($id){
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