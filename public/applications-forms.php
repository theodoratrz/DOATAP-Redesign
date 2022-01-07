<link rel="stylesheet" href="/public/css/global.css">
<link rel="stylesheet" href="/public/css/index.css">
<link rel="stylesheet" href="/public/css/content_accordion.css">


<?php require_once("../components/template.php"); ?>

<body>

<div class="fluid-container">
<?php require_once("../components/navbar.php"); ?>
<nav class="gray-box">
    <div class="container d-flex">
        Σύνδεση
    </div>
</nav>

</div>
    <div class="page-content-container">
        <?php 
            require_once("../components/sidebar.php"); 

            echoSidebar();
        ?>
        <?php

            require_once("../components/content_accordion.php");

            const accordionContent = array(
                array(
                    "<b>Αναγνώριση Ομοταγούς</b>",
                    "<div style='display: flex; flex-direction: row; column-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε να κριθεί εάν ένα Ίδρυμα πληροί τα κριτήρια του Ομοταγούς, 
                        ώστε να συγκαταλέγεται στην λίστα των Αναγνωρισμένων Ιδρυμάτων.
                        </span>
                    </div>"
                ),
                array(
                    "<b>Αντιστοιχίας Βαθμού</b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την αντιστοιχία βαθμού στην Ελληνική δεκάβαθμη κλίμακα. 
                        Η βεβαίωση αντιστοιχίας βαθμού χορηγείται μετά την αναγνώριση της ισοτιμίας 
                        του τίτλου σπουδών.
                        </span>
                    </div>"
                ),
                array(
                    "<b>Έκδοση Ακριβούς Αντιγράφου</b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την έκδοση ακριβούς αντιγράφου εγγράφων και αποφάσεων του Δ.Ο.Α.Τ.Α.Π. 
                        από τον φάκελό σας.
                        </span>
                    </div>"
                ),
                array(
                    "<b>Έκδοση Αποσπάσματος Πρακτικών Δ.Σ</b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την έκδοση αποσπάσματος από πρακτικά του Δ.Σ. του Δ.Ο.Α.Τ.Α.Π.
                        </span>
                    </div>"
                ),
                array(
                    "<b>Επανεξέτασης</b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την επανεξέταση της κρίσης του τίτλου σπουδών. 
                        Η αίτηση επανεξέτασης υποβάλλεται εντός αποκλειστικής προθεσμίας ενός 
                        έτους από την ημερομηνία παραλαβής της Πράξης Αναγνώρισης.
                        </span>
                    </div>"
                ),
                array(
                    "<b>Επιστροφής Παραβόλου</b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Η αίτηση που πρέπει να υποβάλετε εφόσον 
                        επιθυμείτε την επιστροφή του παραβόλου. ΠΡΟΣΟΧΗ: Αίτηση επιστροφής παραβόλου 
                        που δεν συνοδεύεται από πρωτότυπο παράβολο ή αποδεικτικό έγγραφο του αριθμού 
                        ΙΒΑΝ του δικαιούχου ΔΕΝ ΓΙΝΕΤΑΙ ΔΕΚΤΗ.</span>
                    </div>"
                )
            );
            echoAccordion(accordionContent, true);
        ?>
    </div>
</div>
<?php require_once("../components/footer.php"); ?>


</body>
