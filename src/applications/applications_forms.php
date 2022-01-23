<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/content_accordion.css">

<body>

<div class="page-container fluid-container">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
    <div class="gray-box">
          <a href="applications.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Φόρμες Αιτήσεων</a>
            <div class="breadcrumb" style="align-items:end;">
              <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
              <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none; font-size:15px;">Αιτήσεις</a></li>
              <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Φόρμες Αιτήσεων</li>
            </div>
            
        </div>

    <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            echoSidebar("/applications/applications_forms/");
        ?>
        <?php

            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

            const accordionContent = array(
                array(
                    "<b><div style='font-size:large;'>
                        Αναγνώριση Ομοταγούς 
                        </div></b>",
                        "<span style='font-size: 0.75em; display: flex; flex-direction: column; row-gap:0.5em; justify-content:left;'>
                        Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε να κριθεί εάν ένα Ίδρυμα πληροί τα κριτήρια του Ομοταγούς, 
                        ώστε να συγκαταλέγεται στην λίστα των Αναγνωρισμένων Ιδρυμάτων.
                        <br>
                        <div>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-eye'> Προβολή</a>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div>
                        </span>"
                ),
                array(
                    "<b><div style='font-size:large;'>
                    Επανεξέτασης  
                    </div></b>",
                    "<span style='font-size: 0.75em; display: flex; flex-direction: column; row-gap:0.5em; justify-content:left;'>
                        Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την επανεξέταση της κρίσης του τίτλου σπουδών. 
                        Η αίτηση επανεξέτασης υποβάλλεται εντός αποκλειστικής προθεσμίας ενός 
                        έτους από την ημερομηνία παραλαβής της Πράξης Αναγνώρισης.
                        <br>
                        <div>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-eye'> Προβολή</a>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div>
                        </span>"
                ),
                array(
                    "<b><div style='font-size:large;'>
                        Αντιστοιχίας Βαθμού
                        </div></b>",
                        "<span style='font-size: 0.75em; display: flex; flex-direction: column; row-gap:0.5em; justify-content:left;'>
                        Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την αντιστοιχία βαθμού στην Ελληνική δεκάβαθμη κλίμακα. 
                        Η βεβαίωση αντιστοιχίας βαθμού χορηγείται μετά την αναγνώριση της ισοτιμίας 
                        του τίτλου σπουδών.
                        <br>
                        <div>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-eye'> Προβολή</a>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div>
                        </span>"
                ),
                array(
                    "<b><div style='font-size:large; '>
                    Επιστροφής Παραβόλου 
                    </div></b>",
                    "<span style='font-size: 0.75em; display: flex; flex-direction: column; row-gap:0.5em; justify-content:left;'>
                        Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την επιστροφή του παραβόλου. ΠΡΟΣΟΧΗ: Αίτηση επιστροφής παραβόλου 
                        που δεν συνοδεύεται από πρωτότυπο παράβολο ή αποδεικτικό έγγραφο του αριθμού 
                        ΙΒΑΝ του δικαιούχου ΔΕΝ ΓΙΝΕΤΑΙ ΔΕΚΤΗ.
                        <br>
                        <div>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-eye'> Προβολή</a>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div>
                        </span>"
                ),
                array(
                    "<b><div style='font-size:large; '>
                        Έκδοση Ακριβούς Αντιγράφου
                        </div></b>",
                        "<span style='font-size: 0.75em; display: flex; flex-direction: column; row-gap:0.5em; justify-content:left;'>
                        Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την έκδοση ακριβούς αντιγράφου εγγράφων και αποφάσεων του Δ.Ο.Α.Τ.Α.Π. 
                        από τον φάκελό σας.
                        <br>
                        <div>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-eye'> Προβολή</a>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div>
                        </span>"
                ),
                array(
                    "<b><div style='font-size:large; '>
                    Έκδοση Αποσπάσματος Πρακτικών Δ.Σ 
                    </div></b>",
                    "<span style='font-size: 0.75em; display: flex; flex-direction: column; row-gap:0.5em; justify-content:left;'>
                        Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την έκδοση αποσπάσματος από πρακτικά του Δ.Σ. του Δ.Ο.Α.Τ.Α.Π.
                        <br>
                        <div>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-eye'> Προβολή</a>
                        <a href='#' style='font-size:small; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div>
                        </span>"
                )
            );
            echoAccordion(accordionContent, true);
        ?>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>


</body>
