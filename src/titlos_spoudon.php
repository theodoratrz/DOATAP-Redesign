<script>
    var exampleEl = document.getElementById('example');
var popover = new bootstrap.Popover(exampleEl, options);
$('#no_mls_entry').popover('show').focus();
</script>
<?php
    # require $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";
    const _sample_titlos_values_ = array(
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

    
    function echoTitlosForm(array $values, bool $isRegisterForm = false)
    {
        echo '
        <div class="form-fields-container">
        ';

            if ($isRegisterForm) {
                // Username, email & pwd group
                echo '
                <div class="form-fields-group-vertical">
                ';
                echoTextField('titlos', 'Τίτλος Σπουδών', "Παρακαλώ, συμπληρώστε Τίτλος Σπουδών.", $values['titlos']);
                
                echoTextField('ects', 'Πιστωτικές Μονάδες(credits)', "Παρακαλώ, συμπληρώστε Πιστωτικές Μονάδες.", $values['ects']);
                echoTextField('uni', 'Πανεπιστήμιο', "Παρακαλώ, αναζητήστε πανεπιστήμιο για αντιστοίχιση.", $values['uni']);
                echoTextField('tei', 'ΤΕΙ', "Παρακαλώ, αναζητήστε ΤΕΙ για αντιστοίχιση.", $values['tei']);

                echo '
                </div>';
            }

            // Basics group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoDateField('entryDate', "Ημ. Εισαγωγής", "Παρακαλώ, επιλέξτε ημ. εγγραφής.", $values['entryDate']);
            echoDateField('graduationDate', "Ημ. Αποφοίτησης", "Παρακαλώ, επιλέξτε ημ. αποφοίτησης.", $values['graduationDate']);
            echoRadioField('attendance', 'Τύπος Φοίτησης', "Παρακαλώ, επιλέξτε τον τύπο φοίτησης.",
                            array("Συμβατικός", "Εξ Αποστάσεως"), $values['attendance']);
            echoRadioField('fullTime', 'Τύπος Φοίτησης', "Παρακαλώ, επιλέξτε τον τύπο φοίτησης.",
                            array("Τακτικη", "Μερική"), $values['fullTime']);

            echo '
            </div>';

            // Document group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoRadioField('docSelection', 'Έγγραφο Ταυτοποίησης', "Παρακαλώ, επιλέξτε έγγραφο ταυτοποίησης.",
                            array("Ταυτότητα", "Διαβατήριο"), $values['docSelection']);
            echoTextField('docID', 'Αριθμός Εγγράφου', "Παρακαλώ, επιλέξτε αριθμό εγγράφου.", $values['docID']);

            echo '
            </div>';

            // Region group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoCountryField('country', 'Χώρα', "Παρακαλώ, επιλέξτε χώρα σπουδών.", $values['country']);
            echoCountryField('universityAbroad', 'Χώρα', "Παρακαλώ, επιλέξτε πανεπιστήμιο.", $values['universityAbroad']);
            echoCountryField('attendanceTime', 'Χώρα', "Παρακαλώ, επιλέξτε έτη σπουδών.", $values['attendanceTime']);

            echo '
            </div>';

            // Contact group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoTextField('mobilePhone', 'Κινητό Τηλέφωνο', "Παρακαλώ, επιλέξτε αριθμό κινητού.", $values['mobilePhone']);
            echoTextField('homePhone', 'Σταθερό Τηλέφωνο', "Παρακαλώ, επιλέξτε αριθμό σταθερού.", $values['homePhone']);

            echo '
            </div>';
        
        echo '</div>';
    }
?>

<link rel="stylesheet" href="/css/profile_info.css">
 