<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php"; ?>

<link rel="stylesheet" href="css/index.css">

<body>

<div class="page-container">
    <?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>

    <style>
    .central-container {
        padding: 1rem;
        display: flex;
        flex-direction: row;
        column-gap: 2rem;
        row-gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
    }

    @media only screen and (max-width: 840px) {
        .central-container {
            flex-direction: column;
            align-items: center;
        }
    }

    .admin-tab-wrapper {
        display: flex;
        flex-direction: column;
        width: 50%;
        min-width: 15rem;
    }

    .admin-tab-wrapper .nav {
        row-gap: .5rem;
        column-gap: .15rem;
    }

    </style>

    <div class="central-container">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs.php"; 
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/application_reject_component.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/application_approve_component.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/application_courses_component.php";

        $applicationInfo = array (
            "status" => "submitted", #"accepted", "declined", "submitted"
            "basic_info" => array(
                "uname" => "kostas_44",
                "email" => "kostas44@gmail.com",
    
                "fname" => "Κώστας",
                "surname" => "Χρήστου",
                "fathersName" => "Χρήστος",
                "mothersName" => "Μαρία",
                "birthDate" => "31-1-1999",
                "gender" => "Άνδρας",
    
                "country" => "Ελλάδα",
                "city" => "Αθήνα",
                "address" => "Αθηνάς 4",
    
                "docSelection" => "Ταυτότητα",
                "docID" => "14572",
    
                "mobilePhone" => "6969696969",
                "homePhone" => "2106969696"
            ),
            "basic_info_accepted" => "1",
            "studies_info" => array(
                "studies_type" => "Συμβατικός",
                "studies_duration" => "Τακτική",
                "country" => "Η.Π.Α.",
                "university" => "Yale",
                "title" => "Fine Arts",
                "ects" => "240",
                "studyYears" => "4",
                "dateStarted" => "31-1-1999",
                "dateFinished" => "31-1-2003",
            ),
            "studies_info_accepted" => "0",
            "documents" => array(
                "id" => array (
                    "/uploads/id_doc1.png",
                    "1"
                ),
                "application" => array (
                    "/uploads/application1.png",
                    "0"
                ),
                "title" => array (
                    "/uploads/title1.png",
                    "1"
                )
            ),
            "university" => "uni1",
            "department" => "dep1",
            "courses" => array(
                "course1",
                "course2",
                "course3"
            )
        );

        $tabContent = array();

        switch ($applicationInfo["status"]) {
            case 'submitted':
                $tabContent["Στοιχεία Αίτησης"] = array(
                    "application-info",
                    getApplicationRejectForm($applicationInfo)
                );
                $tabContent["Αντιστοίχιση & Έγκριση"] = array(
                    "match-approve",
                    getApplicationApproveForm()
                );
                $tabContent["Ανάθεση Μαθημάτων"] = array(
                    "attach-courses",
                    getApplicationCoursesForm()
                );
                break;            
            case 'declined':
                $tabContent["Στοιχεία Αίτησης"] = array(
                    "application-info",
                    getApplicationFrozenRejectForm($applicationInfo)
                );
                break;                
            case 'accepted':
                $tabContent["Στοιχεία Αίτησης"] = array(
                    "application-info",
                    getApplicationFrozenRejectForm($applicationInfo)
                );
                $tabContent["Αντιστοίχιση & Έγκριση"] = array(
                    "match-approve",
                    getApplicationApproveFrozenForm(
                        $applicationInfo['university'],
                        $applicationInfo['department']
                    )
                );
                break;            
            case 'pending':
                $tabContent["Στοιχεία Αίτησης"] = array(
                    "application-info",
                    getApplicationFrozenRejectForm($applicationInfo)
                );
                $tabContent["Αντιστοίχιση & Έγκριση"] = array(
                    "match-approve",
                    getApplicationApproveFrozenForm(
                        $applicationInfo['university'],
                        $applicationInfo['department']
                    )
                );
                $tabContent["Ανάθεση Μαθημάτων"] = array(
                    "attach-courses",
                    getApplicationCoursesFrozen(
                        $applicationInfo['university'],
                        $applicationInfo['department'],
                        $applicationInfo['courses']
                    )
                );
                break;            
            default:
                # code...
                break;
        }
        echoContentTabs($tabContent, "admin-tab-wrapper");
        ?>
    </div>
</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php"; ?>

</body>