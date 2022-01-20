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
        $tabContent = array(
            "Στοιχεία Αίτησης" => array(
                "application-info",
                getApplicationRejectForm()
            ),
            "Αντιστοίχιση & Έγκριση" => array(
                "match-approve",
                getApplicationApproveForm()
                #getApplicationApproveFrozenForm('ιδρυμα1', 'τμημα1')
            ),
            "Ανάθεση Μαθημάτων" => array(
                "attach-courses",
                getApplicationCoursesForm()
                #getApplicationCoursesFrozen('uni1', 'dep1', array('ΕΑΜ', 'OOP', 'ΤΕΔΕ'))
            ),
        );
        echoContentTabs($tabContent, "admin-tab-wrapper");
        ?>
    </div>
</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php"; ?>

</body>
