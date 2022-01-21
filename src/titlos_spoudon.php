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
        "entryDate" => "",
        "graduationDate" => "",
        "attendance" => "Άνδρας",
        "fullTime" => "Άνδρας",
        "isotimia" => "Άνδρας",
        "with" => "Άνδρας",

        "country" => "",
        "universityAbroad" => "",
        "attendanceTime" => "",

    );

    function getAllUniversities()
    {
        # return getCountries();
        return array(
            array(
                "count_id" => "1",
                "name" => "ΕΚΠΑ"
            ),
            array(
                "count_id" => "2",
                "name" => "ΟΠΑ"
            ),
            array(
                "count_id" => "3",
                "name" => "ΠΑΠΕΙ"
            ),
            array(
                "count_id" => "4",
                "name" => "ΑΠΘ"
            ),
            array(
                "count_id" => "5",
                "name" => "ΠΑΜΑΚ"
            )
        );
    }
    function echoUniversityField(string $fieldID, string $description, string $invalidInputMsg, string $selectedValue = '')
    {
        $universities = getAllUniversities();
        echo '
        <div class="field-container">
            <label for=' . $fieldID . ' class="form-label">' . $description . '</label>
            <select class="form-select" id="' . $fieldID . '" name="' . $fieldID . '" aria-label="Επιλογή Πανεπιστημίου">';
                if ($selectedValue == '') {
                    echo '<option value="none" disabled selected>Επιλέξτε Πανεπιστήμιο</option>';
                }
                
                foreach ($universities as $university) {
                    $name = $university["name"];
                    if ($name === $selectedValue) {
                        echo '<option value="' . $name . '" selected>' . $name . '</option>';
                    } else {
                        echo '<option value="' . $name . '">' . $name . '</option>';
                    }
                }

            echo '
            </select>
            <div class="invalid-feedback">'. 
            $invalidInputMsg .'
            </div>
        </div>
        ';
    }

    function echoTitlosForm(array $values, bool $isRegisterForm = false)
    {
        echo '
        <div style="display:flex; flex-direction:column; align-items:center;">
            <h6 style="font-size:large"><i class="fas fa-info-circle"></i> Στοιχεία Τίτλου Σπουδών προς αναγνώριση </h6>
            <h7 style="font-size:medium; color:red;"> Παρακαλώ Συμπληρώστε με Κεφαλαία Γράμματα. </h7>
        </div>
        <div class="form-fields-container">';
        
            echoRadioField('attendance', 'Τύπος Φοίτησης', "Παρακαλώ, επιλέξτε τον τύπο φοίτησης.",
            array("Συμβατικός", "Εξ Αποστάσεως"), $values['attendance']);
            echoRadioField('partTime', 'Τύπος Φοίτησης', "Παρακαλώ, επιλέξτε τον τύπο φοίτησης.",
            array("Τακτικη", "Μερική"), $values['fullTime']);
            echoCountryField('country', 'Χώρα', "Παρακαλώ, επιλέξτε χώρα σπουδών.", $values['country']);
            echoUniversityField('universityAbroad', 'Πανεπιστήμιο', "Παρακαλώ, επιλέξτε πανεπιστήμιο.", $values['universityAbroad']);            
            echoTextField('ects', 'Πιστωτικές Μονάδες(credits)', "Παρακαλώ, συμπληρώστε Πιστωτικές Μονάδες.", $values['ects']);
            echoTextField('attendanceTime', 'Έτη σπουδών', "Παρακαλώ, επιλέξτε έτη σπουδών.", $values['attendanceTime']);
            echoDateField('entryDate', "Ημ. Εισαγωγής", "Παρακαλώ, επιλέξτε ημ. εγγραφής.", $values['entryDate']);
            echoDateField('graduationDate', "Ημ. Αποφοίτησης", "Παρακαλώ, επιλέξτε ημ. αποφοίτησης.", $values['graduationDate']);
 
        
        echo '</div>';
    }
?>

<link rel="stylesheet" href="/css/profile_info.css">
 