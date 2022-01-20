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

.documents-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    row-gap: .2em;
    overflow: hidden;
}

.document-field-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border-top: 1px solid #b7b0b0;
    margin-top: -1px;
}

.document-file-button {
    border: 0px;
    outline: none;
    background-color: transparent;
    text-decoration: underline;
    color: blue;
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

function getBasicInfo(array $userInfo)
{
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
                <div class="basic-info-field-title">Σταθ. Τηλέφωνο:</div>
                ' . $userInfo['homePhone'] . '
            </div>
        </div>
    </div>
    ';
}

function getStudiesTitle(array $studiesInfo)
{
    return '
    <div class="basic-info-container">
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Χώρα:</div>
                ' . $studiesInfo['country'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ίδρυμα:</div>
                ' . $studiesInfo['university'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Τίτλος Σπουδών:</div>
                ' . $studiesInfo['title'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Έτη σπουδών:</div>
                ' . $studiesInfo['studyYears'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Πιστωτικές Μονάδες:</div>
                ' . $studiesInfo['ects'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Τύπος Φοίτησης:</div>
                ' . $studiesInfo['studies_type'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Προγρ. Φοίτησης:</div>
                ' . $studiesInfo['studies_duration'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ημ. εκκίνησης:</div>
                ' . $studiesInfo['dateStarted'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ημ. ολοκλήρωσης:</div>
                ' . $studiesInfo['dateFinished'] . '
            </div>
        </div>
    </div>';
}

function getDocuments(array $documentsInfo)
{
    return '
    <div class="documents-container">
        <div class="document-field-container">
            <button class="document-file-button" data-img-src="' . $documentsInfo['id'][0] . '">Έγγραφο Ταυτοπροσωπίας</button>
            <label class="approve-checkbox">
                <input type="checkbox" checked>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button class="document-file-button"  data-img-src="' . $documentsInfo['title'][0] . '">Τίτλος Σπουδών</button>
            <label class="approve-checkbox">
                <input type="checkbox" checked>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button class="document-file-button"  data-img-src="' . $documentsInfo['application'][0] . '">Αίτηση</button>
            <label class="approve-checkbox">
                <input type="checkbox" checked>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        
    </div>
    ';
}

function getRejectFormAccordion(array $applicationInfo)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

    $accordionContent = array(
        array(
            '<span class="accordion-header-title">Προσωπικά Στοιχεία</span>',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                <label class="approve-checkbox">
                    <input type="checkbox" checked>Έγκριση Προσωπικών Στοιχείων</input>
                </label>'
                . getBasicInfo($applicationInfo['basic_info']) . '
            </div>
            '
        ),
        array(
            '<span class="accordion-header-title">Τίτλος Σπουδών</span>',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                <label class="approve-checkbox">
                    <input type="checkbox" checked>Έγκριση Τίτλου Σπουδών</input>
                </label>'
                . getStudiesTitle($applicationInfo['studies_info']) . '
            </div>
            '
        ),
        array(
            '<span class="accordion-header-title">Δικαιολογητικά</span>',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                ' . getDocuments($applicationInfo['documents']) . '
            </div>
            '
        )
    );
    
    ob_start();
    echoAccordion($accordionContent, true);
    $tabs = ob_get_contents();
    ob_clean();
    return $tabs;
}

function getApplicationRejectForm(array $applicationInfo)
{
    return '
    <div class="admin-reject-container">
        <span style="font-size: 21px;">
            Σε περίπτωση απόρριψης της αίτησης, μπορείτε να αποεπιλέξτε την επιλογή έγκρισης σε κάποια ενότητα ή δικαιολογητικό:
        </span>
        <form name="application-reject-form" onsubmit="rejectApplication()">
            ' . getRejectFormAccordion($applicationInfo) . '
        </form>
    </div>
    ';
}

function getFrozenDocuments(array $documentsInfo)
{
    return '
    <div class="documents-container">
        <div class="document-field-container">
            <button class="document-file-button"  data-img-src="' . $documentsInfo['id'][0] . '">Έγγραφο Ταυτοπροσωπίας</button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['id'][1] === "1" ? 'checked' : "") . ' disabled>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button class="document-file-button"  data-img-src="' . $documentsInfo['application'][0] . '">Τίτλος Σπουδών</button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['application'][1] === "1" ? "checked" : "") . ' disabled>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button class="document-file-button"  data-img-src="' . $documentsInfo['title'][0] . '">Αίτηση</button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['title'][1] === "1" ? "checked" : "") . ' disabled>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        
    </div>
    ';
}

function getFrozenRejectFormAccordion(array $applicationInfo)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

    $accordionContent = array(
        array(
            '<span class="accordion-header-title">Προσωπικά Στοιχεία</span>',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                <label class="approve-checkbox">
                    <input type="checkbox" ' . ($applicationInfo["basic_info_accepted"] === "1" ? "checked" : "") . ' disabled>Έγκριση Προσωπικών Στοιχείων</input>
                </label>'
                . getBasicInfo($applicationInfo["basic_info"]) . '
            </div>
            '
        ),
        array(
            '<span class="accordion-header-title">Τίτλος Σπουδών</span>',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                <label class="approve-checkbox">
                    <input type="checkbox" ' . ($applicationInfo["studies_info_accepted"] === "1" ? "checked" : "") . ' disabled>Έγκριση Τίτλου Σπουδών</input>
                </label>'
                . getStudiesTitle($applicationInfo["studies_info"]) . '
            </div>
            '
        ),
        array(
            '<span class="accordion-header-title">Δικαιολογητικά</span>',
            '
            <div style="display: flex; flex-direction: column; row-gap: .8em;">
                ' . getFrozenDocuments($applicationInfo["documents"]) . '
            </div>
            '
        )
    );
    
    ob_start();
    echoAccordion($accordionContent, true);
    $tabs = ob_get_contents();
    ob_clean();
    return $tabs;
}

function getApplicationFrozenRejectForm(array $applicationInfo)
{
    return '
    <div class="admin-reject-container">
        <span style="font-size: 21px;">
            Παρακάτω εμφανίζονται οι πληροφορίες έγκρισης πεδίων και δικαιολογητικών:
        </span>
        <form name="application-reject-form" onsubmit="rejectApplication()">
            ' . getFrozenRejectFormAccordion($applicationInfo) . '
        </form>
    </div>
    ';
}

?>
