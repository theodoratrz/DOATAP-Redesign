<?php

    const sampleFormValues = array(
        "name" => "Κώστας",
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
            <input type='text' class='form-control' id='$fieldID' value='$value' required>
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
                <input class='form-check-input' type='checkbox' value='$value' id='$fieldID' required>
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
            <select class='form-select' id='$fieldID' required>
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
            echoTextField('name', 'Όνομα', "Παρακαλώ, επιλέξτε όνομα.", $values['name']);
            echoTextField('surname', 'Επίθετο', "Παρακαλώ, επιλέξτε επίθετο.", $values['surname']);
            echoTextField('fathersName', 'Πατρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", $values['fathersName']);
            echoTextField('mothersName', 'Πατρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", $values['mothersName']);

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
            echoTextField('homePhome', 'Σταθερό Τηλέφωνο', "Παρακαλώ, επιλέξτε αριθμό σταθερού.", $values['homePhone']);

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
        <div class="form-submit-button">
            <button class="btn btn-primary" type="submit">Υποβολή</button>
        </div>
        ';

        echo '</div>';
    }
?>

<link rel="stylesheet" href="css/profile_info.css">

<form class="needs-validation" novalidate>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
    <?php echoProfileInfoForm(sampleFormValues); ?>
</form>
