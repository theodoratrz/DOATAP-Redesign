<?php

require_once "db_connect.php";

function getApplications($userID){
    global $conn, $db_error_message;

    // $sql = "SELECT a.app_id, c.name as country, d.name as department, un.name as university
    // FROM applications a, users us, countries c, departments d, universities un
    // WHERE a.user_id=$userID
    // AND a.user_id = us.user_id
    // AND a.department = d.dep_id
    // AND d.university = un.uni_id
    // AND un.country = c.coun_id
    // ";

    $sql = "SELECT 
    `app_id` as application_id,
    DATE_FORMAT(`created`, '%d-%m-%Y') as date_created,
    DATE_FORMAT(`last_modified`, '%d-%m-%Y') as date_modified,
    `state`
    FROM applications WHERE `user_id`=$userID";

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

    // Add subjects
    foreach($subjects as $subject){
        $sql = "INSERT IGNORE INTO subjects(`app_id`, `title`)
                VALUES('$appID', '$subject');";
        $conn->query($sql);
    }

    $sql = "UPDATE `applications`
    SET `state` = 'pending',
        `university` = '$university',
        `department` = '$department',
        `last_modified` = NOW()
    WHERE `app_id` = $appID;";
    $conn->query($sql);
}

function rejectApplication($appID, $rejectedDocs, $comment){
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

    foreach(array('id', 'form', 'title') as $type){
        $approved = $documents[$type];
        $sql = "UPDATE `documents`
                SET `approved` = '$approved'
                WHERE `app_id` = $appID AND `type` = '$type';";
        $conn->query($sql);
    }

}

function newApplication($userID, $state, $attendance, $studiesType, $countryID, $ECTS, $dateIntro, $dateGrad,
$yearsOfStudy, $department, $university, $file_id, $file_app, $file_par, $appID){
    global $conn;

    if($appID == null){
        $sql = "INSERT INTO applications(
        `user_id`, `state`, `attendance`,`studiesType`, `country`, `ECTS`, `dateIntro`, `dateGrad`,
        `yearsOfStudy`, `department`, `university` 
    )
    VALUES (
        '$userID', '$state', '$attendance', '$studiesType', '$countryID', '$ECTS', '$dateIntro', '$dateGrad',
        '$yearsOfStudy', '$department', '$university'
    );";
    $appID = $conn->insert_id;
    }
    else{
        // TODO Drop old files

        $sql = "UPDATE applications SET
        `state` = '$state',
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
    }
    echo $sql;
    $conn->query($sql);

    foreach (array($file_id, $file_app, $file_par) as $i => $file){
        if ($file==NULL) continue;

        $filename = $file['name'];
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . uniqid() . '_' . $filename;
        $type = $i == 0 ? "id" :
        ($i == 1 ? "app": "par");
        
        move_uploaded_file($file["tmp_name"], $fileLocation);

        $sql = "INSERT INTO documents(`app_id`, `filename`, `file_location`, `type`)
        VALUES('$appID', '$filename', '$fileLocation', '$type');
        ";
        echo "$sql\n";

        $conn->query($sql);
    }

    return true;
    
}

function getFiles($appID){
    global $conn;
    $sql = "SELECT * FROM documents WHERE `app_id`=$appID";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}