<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<head>
<script src="/js/progress.js"></script> 
</head>
<body>
<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Αιτήσεις</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Διαδικασία Υποβολής</li>
                </div>
        </div>
    <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs.php";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/titlos_spoudon.php";
            const sample_titlos_values = array(
                "titlos" => "",
                "ects" => "",
                "uni" => "",
                "tei" => "",
        
                "fname" => "Κώστας",
                "surname" => "Χρήστου",
                "fathersName" => "Χρήστος",
                "mothersName" => "Μαρία",
                "entryDate" => "31-1-1999",
                "graduationDate" => "31-1-1999",
                "attendance" => "Άνδρας",
                "fullTime" => "Άνδρας",
        
                "country" => "",
                "universityAbroad" => "",
                "attendanceTime" => "",
        
                "docSelection" => "Ταυτότητα",
                "docID" => "14572",
        
                "mobilePhone" => "6969696969",
                "homePhone" => "2106969696",
            );
            $tab_sample_content = array(
                "<i class='fas fa-info-circle'></i><br> Προσωπικά Στοιχεία" => array(
                    "basic_info",
                    '<p><strong>This is some placeholder content the Βασικές Πληροφορίες tab\'s associated content.</strong>
                    Clicking another tab will toggle the visibility of this one for the next.
                    The tab JavaScript swaps classes to control the content visibility and styling.
                    You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
                ),
                "<i class='fas fa-edit'></i> <br>Τίτλος Σπουδών" => array(
                    "selected_deps",
                    echoTitlosForm(sample_titlos_values,true)
                ),
                "<i class='fas fa-pencil-alt'></i><br> Συνεκτίμηση Τίτλου" => array(
                    "course_choices",
                    '<p><strong>This is some placeholder content the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
                    Clicking another tab will toggle the visibility of this one for the next.
                    The tab JavaScript swaps classes to control the content visibility and styling.
                    You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
                ),
                "<i class='fas fa-cloud-upload-alt'></i> <br>Επισυναπτόμενα" => array(
                    "course_choices",
                    '<p><strong>This is some placeholder content the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
                    Clicking another tab will toggle the visibility of this one for the next.
                    The tab JavaScript swaps classes to control the content visibility and styling.
                    You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
                )
            );
            
            echoContentTabs($tab_sample_content,);
        ?>
            
    </div>
    <div class="application-actions-container">
    <a href="procedure_submission.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer;">Προηγούμενο</a>
    <a href="procedure_submission.php" class="fas fa-save" style="text-decoration:none; color:#002E69; cursor:pointer;">Προσωρινή Αποθήκευση</a>
    <a href="procedure_submission.php" class="fas fa-arrow-circle-right" style="text-decoration:none; color:#002E69; cursor:pointer;">Επόμενο</a>
    </div>
</div>
</body>