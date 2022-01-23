<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/forms.css">

<div class="modal fade" id="success-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Εγγραφή</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Εγγραφήκατε επιτυχώς!
            </div>
        </div>
    </div>
</div>


<body>

    <div class="page-container fluid-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
            <a href="/index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Εγγραφή</a>
            <div class="breadcrumb" style="align-items:end;">
                <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Εγγραφή</li>
            </div>
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
                <form id="registration-form" name="profile-info-form" class="needs-validation" novalidate>
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

                    </script>
                    <?php echoProfileInfoForm(formValues, true); ?>
                    <div class="form-submit-button">
                        <button type="button" id="registerbtn" class="registerbtn">Εγγραφή</button>
                    </div>
                    <p>Αν έχετε ήδη λογαριασμό <a href="login.php">Συνδεθείτε</a>.</p>
                    <p>Με τη δημιουργία λογαριασμού συμφωνείτε στους <a href="terms.php" target="_blank">Όρους Χρήσης-Δήλωση Απορρήτου</a>.</p>
                </form>

            </div>

        </div>
    </div>

</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

<script>
    $("#registerbtn").click(function() {
        let form = document.forms["profile-info-form"]
        if (validateForm(form)) {
            let form_data = $('#registration-form').serializeArray();
            $.post('/api/register.php', form_data)
                .done(function(data) {
                    if (data != 'success') {
                        // Display error
                        alert(data);
                    } else {
                        // Redirect to home
                        modal = $("#success-modal");
                        modal.modal('show');
                        modal.on("hidden.bs.modal", function() {
                            window.location.replace('/');
                        })
                    }
                });
        }
        form.classList.add('was-validated')
    })
</script>