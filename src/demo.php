<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php"; ?>

<link rel="stylesheet" href="css/index.css">

<body>

<div class="page-container fluid-container">
    <?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>

    <style>
    .central-container {
        padding: 1rem;
        display: flex;
        flex-direction: row;
        column-gap: 2rem;
        row-gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    @media only screen and (max-width: 840px) {
        .central-container {
            flex-direction: column;
            align-items: center;
        }
    }
    </style>

    <div class="central-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/react_usage_template.php" ?>
        <?php 
        require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs.php"; 
        const tabContent = array(
            "Βασικές Πληροφορίες" => array(
                "basic_info",
                '<p><strong>This is the Βασικές Πληροφορίες tab\'s associated content.</strong>
                Clicking another tab will toggle the visibility of this one for the next.
                The tab JavaScript swaps classes to control the content visibility and styling.
                You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
            ),
            "Επιλεγμένα Τμήματα" => array(
                "selected_deps",
                '<p><strong>This is the Επιλεγμένα Τμήματα tab\'s associated content.</strong>
                Clicking another tab will toggle the visibility of this one for the next.
                The tab JavaScript swaps classes to control the content visibility and styling.
                You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
            ),
            "Επιλογές Αντιστοίχησης" => array(
                "course_choices",
                '<p><strong>This is the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
                Clicking another tab will toggle the visibility of this one for the next.
                The tab JavaScript swaps classes to control the content visibility and styling.
                You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
            ),
        );
        echoContentTabs(tabContent);
        ?>

        <?php 
            require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";

            const formValues = array(
                "uname" => "",
                "email" => "",
                "pwd" => "",
                "pwd_dup" => "",
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
        ?>
        <form name="profile-info-form" class="needs-validation" method="POST" novalidate>
            <script>
                function validateForm(form) {

                    //const usernamePattern = /^[a-zA-Z]+[a-zA-Z0-9]*$/;

                    // Accept English & Greek names (more than 1 allowed)
                    const namePattern = /^([A-Z][a-z]*( [A-Z][a-z]*)*|[Α-Ω][α-ωίϊΐόάέύϋΰήώ]*( [Α-Ω][α-ωίϊΐόάέύϋΰήώ]*)*)$/;
                    const phonePattern = /^[0-9]+$/;

                    const fieldPatterns = {
                        "fname": namePattern,
                        "surname": namePattern,
                        "fathersName": namePattern,
                        "mothersName": namePattern,
                        "mobilePhone": phonePattern,
                        "homePhone": phonePattern,
                        "docID": ''
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
        </form>
    </div>
</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php"; ?>

</body>
