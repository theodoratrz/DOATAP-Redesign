<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/forms.css">

<body>

    <div class="page-container fluid-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
                <a href="index.php" class="fas fa-arrow-circle-left"  style="text-decoration:none; color:#002E69; cursor:pointer; margin-left:13rem; margin-top:1.7rem;">Εγγραφή</a>
            </div>
            <div class="login-container-wrapper">
                <div class="login-container">
                    <h3 style="text-align:center">Δημιουργία Λογαριασμού</h3>
                    <hr>
                    <h7 style="text-align:center;">Συμπληρώστε τα στοιχεία σας ώστε να αποκτήσετε πρόσβαση</h7>
                    <br>
                    <h7 style="text-align:center;">σε όλες τις δυνατότητες της πλατφόρμας του ΔΟΑΤΑΠ.</h7>
                    <br>
                    <h7 style="text-align:center;"><b>Όλα τα πεδία είναι υποχρεωτικά.</b></h7>
                   
                    <hr>

                    <?php 
            require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";

            const formValues = array(
                "uname" => "",
                "email" => "",
                "pwd" => "",
                "pwd_dup" => "",

                "fname" => "",
                "surname" => "",
                "fathersName" => "",
                "mothersName" => "",
                "birthDate" => "",
                "gender" => "",

                "country" => "",
                "city" => "",
                "address" => "",

                "docSelection" => "",
                "docID" => "",
        
                "mobilePhone" => "",
                "homePhone" => "",
            );
        ?>
        <form name="profile-info-form" class="needs-validation" method="POST" novalidate>
            <script>
                function validateForm(form) {

                    //const usernamePattern = /^[a-zA-Z]+[a-zA-Z0-9]*$/;

                    // Accept English & Greek names (more than 1 allowed)
                    const namePattern = /^([A-Z][a-z]*( [A-Z][a-z]*)*|[Α-Ω][α-ωίϊΐόάέύϋΰήώ]*( [Α-Ω][α-ωίϊΐόάέύϋΰήώ]*)*)$/;
                    const phonePattern = /^[0-9]+$/;
                    const docIDPattern = /^([A-Z]+|[Α-Ω]+)[ ]?[0-9]+$/;

                    const fieldPatterns = {
                        "fname": namePattern,
                        "surname": namePattern,
                        "fathersName": namePattern,
                        "mothersName": namePattern,
                        "mobilePhone": phonePattern,
                        "homePhone": phonePattern,
                        "docID": docIDPattern
                    }

                    /* const radioFields = [
                        "gender",
                        "docSelection"
                    ] */

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

                (function () {
                    'use strict'

                    window.addEventListener('load', function() {
                        
                        let form = document.forms["profile-info-form"]

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
            <?php echoProfileInfoForm(formValues, true); ?>
            <p>By creating an account you agree to our <a href="terms.php" target="_blank">Οροι Χρήσης-Δήλωση Απορρήτου</a>.</p>
            <div class="form-submit-button">
                    <button type="submit" class="registerbtn">Εγγραφή</button>
            </div>
            <p>Αν έχετε ήδη λογαριασμό <a href="login.php">Συνδεθείτε</a>.</p>
        </form>
                    
                </div>

</div> 
    </div>
        
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>