<!-- <link rel="stylesheet" href="css/profile_info.css">

<div class="input-group-container">
    <label for="" class="input-description">Όνομα:</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons"
        value="Name">
    </div>
    <label class="input-description">Επίθετο:</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons"
        value="Surname">
    </div>
    <label class="input-description">Πατρώνυμο:</label>
    <div class="input-group mb-3">
        <span class="input-group-text">Πατρώνυμο:</span>
        <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons"
        value="Info">
    </div>
</div> -->

<?php

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
    <div class="form-fields-container">
        <?php echoTextField('name', 'Όνομα', "Παρακαλώ, επιλέξτε όνομα.", "Κώστας") ?>
        <?php echoTextField('surname', 'Επίθετο', "Παρακαλώ, επιλέξτε επίθετο.", "Χρήστου") ?>
        <?php echoTextField('fathersname', 'Πατρώνυμο', "Παρακαλώ, επιλέξτε πατρώνυμο.", "Πέτρος") ?>
        <?php echoCheckboxField('sample-checkbox', 'Αποδοχή Όρων', 'Παρακαλώ, αποδεχθείτε τους όρους.') ?>
        <?php echoSelectionsField('options-list', 'Επιλογές', 'Παρακαλώ, επιλέξτε.', array('1', '2', '3')) ?>

        <div class="form-submit-button">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </div>
</form>
