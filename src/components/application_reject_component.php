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
    font-size: 19px;
    height: 2em;
    padding: .25em 1em;
}

.close-doc-btn.verify-reject{
    background-color: #0e7415;
    color: white;
    border-color: #0e7415;
}

.close-doc-btn.verify-reject:hover {
    background-color: #13981c;
    color: white;
    border-color: #13981c;
}

.close-doc-btn.cancel-reject {
    background-color: #b42727;
    color: white;
    border-color: #b42727;
}

.close-doc-btn.cancel-reject:hover {
    background-color: #d91c1c;
    color: white;
    border-color: #d91c1c;
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

.verify-footer {
    justify-content: space-between;
}

#docImgModal .modal-content {
    width: max-content;
}

.document-image {
    width: 25rem;
}

</style>
<script>

    var rejectFormNamespace = {
        toggleVerificationModal: () => {
            $("#rejectVerifyModal").modal("toggle");
        }
    }

    function openDocumentModal(documentButton) {
        const imgURL = documentButton.getAttribute('data-img-src');
        const modalMainContent = `<img class="document-image" alt="Document Image (${imgURL})" src="${imgURL}">`;
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
        rejectFormNamespace.toggleVerificationModal();
        $.ajax({
            type: "POST",
            url: "/requests_api/reject_application.php",
            dataType: "json",
            success: answer => {
                // Success, reload page
                document.forms["application-reject-form"].submit();
            },
            error: answer => {
                // Show Error Modal
                document.getElementById('modal-body-msg').innerHTML = answer;
                $('#errorMsgModal').modal("show");
            },
            data: {
                "application_id" : window.applicationID,
                "basic_info": document.getElementById('basic_info_check').checked ? "1" : "0",
                "studies_info": document.getElementById('studies_info_check').checked ? "1" : "0",
                "documents": {
                    'id': document.getElementById('id_check').checked ? "1" : "0",
                    'app': document.getElementById('application_check').checked ? "1" : "0",
                    'par': document.getElementById('fee_check').checked ? "1" : "0",
                    'title': "1"
                },
                "comments": document.getElementById('admin-comments-textbox').value
            }
        })
    }

</script>

<?php

function getRejectVerificationModal() {
    return '
    <div class="modal fade" id="rejectVerifyModal" tabindex="-1" role="dialog" aria-labelledby="rejectVerifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="rejectVerifyModalLabel">Επιβεβαίωση</span>
                </div>
                <div id="reject-verify-modal-body-msg" class="modal-body">
                    Είστε βέβαιοι ότι θέλετε να απορρίψετε αυτή την αίτηση?
                </div>
                <div class="modal-footer verify-footer">
                    <button type="button" class="btn btn-secondary close-doc-btn cancel-reject" data-dismiss="modal" onclick="rejectFormNamespace.toggleVerificationModal()">
                        Ακύρωση
                    </button>
                    <button type="submit" class="btn btn-secondary close-doc-btn verify-reject" data-dismiss="modal" onclick="rejectApplication(event)">
                        Συνέχεια
                    </button>
                </div>
            </div>
        </div>
    </div>
    ';
}

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
    switch ($userInfo['gender']) {
        case 'Male':
            $gender = 'Άνδρας';
            break;
        case 'Female':
            $gender = 'Γυναίκα';
            break;
        case 'Other':
            $gender = 'Άλλο';
            break;        
        default:
            $gender = $userInfo['gender'];
            break;
    }

    switch ($userInfo['docType']) {
        case 'ID':
            $docType = 'Ταυτότητα';
            break;
        case 'passport':
            $docType = 'Διαβατήριο';
            break;        
        default:
            $docType = $userInfo['docType'];
            break;
    }

    return '
    <div class="basic-info-container">
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Χρήστης:</div>
                ' . $userInfo['username'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Email:</div>
                ' . $userInfo['email'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ταυτοποίηση:</div>
                ' . $docType . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Αριθμός Εγγράφου:</div>
                ' . $userInfo['docNumber'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Όνομα:</div>
                ' . $userInfo['first_name'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Επώνυμο:</div>
                ' . $userInfo['last_name'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Πατρώνυμο:</div>
                ' . $userInfo['fathers_name'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Μητρώνυμο:</div>
                ' . $userInfo['mothers_name'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ημ. γέννησης:</div>
                ' . $userInfo['birthday'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Φύλο:</div>
                ' . $gender . '
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
                ' . $userInfo['mobile'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Σταθ. Τηλέφωνο:</div>
                ' . $userInfo['phone'] . '
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
                ' . getCountryName($studiesInfo['country']) . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ίδρυμα:</div>
                ' . $studiesInfo['university'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Τμήμα:</div>
                ' . $studiesInfo['department'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Τύπος Πτυχίου:</div>
                ' . $studiesInfo['degree_type'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Έτη σπουδών:</div>
                ' . $studiesInfo['yearsOfStudy'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Πιστωτικές Μονάδες:</div>
                ' . $studiesInfo['ECTS'] . '
            </div>
        </div>
        <div class="basic-info-field-group">
            <div class="basic-info-field">
                <div class="basic-info-field-title">Τύπος Φοίτησης:</div>
                ' . ($studiesInfo['studiesType'] === "1" ? "Συμβατικός" : "Εξ αποστάσεως") . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Προγρ. Φοίτησης:</div>
                ' . ($studiesInfo['attendance']  === "1" ? "Τακτική" : "Μερική"). '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ημ. εκκίνησης:</div>
                ' . $studiesInfo['dateIntro'] . '
            </div>
            <div class="basic-info-field">
                <div class="basic-info-field-title">Ημ. ολοκλήρωσης:</div>
                ' . $studiesInfo['dateGrad'] . '
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
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button"  data-img-src="' . $documentsInfo['fee'][0] . '">
                Παράβολο
            </button>
            <label class="approve-checkbox">
                <input id="fee_check" type="checkbox" checked>
                    Εγκρίνεται
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button"  data-img-src="' . $documentsInfo['application'][0] . '">
                Τίτλος Σπουδών
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
                . getStudiesTitle($applicationInfo) . '
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
        <span>
            Σε περίπτωση απόρριψης της αίτησης, μπορείτε να αποεπιλέξτε την επιλογή έγκρισης σε κάποια ενότητα ή δικαιολογητικό:
        </span>
        ' . getDocumentImageModal() . '
        <form name="application-reject-form" method="GET" onsubmit="rejectApplication(event)">
            <input type="hidden" name="app_id" value="'. $_GET['app_id'] .'">
            ' . getRejectFormAccordion($applicationInfo) . '
            <div class="reject-application-button">
                <button class="btn btn-primary" type="button" onclick="rejectFormNamespace.toggleVerificationModal()">Απόρριψη Αίτησης</button>
            </div>
            ' . getRejectVerificationModal() . '
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
                    Εγκρίθηκε
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button" data-img-src="' . $documentsInfo['fee'][0] . '">
                Παράβολο
            </button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['fee'][1] === "1" ? "checked" : "") . ' disabled>
                    Εγκρίθηκε
                </input>
            </label>
        </div>
        <div class="document-field-container">
            <button type="button" onclick="openDocumentModal(this)" class="document-file-button" data-img-src="' . $documentsInfo['application'][0] . '">
                Τίτλος Σπουδών
            </button>
            <label class="approve-checkbox">
                <input type="checkbox" ' . ($documentsInfo['application'][1] === "1" ? "checked" : "") . ' disabled>
                    Εγκρίθηκε
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
                    <input type="checkbox" ' . ($applicationInfo["basicInfoApproved"] === "1" ? "checked" : "") . ' disabled>Έγκριση Προσωπικών Στοιχείων</input>
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
                    <input type="checkbox" ' . ($applicationInfo["studiesInfoApproved"] === "1" ? "checked" : "") . ' disabled>Έγκριση Τίτλου Σπουδών</input>
                </label>'
                . getStudiesTitle($applicationInfo) . '
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
        <span>
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
