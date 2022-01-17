
<?php
    # require $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

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

    function echoDateField(string $dateID, string $description, string $invalidInputMsg, string $value = '')
    {
        if ($value === '') {
            $dateValues = array(
                "day" => "",
                "month" => "",
                "year" => ""
            );
        } else {
            $splitValues = explode('-', $value);
            $dateValues = array(
                "day" => $splitValues[0],
                "month" => $splitValues[1],
                "year" => $splitValues[2]
            );
        }
        echo '
        <div class="field-container">
            <label for="' . $dateID . '" class="form-label">' . $description . '</label>
            <div class="date-container">
                <div class="date-field-container" style="width: 3rem;">
                    <label for="' . $dateID . '-day">Ημέρα</label>
                    <input type="number" class="form-control" id="' . $dateID . '-day" value="' . $dateValues["day"] . '">
                </div>
                <div class="date-field-container" style="width: 3rem;">
                    <label for="' . $dateID . '-month">Μήνας</label>
                    <input type="number" class="form-control" id="' . $dateID . '-month" min="1" max="12" value="' . $dateValues["month"] . '">
                </div>
                <div class="date-field-container" style="width: 4rem;">
                    <label for="' . $dateID . '-year">Έτος</label>
                    <input type="number" class="form-control" id="' . $dateID . '-year" min="1900" value="' . $dateValues["year"] . '">
                </div>
            </div>
            <div class="invalid-feedback">' . $invalidInputMsg .'</div>
        </div>
        ';
    }

    function echoTextField(string $fieldID, string $description, string $invalidInputMsg, string $value = '')
    {
        echo "
        <div class='field-container'>
            <label for='$fieldID' class='form-label'>$description</label>
            <input type='text' class='form-control' id='$fieldID' value='$value'>
            <div class='invalid-feedback'>
            $invalidInputMsg
            </div>
        </div>
        ";
    }

    function getAllCountries()
    {
        # return getCountries();
        return array(
            array(
                "count_id" => "1",
                "name" => "Ελλάδα"
            ),
            array(
                "count_id" => "2",
                "name" => "ΗΠΑ"
            ),
            array(
                "count_id" => "3",
                "name" => "Γαλλία"
            ),
            array(
                "count_id" => "4",
                "name" => "4"
            ),
            array(
                "count_id" => "5",
                "name" => "5"
            )
        );
    }

    function echoCountryField(string $fieldID, string $description, string $invalidInputMsg, string $selectedValue = '')
    {
        $countries = getAllCountries();
        echo '
        <div class="field-container">
            <label for=' . $fieldID . ' class="form-label">' . $description . '</label>
            <select class="form-select" id="' . $fieldID . '" aria-label="Επιλογή χώρας">';
                if ($selectedValue == '') {
                    echo '<option value="none" disabled selected>Επιλέξτε Χώρα</option>';
                }
                
                foreach ($countries as $country) {
                    $value = $country["count_id"];
                    $name = $country["name"];
                    if ($name === $selectedValue) {
                        echo '<option value="' . $value . '" selected>' . $name . '</option>';
                    } else {
                        echo '<option value="' . $value . '">' . $name . '</option>';
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

    function echoPwdField(string $fieldID, string $description, string $invalidInputMsg, string $value = '')
    {
        echo "
        <div class='field-container'>
            <label for='$fieldID' class='form-label'>$description</label>
            <input type='password' class='form-control' id='$fieldID' value='$value'>
            <div class='invalid-feedback'>
            $invalidInputMsg
            </div>
        </div>
        ";
    }

    function echoCheckboxField(string $fieldID, string $description, string $invalidInputMsg, string $value = '')
    {
        echo "
        <div class='field-container'>
            <div class='form-check'>
                <input class='form-check-input' type='checkbox' value='$value' id='$fieldID'>
                <label class='form-check-label' for='$fieldID'>
                $description
                </label>
                <div class='invalid-feedback'>
                $invalidInputMsg
                </div>
            </div>
        </div>
        ";
    }

    function echoSelectionsField(string $fieldID, string $description, $invalidInputMsg, array $options, string $value = '')
    {
        echo "
        <div class='field-container'>
            <label for='$fieldID' class='form-label'>$description</label>
            <select class='form-select' id='$fieldID'>
            <option selected disabled value=''>Επιλέξτε...</option>";

        foreach ($options as $option) {
            if ($option == $value) {
                echo "<option selected value='$option'>$option</option>";
            } else {
                echo "<option value='$option'>$option</option>";
            }
        }

        echo "
            </select>
            <div class='invalid-feedback'>
            $invalidInputMsg
            </div>
        </div>
        ";
    }

    function echoRadioField(string $fieldID, string $description, string $invalidInputMsg, array $options, string $value)
    {
        echo "
        <div class='field-container'>
            <label class='form-label'>$description</label>
        ";
        foreach ($options as $index => $option) {
            if ($value == $option) {
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='$fieldID' id='$fieldID$index' checked>
                    <label class='form-check-label' for='$fieldID$index'>
                        $option
                    </label>
                </div>
                ";
            } else {
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='$fieldID' id='$fieldID$index'>
                    <label class='form-check-label' for='$fieldID$index'>
                        $option
                    </label>
                </div>
                ";
            }
        }
        echo "
            <div class='invalid-feedback'>
            $invalidInputMsg
            </div>
        </div>
        ";
    }

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
 