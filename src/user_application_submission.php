<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">
<head>
<script></script> 
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
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"?>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs.php";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/titlos_spoudon.php";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";

            const sample_form_values = array(
                "uname" => "",
                "email" => "",
                "pwd" => "",
                "pwd_dup" => "",
        
                "fname" => "Κώστας",
                "surname" => "Χρήστου",
                "fathersName" => "Χρήστος",
                "mothersName" => "Μαρία",
                "birthDate" => "31-1-1999",
                "gender" => "Άνδρας",
        
                "country" => "",
                "city" => "",
                "address" => "",
        
                "docSelection" => "Ταυτότητα",
                "docID" => "14572",
        
                "mobilePhone" => "6969696969",
                "homePhone" => "2106969696",
            );
        
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
            ob_start();
            echoTitlosForm(sample_titlos_values,true);
            $val = ob_get_contents();
            ob_end_clean();

            ob_start();
            echoProfileInfoForm(sample_form_values,true);
            $val2 = ob_get_contents();
            ob_end_clean();

            $tab_sample_content = array(
                "<i class='fas fa-info-circle'></i><br> Προσωπικά Στοιχεία" => array(
                    "basic_info",
                    
                    $val2
                ),
                "<i class='fas fa-edit'></i> <br>Τίτλος Σπουδών" => array(
                    "selected_deps",
                 
                    $val
                ),
                "<i class='fas fa-pencil-alt'></i><br> Συνεκτίμηση Τίτλου" => array(
                    "course_choices",
                    ''
                ),
                "<i class='fas fa-cloud-upload-alt'></i> <br>Επισυναπτόμενα" => array(
                    "course_choices",
                    '<p><strong>This is some placeholder content the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
                    Clicking another tab will toggle the visibility of this one for the next.
                    The tab JavaScript swaps classes to control the content visibility and styling.
                    You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
                )
            );
            
            echoContentTabs($tab_sample_content,"user-tab-wrapper");
        ?>
            
    </div>
    
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>
