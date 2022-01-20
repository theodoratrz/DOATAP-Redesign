<?php

require_once "db_connect.php";

function getApplications($userID){
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

function getDepartments($universityID){
    global $conn;
    $sql = "SELECT * FROM departments WHERE university = $universityID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function getUniversities($countryID){
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

function getApplication($appID){
    global $conn;
    $sql = "SELECT * FROM applications WHERE `app_id`='$appID'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        return null;
    }
    $row = $result->fetch_assoc();
    return $row;
}

function approveApplication($appID, $university, $department){
    global $conn;
    $sql = "UPDATE `applications`
            SET `state` = 'approved',
                `university` = '$university',
                `department` = '$department',
                `last_modified` = NOW()
            WHERE `app_id` = $appID;";

    $conn->query($sql);
}

function setApplicationCourses($appID, $university, $department, $subjects){
    global $conn;

    $subjectIDs = array();

    foreach($subjects as $subject){
        $sql = "INSERT IGNORE INTO subjects(`title`)
                VALUES('$subject');";
        $conn->query($sql);
        $sid = $conn->insert_id;
        array_push($subjectIDs, $sid);
    }

    $sql = "UPDATE `applications`
    SET `state` = 'needsSubject',
        `university` = '$university',
        `department` = '$department',
        `last_modified` = NOW()
    WHERE `app_id` = $appID;";
    $conn->query($sql);

    foreach($subjectIDs as $subID){
    $sql = "INSERT IGNORE INTO `application_to_subject`
            VALUES('$appID', '$subID')";
    $conn->query($sql);
    }   
}

/*
Sample $rejected
array (
    "basic_info" => true,
    "studies_info" => true,
    "documents" => array(
      "id" => false,
      "form" => true,
      "title" => true
    )
  )
*/

function rejectApplication($appID, $rejectedDocs, $comment){
    global $conn;

    $basicApproved = $rejectedDocs['basic_info'];
    $studiesApproved = $rejectedDocs['studies_info'];
    $documents = $rejectedDocs['documents'];

    $sql = "UPDATE `applications`
            SET `state` = 'rejected',
                `comment` = '$comment',
                `basicInfoApproved` = '$basicApproved',
                `studiesInfoApproved` = '$studiesApproved',
                `last_modified` = NOW()
            WHERE `app_id` = $appID;";
    $conn->query($sql);

    foreach(array('id', 'form', 'title') as $type){
        $approved = $documents[$type];
        $sql = "UPDATE `documents`
                SET `approved` = '$approved'
                WHERE `app_id` = $appID AND `type` = '$type';";
        $conn->query($sql);
    }

}

// $r = array (
//     "basic_info" => true,
//     "studies_info" => true,
//     "documents" => array(
//       "id" => false,
//       "form" => true,
//       "title" => true
//     )
//     );
// rejectApplication(1, $r, "Θολά");