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

.document-modal-title {
    font-size: 24px;
}

#docImgModal .modal-header {
    padding: .25em .5em;
    color: #818181;
}

.close-doc-btn {
    background-color: #d6d6d6;
    color: black;
    border-color: black;
    font-size: 19px;
    height: 2em;
    padding: .25em 1em;
}

.close-doc-btn:hover {
    background-color: #b7b7b7;
    color: black;
    border-color: black;
}

.reject-application-button {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    width: 100%;
}
.reject-application-button .btn.btn-primary {
    font-size: 20px;
}

</style>
<script>

    function openDocumentModal(documentButton) {
        const imgURL = documentButton.getAttribute('data-img-src');
        const modalMainContent = `<img alt="Document Image (${imgURL})" src="${imgURL}">`;
        document.getElementById('docImgModalLabel').innerHTML = `Έγγραφο: ${documentButton.innerHTML}`;
        document.getElementById('document-modal-body-msg').innerHTML = modalMainContent;
        $('#docImgModal').modal("show");
    }

    function hideDocumentModal() {
        $("#docImgModal").modal("toggle");
        document.getElementById('document-modal-body-msg').innerHTML = '';
    }

    function rejectApplication(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/reject_application.php",
            dataType: "json",
            success: answer => {
                console.log(answer);
                // Success Modal, reload page
            },
            error: answer => {
                // Error Modal
            },
            data: {
                "basic_info": document.getElementById('basic_info_check').checked ? "1" : "0",
                "studies_info": document.getElementById('studies_info_check').checked ? "1" : "0",
                "documents": {
                    'id': document.getElementById('id_check').checked ? "1" : "0",
                    'form': document.getElementById('application_check').checked ? "1" : "0",
                    'title': document.getElementById('title_check').checked ? "1" : "0",
                    'fee': ""
                }
            }
        })
    }

</script>

<?php

function getDocumentImageModal() {
    return '
    <div class="modal fade" id="docImgModal" tabindex="-1" role="dialog" aria-labelledby="docImgModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="document-modal-title" id="docImgModalLabel"></span>
                </div>
                <div id="document-modal-body-msg" class="modal-body">
                    <img goes here>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-doc-btn" data-dismiss="modal" onclick="hideDocumentModal()">Κλείσιμο</button>
                </div>
            </div>
        </div>
    </div>
    ';
}

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
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button" data-img-src="' . $documentsInfo['id'][0] . '">
                Έγγραφο Ταυτοπροσωπίας
            </button>
            <label class="approve-checkbox">
                <input id="id_check" type="checkbox" checked>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button"  data-img-src="' . $documentsInfo['title'][0] . '">
                Τίτλος Σπουδών
            </button>
            <label class="approve-checkbox">
                <input id="title_check" type="checkbox" checked>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button"  data-img-src="' . $documentsInfo['application'][0] . '">
                Αίτηση
            </button>
            <label class="approve-checkbox">
                <input id="application_check" type="checkbox" checked>
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
                    <input id="basic_info_check" type="checkbox" checked>Έγκριση Προσωπικών Στοιχείων</input>
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
                    <input id="studies_info_check" type="checkbox" checked>Έγκριση Τίτλου Σπουδών</input>
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
        ' . getDocumentImageModal() . '
        <form name="application-reject-form" onsubmit="rejectApplication(event)">
            ' . getRejectFormAccordion($applicationInfo) . '
            <div class="reject-application-button">
                <button class="btn btn-primary" type="submit">Απόρριψη Αίτησης</button>
            </div>
        </form>
    </div>
    ';
}

function getFrozenDocuments(array $documentsInfo)
{
    return '
    <div class="documents-container">
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button" data-img-src="' . $documentsInfo['id'][0] . '">
                Έγγραφο Ταυτοπροσωπίας
            </button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['id'][1] === "1" ? 'checked' : "") . ' disabled>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button" data-img-src="' . $documentsInfo['application'][0] . '">
                Τίτλος Σπουδών
            </button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['application'][1] === "1" ? "checked" : "") . ' disabled>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button" data-img-src="' . $documentsInfo['title'][0] . '">
                Αίτηση
            </button>
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
        ' . getDocumentImageModal() . '
        <form name="application-reject-form">
            ' . getFrozenRejectFormAccordion($applicationInfo) . '
        </form>
    </div>
    ';
}

?>
