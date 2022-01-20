<style>

.admin-reject-container {
    display: flex;
    flex-direction: column;
    row-gap: 1em;
}

.bold-label {
    font-weight: bold;
}

form[name="application-reject-form"] .form-control::placeholder {
    font-style: italic;
}

.accordion-header-title {
    font-size: 22px;
    font-weight: bold;
}

.approve-checkbox {
    display: flex;
    flex-direction: row;
    align-items: center;
    column-gap: .25em;
    font-size: 18px;
    font-weight: bold;
}

.basic-info-container {
    display: flex;
    width: min(max(50%, 25em), 100%);
    flex-direction: row;
    flex-wrap: wrap;
    column-gap: 1em;
    row-gap: .5em;
}

.basic-info-field-group {
    display: flex;
    flex: 1;
    flex-direction: column;
}

.basic-info-field {
    display: flex;
    flex-direction: row;
    align-items: center;
    column-gap: .5em;
    font-size: 18px;
}

.basic-info-field-title {
    font-weight: bold;
    font-size: 18px;
}

</style>
<script>

    function rejectApplication(params) {
        $.ajax({
            type: "GET",
            url: "/get_university_departments.php",
            dataType: "json",
            success: answer => {
                storeDepartments(answer);
            },
            error: answer => {
                console.log("No departments found");
            },
            data: {
                "university": university.getAttribute('data-uni-id')
            }
        })
    }

</script>

<?php

function getBasicInfo()
{
    # get these from DB
    $userInfo = array(
        "uname" => "kostas_44",
        "email" => "kostas44@gmail.com",

        "fname" => "Κώστας",
        "surname" => "Χρήστου",
        "fathersName" => "Χρήστος",
        "mothersName" => "Μαρία",
        "birthDate" => "31-1-1999",
        "gender" => "Άνδρας",

        "country" => "Ελλάδα",
        "city" => "Αθήνα",
        "address" => "Αθηνάς 4",

        "docSelection" => "Ταυτότητα",
        "docID" => "14572",

        "mobilePhone" => "6969696969",
        "homePhone" => "2106969696",
    );

    return '
    <div class="basic-info-container">
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Χρήστης:</div>
                ' . $userInfo['uname'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Email:</div>
                ' . $userInfo['email'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ταυτοποίηση:</div>
                ' . $userInfo['docSelection'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Αριθμός Εγγράφου:</div>
                ' . $userInfo['docID'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Όνομα:</div>
                ' . $userInfo['fname'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Επώνυμο:</div>
                ' . $userInfo['surname'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Πατρώνυμο:</div>
                ' . $userInfo['fathersName'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Μητρώνυμο:</div>
                ' . $userInfo['mothersName'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ημ. γέννησης:</div>
                ' . $userInfo['birthDate'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Φύλο:</div>
                ' . $userInfo['gender'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Χώρα:</div>
                ' . $userInfo['country'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Πόλη:</div>
                ' . $userInfo['city'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Διεύθυνση:</div>
                ' . $userInfo['address'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Κινητό Τηλέφωνο:</div>
                ' . $userInfo['mobilePhone'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Σταθερό Τηλέφωνο:</div>
                ' . $userInfo['homePhone'] . '
            </div>
        </div>
    </div>
    ';
}

function getStudiesTitle()
{
    $studiesInfo = array(
        "uname" => "kostas_44",
        "email" => "kostas44@gmail.com",

        "fname" => "Κώστας",
        "surname" => "Χρήστου",
        "fathersName" => "Χρήστος",
        "mothersName" => "Μαρία",
        "birthDate" => "31-1-1999",
        "gender" => "Άνδρας",

        "country" => "Ελλάδα",
        "city" => "Αθήνα",
        "address" => "Αθηνάς 4",

        "docSelection" => "Ταυτότητα",
        "docID" => "14572",

        "mobilePhone" => "6969696969",
        "homePhone" => "2106969696",
    );

    return '
    <div class="basic-info-container">
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Χρήστης:</div>
                ' . $studiesInfo['uname'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Email:</div>
                ' . $studiesInfo['email'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ταυτοποίηση:</div>
                ' . $studiesInfo['docSelection'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Αριθμός Εγγράφου:</div>
                ' . $studiesInfo['docID'] . '
            </div>
        </div>
    </div>';
}

function getDocuments()
{

}

function getRejectFormAccordion()
{

    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

    $accordionContent = array(
        array(
            '
            <span class="accordion-header-title">Προσωπικά Στοιχεία</span>
            ',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                <label class="approve-checkbox">
                    <input type="checkbox" value="on">Έγκριση Προσωπικών Στοιχείων</input>
                </label>'
                . getBasicInfo() . '
            </div>
            '
        ),
        array(
            '
            <span class="accordion-header-title">Τίτλος Σπουδών</span>
            ',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                <label class="approve-checkbox">
                    <input type="checkbox" value="on">Έγκριση Τίτλου Σπουδών</input>
                </label>'
                . getStudiesTitle() . '
            </div>
            '
        ),
        array(
            '
            <span class="accordion-header-title">Δικαιολογητικά</span>
            ',
            'application documents HTML'
        )
    );
    
    ob_start();
    echoAccordion($accordionContent, true);
    $tabs = ob_get_contents();
    ob_clean();
    return $tabs;
}

function getApplicationRejectForm()
{
    return '
    <div class="admin-reject-container">
        <span style="font-size: 21px;">
            Σε περίπτωση απόρριψης της αίτησης, μπορείτε να αποεπιλέξτε την επιλογή έγκρισης σε κάποια ενότητα ή δικαιολογητικό:
        </span>
        <form name="application-reject-form" onsubmit="rejectApplication()">
            ' . getRejectFormAccordion() . '
        </form>
    </div>
    ';
}

function getApplicationRejectFrozenForm()
{
    return '
    <div class="admin-reject-container">
        <span style="font-size: 21px;">
            Για την απόρριψη της αίτησης, αποεπιλέξτε την επιλογή "Εγκρίνεται" σε κάποια ενότητα ή δικαιολογητικό:
        </span>
        <form name="application-reject-form" onsubmit="rejectApplication()">
        
        </form>
    </div>
    ';
}

?>
