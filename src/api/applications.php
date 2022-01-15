<?php

require "db_connect.php";

function getApplications(int $userID){
    global $conn, $db_error_message;

    $sql = "SELECT a.app_id, c.name as country, d.name as department, un.name as university
    FROM applications a, users us, countries c, departments d, universities un
    WHERE a.user_id=$userID
    AND a.user_id = us.user_id
    AND a.department = d.dep_id
    AND d.university = un.uni_id
    AND un.country = c.coun_id
    ";

    $result = $conn->query($sql);

    if ($result->num_rows == 0){
        $db_error_message = "No applications";
        return array();
    }

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;

}

function getDepartments(int $universityID){
    global $conn;
    $sql = "SELECT * FROM departments WHERE university = $universityID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getUniversities(int $countryID){
    global $conn;
    $sql = "SELECT * FROM universities WHERE country = $countryID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getCountries(){
    global $conn;
    $sql = "SELECT * FROM countries";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

?>

