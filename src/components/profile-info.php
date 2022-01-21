
<?php
    # require $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

    const _sample_form_values_ = array(
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
                    <input type="number" class="form-control" id="' . $dateID . '-day" name="' . $dateID . '-day" value="' . $dateValues["day"] . '">
                </div>
                <div class="date-field-container" style="width: 3rem;">
                    <label for="' . $dateID . '-month">Μήνας</label>
                    <input type="number" class="form-control" id="' . $dateID . '-month" name="' . $dateID . '-month" min="1" max="12" value="' . $dateValues["month"] . '">
                </div>
                <div class="date-field-container" style="width: 4rem;">
                    <label for="' . $dateID . '-year">Έτος</label>
                    <input type="number" class="form-control" id="' . $dateID . '-year" name="' . $dateID . '-year" min="1900" value="' . $dateValues["year"] . '">
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
            <input type='text' class='form-control' id='$fieldID' name='$fieldID' value='$value' >
            <div class='invalid-feedback'>
            $invalidInputMsg
            </div>
            

        </div>
        ";
    }

    function echoCountryField(string $fieldID, string $description, string $invalidInputMsg, string $selectedValue = '')
    {
        $countries = getCountries();
        echo '
        <div class="field-container">
            <label for=' . $fieldID . ' class="form-label">' . $description . '</label>
            <select class="form-select" id="' . $fieldID . '" name="' . $fieldID . '" aria-label="Επιλογή χώρας">';
                if ($selectedValue == '') {
                    echo '<option value="none" disabled selected="selected">Επιλέξτε Χώρα</option>';
                }
                
                foreach ($countries as $country) {
                    $value = $country["coun_id"];
                    $name = $country["name"];
                    if ($value == $selectedValue) {
                        echo '<option value="' . $value . '" selected="selected">' . $name . '</option>';
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
            <input type='password' class='form-control' id='$fieldID' name='$fieldID' value='$value'>
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
                <input class='form-check-input' type='checkbox' value='$value' id='$fieldID' name='$fieldID'>
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
            <select class='form-select' id='$fieldID' name='$fieldID'>
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
                    <input class='form-check-input' type='radio' name='$fieldID' value='$index' id='$fieldID-$index' checked>
                    <label class='form-check-label' for='$fieldID-$index'>
                        $option
                    </label>
                </div>
                ";
            } else {
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='$fieldID' value='$index' id='$fieldID-$index'>
                    <label class='form-check-label' for='$fieldID-$index'>
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
                echoRadioField('gender', 'Φύλο', "Παρακαλώ, επιλέξτε φύλο.",
                            array("Άνδρας", "Γυναίκα", "Άλλο"), $values['gender']);

                echo '
                </div>';
            }

            // Basics group
            echo '
            <div class="form-fields-group-vertical">
            ';
            echoTextField('fname', 'Όνομα', "Παρακαλώ, επιλέξτε όνομα.", $values['fname']);
            echoTextField('surname', 'Επίθετο', "Παρακαλώ, επιλέξτε επίθετο.", $values['surname']);
            echoTextField('fathersName', 'Πατρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", $values['fathersName']);
            echoTextField('mothersName', 'Μητρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", $values['mothersName']);
            echoDateField('birthDate', "Ημ. γέννησης", "Παρακαλώ, επιλέξτε ημ. γέννησης.", $values['birthDate']);
            

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
            echoCountryField('country', 'Χώρα', "Παρακαλώ, επιλέξτε χώρα.", $values['country']);
            echoTextField('city', 'Πόλη', "Παρακαλώ, επιλέξτε πόλη.", $values['city']);
            echoTextField('address', 'Διεύθυνση', "Παρακαλώ, επιλέξτε διεύθυνση.", $values['address']);

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
<script>
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
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
