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
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/admin-application-approve.php"; 
        $tabContent = array(
            "Στοιχεία Αίτησης" => array(
                "application-info",
                '<p><strong>This is the Βασικές Πληροφορίες tab\'s associated content.</strong>
                Clicking another tab will toggle the visibility of this one for the next.
                The tab JavaScript swaps classes to control the content visibility and styling.
                You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
            ),
            "Αντιστοίχηση & Έγκριση" => array(
                "match-approve",
                getApplicationApproveForm()
            ),
            "Ανάθεση Μαθημάτων" => array(
                "blabla",
                '<p><strong>This is the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
                Clicking another tab will toggle the visibility of this one for the next.
                The tab JavaScript swaps classes to control the content visibility and styling.
                You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
            ),
        );
        echoContentTabs($tabContent, "admin-tab-wrapper");
        ?>
    </div>
</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php"; ?>

</body>
