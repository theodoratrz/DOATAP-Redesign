<style>

.admin-approve-container {
    display: flex;
    flex-direction: column;
    row-gap: 1em;
}

.approval-form-contents {
    display: flex;
    flex-direction: column;
    row-gap: 1em;
}

.approval-form-field {
    display: flex;
    flex-direction: column;
    row-gap: .25em;
    align-items: flex-start;
}

.approval-form-extra-info {
    font-size: 18px;
}

.bold-label {
    font-weight: bold;
}

form[name="match-approve-form"] .form-control::placeholder {
    font-style: italic;
}

.submit-approval-button {
    display: flex;
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

.approval-form-field .form-control {
    width: 20em;
    height: 1.5em;    
    max-width: 80vw !important;
}

.error-message-container {
    display: none;
    background-color: white;
    border-color: red;
}

.error-message-container h5 {
    font-size: 26px;
}

.error-message-container p {
    font-size: 19px;
}

.close-message-btn, .close-message-btn:hover {
    background-color: #ffb4b4;
    color: black;
    border-color: red;
    font-size: 19px;
    height: 2em;
    padding: .25em 1em;
}

</style>
<script>
    var approveFormNamespace = {
        toggleVerificationModal: () => {
            $("#approveVerifyModal").modal("toggle");
        }
    }

    function handleUniversityOnKeyUp() {
        const universitySelection = document.getElementById("approve-university-selection");
        let departmentSelection = document.getElementById("approve-department-selection");

        if (universitySelection.value === "") {
            departmentSelection.value = '';
            departmentSelection.disabled = true;
        } else {
            departmentSelection.disabled = false;
        }
    }

    function getUniversityDepartments(universityInput) {

        let departmentSelection = document.getElementById("approve-department-selection");
        let departmentOptions = document.getElementById("departmentOptions");

        if (universityInput.value === "") {
            departmentSelection.value = '';
            departmentSelection.disabled = true;
        } else {
            departmentSelection.disabled = false;
            departmentOptions.innerHTML = '';
            const universities = document.getElementById("universityOptions").getElementsByTagName("option");

            for (const university of universities) {
                if (university.value === universityInput.value) {
                    function storeDepartments(departments) {
                        for (const department of departments) {
                            let optionNode = document.createElement("option");
                            optionNode.setAttribute('data-dep-id', department.dep_id);
                            optionNode.id = `dep_${department.dep_id}`;
                            optionNode.value = department.name;

                            departmentOptions.appendChild(optionNode);
                        }
                    }
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
                    });
                    break;
                }
            }
        }
    }
    
    function approveApplication(event) {
        event.preventDefault();
        $("#approveVerifyModal").modal("hide");

        const universitySelection = document.getElementById("approve-university-selection");
        const departmentSelection = document.getElementById("approve-department-selection");

        if (universitySelection.value === "" || departmentSelection.value === "") {
            document.getElementById('modal-body-msg').innerHTML = 'Εκρεμμεί η επιλογή ιδρύματος και τμήματος.';
            $('#errorMsgModal').modal("show");
        } else {
            $.ajax({
                type: "POST",
                url: "/application_approval.php",
                dataType: "json",
                success: answer => {
                    document.forms["match-approve-form"].submit();
                },
                error: answer => {
                    // Reject submission, failed to approve
                    let errorMsgElement = document.getElementById("error-msg-container");
                    document.getElementById('error-message').innerHTML = answer;
                    errorMsgElement.style.display = 'block';
                },
                data: {
                    "application_id" : window.applicationID,
                    "university": universitySelection.value,
                    "department": departmentSelection.value,
                    "comments": document.getElementById('admin-comments-textbox').value
                }
            });
        }
    }

    function closeErrorMsg() {
        let errorMsgElement = document.getElementById("error-msg-container");
        errorMsgElement.style.display = 'none';
        document.getElementById('error-message').innerHTML = '';
    }

</script>

<?php

function getUniversityOptions()
{
    return '
    <option id="uni_1" data-uni-id="1" value="ΕΚΠΑ">
    <option id="uni_2" data-uni-id="2" value="ΕΜΠ">
    <option id="uni_3" data-uni-id="3" value="ΟΠΑ">
    <option id="uni_4" data-uni-id="4" value="ΑΠΘ">
    <option id="uni_5" data-uni-id="5" value="Παν. Μακεδονίας">
    ';
}

function getApproveVerificationModal() {
    return '
    <div class="modal fade" id="approveVerifyModal" tabindex="-1" role="dialog" aria-labelledby="approveVerifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="approveVerifyModalLabel">Επιβεβαίωση</span>
                </div>
                <div id="approve-verify-modal-body-msg" class="modal-body">
                    Είστε βέβαιοι ότι θέλετε να εγκρίνετε αυτή την αίτηση?
                </div>
                <div class="modal-footer verify-footer">
                    <button type="button" class="btn btn-secondary close-doc-btn cancel-reject" data-dismiss="modal" onclick="approveFormNamespace.toggleVerificationModal()">
                        Ακύρωση
                    </button>
                    <button type="submit" class="btn btn-secondary close-doc-btn verify-reject" data-dismiss="modal" onclick="approveApplication(event)">
                        Συνέχεια
                    </button>
                </div>
            </div>
        </div>
    </div>
    ';
}

function getApplicationApproveForm()
{
    return '
    <div class="admin-approve-container">
        <span>
            Για την έγκριση της αίτησης, επιλέξτε ίδρυμα & τμήμα για αντιστοίχιση τίτλου σπουδών:
        </span>
        <form name="match-approve-form" method="GET" onsubmit="approveApplication(event)">
            <input type="hidden" name="app_id" value="'. $_GET['app_id'] .'">
            <div class="approval-form-contents">
                <div class="approval-form-field">
                    <label class="bold-label" for="approve-university-selection">Επιλέξτε Ίδρυμα:</label>
                    <input class="form-control" list="universityOptions" id="approve-university-selection" placeholder="Επιλέξτε Ίδρυμα..."
                    onchange="getUniversityDepartments(this)" onkeyup="handleUniversityOnKeyUp()" autocomplete="off">
                    <span class="approval-form-extra-info">Μπορείτε επίσης να εισάγετε Ίδρυμα εκτός λίστας.</span>
                    <datalist id="universityOptions">' .

                    getUniversityOptions()
                    
                    . '
                    </datalist>
                </div>
                <div class="approval-form-field">
                    <label class="bold-label" for="approve-department-selection">Επιλέξτε Τμήμα:</label>
                    <input class="form-control" list="departmentOptions" id="approve-department-selection" placeholder="Επιλέξτε Τμήμα..."
                    autocomplete="off" disabled>
                    <span class="approval-form-extra-info">Μπορείτε επίσης να εισάγετε Τμήμα εκτός λίστας.</span>
                    <datalist id="departmentOptions">
                    </datalist>
                </div>
                <div class="submit-approval-button">
                    <button class="btn btn-primary" type="button" onclick="approveFormNamespace.toggleVerificationModal()">
                        Αντιστοίχιση και Έγκριση
                    </button>
                </div>
                '. getApproveVerificationModal() .'
            </div>
        </form>
    </div>
    ';
}

function getApplicationApproveFrozenForm(string $university, string $department)
{
    return '
    <div class="admin-approve-container">
        <span>
            Έχει επιλεγεί το ακόλουθο ίδρυμα & τμήμα για αντιστοίχιση τίτλου σπουδών:
        </span>
        <form name="match-approve-form">
            <div class="approval-form-contents">
                <div class="approval-form-field">
                    <span class="bold-label">Επιλεγμένο Ίδρυμα:</span>
                    <span>' . $university . '</span>
                </div>
                <div class="approval-form-field">
                    <span class="bold-label">Επιλεγμένο Τμήμα:</span>
                    <span>' . $department . '</span>
                </div>
            </div>
        </form>
    </div>
    ';
}

?>
