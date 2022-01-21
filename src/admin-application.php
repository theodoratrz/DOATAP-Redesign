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

    .modal-title {
        font-size: 28px;
        font-weight: bold;
    }

    .modal-body {
        font-size: 18px;
    }

    .admin-comments-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .comments-title-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }

    .comments-title {
        font-size: 16px;
        font-weight: bold;
    }

    .comments-box {
        font-size: 16px;
        width: 20em;
        height: 20em;
    }

    </style>

    <div class="central-container">
        <?php

        function echoAdminCommentsContainer() {
            echo '
            <div class="admin-comments-container">
                <div class="comments-title-wrapper">
                    <span class="comments-title">Σχόλια Διαχειριστή</span>
                </div>
                <textarea id="admin-comments-textbox" class="comments-box"></textarea>
            </div>
            ';
        }

        function echoAdminCommentsFrozenContainer($comments) {
            echo '
            <div class="admin-comments-container">
                <div class="comments-title-wrapper">
                    <span class="comments-title">Σχόλια Διαχειριστή</span>
                </div>
                <textarea class="comments-box" disabled>'. $comments .'</textarea>
            </div>
            ';
        }

        function echoErrorMsgModal() {
            echo '
            <div class="modal fade" id="errorMsgModal" tabindex="-1" role="dialog" aria-labelledby="errorMsgModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <span class="modal-title" id="errorMsgModalLabel">Σφάλμα</span>
                    </div>
                    <div id="modal-body-msg" class="modal-body">
                        <error message>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-message-btn" data-dismiss="modal" onclick="hideModal()">Κλείσιμο</button>
                    </div>
                    </div>
                </div>
            </div>
            ';
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs_old.php"; 
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
            ),
            "comments" => "
            - bla1
            - bla2
            - bla3
            "
        );

        $tabContent = array();
        $isApplicationClosed = true;

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
                $isApplicationClosed = false;
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
        echoErrorMsgModal();
        echoContentTabs($tabContent, "admin-tab-wrapper");

        if ($isApplicationClosed) {
            echoAdminCommentsFrozenContainer($applicationInfo['comments']);
        } else {
            echoAdminCommentsContainer();
        }

        ?>
    </div>
</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php"; ?>

</body>
