<?php 

if (!array_key_exists('app_id', $_GET)) {
    header("Location: /error404.php");
} 
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php";

/* if (isset($_SESSION['user_id'])) {
    if (!isAdmin($_SESSION['user_id'])) {
        header("Location: /error404.php");
    }
} */
?>

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

<div class="gray-box">
      <a href="/profile/applications" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Αίτηση <?php echo $_GET['app_id']; ?></a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item"><a href="/profile" style="text-decoration:none;">Το Προφίλ μου</a></li>
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;">Διαχείριση Αιτήσεων</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Αίτηση <?php echo $_GET['app_id']; ?></li>
      </div>
    </div>

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
        
        require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/api/documents.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs_old.php"; 
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/application_reject_component.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/application_approve_component.php";
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/application_courses_component.php";

        $applicationID = $_GET['app_id'];
        echo '<script>window.applicationID = '. $applicationID .'</script>';
        $applicationInfo = getApplication($applicationID);
        $userID = $applicationInfo['user_id'];
        $applicationInfo['basic_info'] = getUserInfo($userID);
        $applicationInfo['documents'] = getApplicationDocuments($applicationID);
        $applicationInfo['courses'] = getApplicationCourses($applicationID);

        $tabContent = array();
        $isApplicationClosed = true;

        switch ($applicationInfo["state"]) {
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
            case 'approved':
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
        echoSidebar('/profile/applications/show_application.php');
        echoContentTabs($tabContent, "admin-tab-wrapper");

        if ($isApplicationClosed) {
            echoAdminCommentsFrozenContainer($applicationInfo['comment']);
        } else {
            echoAdminCommentsContainer();
        }

        ?>
    </div>
</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php"; ?>

</body>
