<?php

require_once "db_connect.php";

function getApplications($userID)
{
    global $conn, $db_error_message;

    $sql = "SELECT 
    `app_id` as application_id,
    DATE_FORMAT(`created`, '%d-%m-%Y') as date_created,
    DATE_FORMAT(`last_modified`, '%d-%m-%Y') as date_modified,
    `state`
    FROM applications WHERE `user_id`=$userID";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $db_error_message = "No applications";
        return null;
    }

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getDepartments($universityID)
{
    global $conn;
    $sql = "SELECT * FROM departments WHERE university = $universityID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getUniversities($countryID)
{
    global $conn;
    $sql = "SELECT * FROM universities WHERE country = $countryID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getCountries()
{
    global $conn;
    $sql = "SELECT * FROM countries";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getCountryName($countryID)
{
    global $conn;
    $sql = "SELECT `name` FROM countries
            WHERE `coun_id` = '$countryID';";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['name'];
}

function getApplication($appID)
{
    global $conn;
    $sql = "SELECT * FROM applications WHERE `app_id`='$appID'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        return null;
    }
    $row = $result->fetch_assoc();
    return $row;
}

function approveApplication($appID, $university, $department, $comments)
{
    global $conn;
    $sql = "UPDATE `applications`
            SET `state` = 'approved',
                `university` = '$university',
                `department` = '$department',
                `last_modified` = NOW(),
                `comment` = '$comments'
            WHERE `app_id` = $appID;";

    $conn->query($sql);
}

function setApplicationCourses($appID, $university, $department, $subjects, $comments)
{
    global $conn;

    // Add subjects
    foreach ($subjects as $subject) {
        $sql = "INSERT IGNORE INTO courses(`app_id`, `title`)
                VALUES('$appID', '$subject');";
        $conn->query($sql);
    }

    $sql = "UPDATE `applications`
    SET `state` = 'pending',
        `university` = '$university',
        `department` = '$department',
        `last_modified` = NOW(),
        `comment` = '$comments'
    WHERE `app_id` = $appID;";
    $conn->query($sql);
}

function getApplicationCourses($appID)
{
    global $conn;

    $sql = "SELECT `title` from `courses`
            WHERE `app_id` = $appID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function rejectApplication($appID, $rejectedDocs, $comment)
{
    global $conn;

    $basicApproved = $rejectedDocs['basic_info'];
    $studiesApproved = $rejectedDocs['studies_info'];
    $documents = $rejectedDocs['documents'];

    $sql = "UPDATE `applications`
            SET `state` = 'declined',
                `comment` = '$comment',
                `basicInfoApproved` = '$basicApproved',
                `studiesInfoApproved` = '$studiesApproved',
                `last_modified` = NOW()
            WHERE `app_id` = $appID;";
    $conn->query($sql);
    foreach (array('id', 'app', 'par', 'title') as $type) {
        $approved = $documents[$type];
        $sql = "UPDATE `documents`
                SET `approved` = '$approved'
                WHERE `app_id` = $appID AND `type` = '$type';";
        $conn->query($sql);
    }
}

function newApplication(
    $userID,
    $state,
    $degree,
    $attendance,
    $studiesType,
    $countryID,
    $ECTS,
    $dateIntro,
    $dateGrad,
    $yearsOfStudy,
    $department,
    $university,
    $file_id,
    $file_app,
    $file_par,
    $appID
) {
    global $conn;

    if ($appID == "null") {
        $sql = "INSERT INTO applications(
        `user_id`, `state`, `attendance`,`studiesType`, `country`, `ECTS`, `dateIntro`, `dateGrad`,
        `yearsOfStudy`, `department`, `university`, `degree_type`
    )
    VALUES (
        '$userID', '$state', '$attendance', '$studiesType', '$countryID', '$ECTS', '$dateIntro', '$dateGrad',
        '$yearsOfStudy', '$department', '$university', $degree
    );";
        $res = $conn->query($sql);
        $appID = $conn->insert_id;
    } else {
        // TODO Drop old files
        
        $sql = "UPDATE applications SET
        `state` = '$state',
        `degree_type` = $degree,
        `attendance` = '$attendance',
        `studiesType` = '$studiesType',
        `country` = '$countryID',
        `ECTS` = '$ECTS',
        `dateIntro` = '$dateIntro',
        `dateGrad` = '$dateGrad',
        `yearsOfStudy` = '$yearsOfStudy',
        `department` = '$department',
        `university` = '$university'
        WHERE `app_id`='$appID' AND `user_id` = $userID;
        ";
        $res = $conn->query($sql);
    }
    

    if ($res == FALSE) return "Something went wrong!";


    foreach (array($file_id, $file_app, $file_par) as $i => $file) {
        if ($file == NULL) continue;

        $filename = $file['name'];
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . uniqid() . '_' . $filename;
        $type = $i == 0 ? "id" : ($i == 1 ? "app" : "par");

        move_uploaded_file($file["tmp_name"], $fileLocation);

        $sql = "INSERT INTO documents(`app_id`, `filename`, `file_location`, `type`)
        VALUES('$appID', '$filename', '$fileLocation', '$type');
        ";

        $conn->query($sql);
    }

    return true;
}

function getFiles($appID)
{
    global $conn;
    $sql = "SELECT * FROM documents WHERE `app_id`=$appID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function deleteApplication($appID, $userID)
{
    global $conn;

    $sql = "DELETE FROM applications WHERE `app_id`=$appID AND `user_id`=$userID";
    $conn->query($sql);
}

# dateOrder: "ASC" or "DESC"
function getAllApplications($state, $page, $pageCapacity, $dateOrder = "ASC")
{
    global $conn;

    $limitStart = ($page - 1) * $pageCapacity;
    $offset = $pageCapacity + 1;

    $sql = "SELECT * FROM applications 
            WHERE `state`= '$state'
            ORDER BY `last_modified` $dateOrder
            LIMIT $limitStart, $offset;";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    if (count($rows) > $pageCapacity) {
        $hasNextPage = true;
        array_pop($rows);
    } else {
        $hasNextPage = false;
    }

    return array($rows, $hasNextPage);
}
