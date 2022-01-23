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
            echoSidebar("/applications/apps/applications-forms/");
        ?>
        <?php

            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

            const accordionContent = array(
                array(
                    "<b><div style='font-size:large'>
                        Αναγνώριση Ομοταγούς 
                        <a href='#' style='font-size:small; margin-left:3rem; text-decoration:none;' class='fas fa-eye'> Προβολή σε νέα σελίδα </a>
                        <a href='#' style='font-size:small; margin-left:1rem; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div></b>",
                    "<div style='display: flex; flex-direction: row; column-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε να κριθεί εάν ένα Ίδρυμα πληροί τα κριτήρια του Ομοταγούς, 
                        ώστε να συγκαταλέγεται στην λίστα των Αναγνωρισμένων Ιδρυμάτων.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Επανεξέτασης 
                    <a href='#' style='font-size:small; margin-left:3rem; text-decoration:none;' class='fas fa-eye'> Προβολή σε νέα σελίδα </a>
                    <a href='#' style='font-size:small; margin-left:1rem; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                    </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την επανεξέταση της κρίσης του τίτλου σπουδών. 
                        Η αίτηση επανεξέτασης υποβάλλεται εντός αποκλειστικής προθεσμίας ενός 
                        έτους από την ημερομηνία παραλαβής της Πράξης Αναγνώρισης.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                        Αντιστοιχίας Βαθμού
                        <a href='#' style='font-size:small; margin-left:3rem; text-decoration:none;' class='fas fa-eye'> Προβολή σε νέα σελίδα </a>
                        <a href='#' style='font-size:small; margin-left:1rem; text-decoration:none;' class='fas fa-download'> Λήψη </a>  
                        </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την αντιστοιχία βαθμού στην Ελληνική δεκάβαθμη κλίμακα. 
                        Η βεβαίωση αντιστοιχίας βαθμού χορηγείται μετά την αναγνώριση της ισοτιμίας 
                        του τίτλου σπουδών.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large;'>
                    Επιστροφής Παραβόλου 
                    <a href='#' style='font-size:small; margin-left:3rem; text-decoration:none;' class='fas fa-eye'> Προβολή σε νέα σελίδα </a>
                    <a href='#' style='font-size:small; margin-left:1rem; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                    </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την επιστροφή του παραβόλου. ΠΡΟΣΟΧΗ: Αίτηση επιστροφής παραβόλου 
                        που δεν συνοδεύεται από πρωτότυπο παράβολο ή αποδεικτικό έγγραφο του αριθμού 
                        ΙΒΑΝ του δικαιούχου ΔΕΝ ΓΙΝΕΤΑΙ ΔΕΚΤΗ.</span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                        Έκδοση Ακριβούς Αντιγράφου
                        <a href='#' style='font-size:small; margin-left:3rem; text-decoration:none;' class='fas fa-eye'> Προβολή σε νέα σελίδα </a>
                        <a href='#' style='font-size:small; margin-left:1rem; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                        </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την έκδοση ακριβούς αντιγράφου εγγράφων και αποφάσεων του Δ.Ο.Α.Τ.Α.Π. 
                        από τον φάκελό σας.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Έκδοση Αποσπάσματος Πρακτικών Δ.Σ 
                    <a href='#' style='font-size:small; margin-left:3rem; text-decoration:none;' class='fas fa-eye'> Προβολή σε νέα σελίδα </a>
                    <a href='#' style='font-size:small; margin-left:1rem; text-decoration:none;' class='fas fa-download'> Λήψη </a> 
                    </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την έκδοση αποσπάσματος από πρακτικά του Δ.Σ. του Δ.Ο.Α.Τ.Α.Π.
                        </span>
                    </div>"
                )
            );
            echoAccordion(accordionContent, true);
        ?>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>


</body>
