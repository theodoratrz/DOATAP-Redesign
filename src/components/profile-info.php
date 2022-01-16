<?php

    const _sample_form_values_ = array(
        "fname" => "Κώστας",
        "surname" => "Χρήστου",
        "fathersName" => "Χρήστος",
        "mothersName" => "Μαρία",
        "gender" => "Άνδρας",
        "docSelection" => "Ταυτότητα",
        "docID" => "14572",

        "mobilePhone" => "6969696969",
        "homePhone" => "2106969696",
    );

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

    function echoProfileInfoForm(array $values, bool $isRegisterForm = false)
    {
        echo '
        <div class="form-fields-container">
        ';

            if ($isRegisterForm) {
                // Username, email & pwd group
                echo '
                <div class="form-fields-group-vertical">
                ';
                echoTextField('uname', 'Όνομα Χρήστη', "Παρακαλώ, επιλέξτε όνομα χρήστη.", $values['uname']);
                echoTextField('email', 'Διεύθυνση Ηλ. Ταχυδρομείου', "Παρακαλώ, επιλέξτε διεύθυνση email.", $values['email']);
                echoPwdField('pwd', 'Κωδικός', "Παρακαλώ, επιλέξτε κωδικό.", $values['pwd']);
                echoPwdField('pwd_dup', 'Επιβεβαίωση Κωδικού', "Παρακαλώ, επιβεβαιώστε τον κωδικό σας.", $values['pwd_dup']);

                echo '
                </div>';
            }

            // Names group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoTextField('fname', 'Όνομα', "Παρακαλώ, επιλέξτε όνομα.", $values['fname']);
            echoTextField('surname', 'Επίθετο', "Παρακαλώ, επιλέξτε επίθετο.", $values['surname']);
            echoTextField('fathersName', 'Πατρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", $values['fathersName']);
            echoTextField('mothersName', 'Μητρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", $values['mothersName']);

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

        // Bottom Group

            // Phone Numbers group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoTextField('mobilePhone', 'Κινητό Τηλέφωνο', "Παρακαλώ, επιλέξτε αριθμό κινητού.", $values['mobilePhone']);
            echoTextField('homePhone', 'Σταθερό Τηλέφωνο', "Παρακαλώ, επιλέξτε αριθμό σταθερού.", $values['homePhone']);

            echo '
            </div>';

            // Gender group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoRadioField('gender', 'Έγγραφο Ταυτοποίησης', "Παρακαλώ, επιλέξτε φύλο.",
                            array("Άνδρας", "Γυναίκα", "Άλλο"), $values['gender']);

            echo '
            </div>';

        // Submit Button

            echo '
            <div class="form-submit-button">
                <button class="btn btn-primary" type="submit">Υποβολή</button>
            </div>
            ';
        
        echo '</div>';
    }
?>

<link rel="stylesheet" href="/css/profile_info.css">

<!-- Usage template: -->
<!-- <form name="profile-info-form" class="needs-validation" method="POST" novalidate>
    <script>
        function validateForm(form) {

        }

        (function () {
            'use strict'

            window.addEventListener('load', function() {
                
                let form = document.forms["<form_id>"]

                form.addEventListener('submit', function (event) {
                    if (!validateForm(form)) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false);
            });
        })();
    </script>
    </?php echoProfileInfoForm(_sample_form_values_); ?>
</form> -->
