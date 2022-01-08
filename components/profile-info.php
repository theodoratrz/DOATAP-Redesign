<?php

    const sampleFormValues = array(
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

    function echoProfileInfoForm(array $values)
    {
        echo '
        <div class="form-fields-container">
        ';

        // Top Group
        echo '
        <div class="form-fields-group-horizontal">
        ';

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
        echo '
        </div>';

        // Bottom Group

        echo '
        <div class="form-fields-group-horizontal">
        ';

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

        echo '
        </div>';

        // Submit Button
        echo '
        <div class="form-fields-group-horizontal">
        ';

            echo '
            <div class="form-submit-button">
                <button class="btn btn-primary" type="submit">Υποβολή</button>
            </div>
            ';

            echo '</div>';
        echo '</div>';
    }
?>

<link rel="stylesheet" href="css/profile_info.css">

<form name="profile-info-form" class="needs-validation" method="POST" novalidate>
    <script>
        function validateForm(form) {
            debugger;
            //const usernamePattern = /^[a-zA-Z]+[a-zA-Z0-9]*$/;
            const namePattern = /^(([A-Z][a-z]*)|([Α-Ω][α-ωίϊΐόάέύϋΰήώ]*))$/;
            const phonePattern = /^[0-9]+$/;

            const fieldPatterns = {
                "fname": namePattern,
                "surname": namePattern,
                "fathersName": namePattern,
                "mothersName": namePattern,
                "mobilePhone": phonePattern,
                "homePhone": phonePattern,
                /* "gender": '',
                "docSelection": '', */
                "docID": ''
            }

            const radioFields = [
                "gender",
                "docSelection"
            ]

            let valid = true;

            for (const [fieldName, pattern] of Object.entries(fieldPatterns)) {
                let field = form[fieldName]
                if (pattern === '') {
                    field.classList.remove('is-invalid');
                    field.classList.add('is-valid');
                    field.setCustomValidity('');
                    continue;
                }
                if (!pattern.test(field.value)) {
                    field.classList.remove('is-valid');
                    field.classList.add('is-invalid');
                    field.setCustomValidity('error');
                    valid = false;
                } else {
                    field.classList.remove('is-invalid');
                    field.classList.add('is-valid');
                    field.setCustomValidity('');
                }
            }

            /* for (let i = 0; i < radioFields.length; i++) {
                let radioField = form[radioFields[i]];                
            } */
            
            return valid;
        }

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            window.addEventListener('load', function() {

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let form = document.forms["profile-info-form"]

                form.addEventListener('submit', function (event) {
                    debugger;
                    if (!validateForm(form)) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false);
            });
        })();
    </script>
    <?php echoProfileInfoForm(sampleFormValues); ?>
</form>
