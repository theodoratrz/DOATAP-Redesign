<style>

.admin-courses-container {
    display: flex;
    flex-direction: column;
    row-gap: 1em;
}

.courses-form-contents {
    display: flex;
    flex-direction: column;
    row-gap: 1em;
}

.courses-form-field {
    display: flex;
    flex-direction: column;
    row-gap: .25em;
    align-items: flex-start;
}

.courses-form-extra-info {
    font-size: 18px;
}

.bold-label {
    font-weight: bold;
}

form[name="courses-submission-form"] .form-control::placeholder {
    font-style: italic;
}

.submit-courses-button {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    width: 100%;
}

.submit-courses-button .btn.btn-primary {
    font-size: 20px;
}
.courses-list {
    display: flex;
    flex-direction: column;
    column-gap: .5em;
}

.courses-form-field .form-control {
    width: 20em;
    max-width: 80vw !important;
    height: 1.5em;
}

.courses-error-message-container {
    display: none;
    background-color: white;
    border-color: red;
}

.courses-error-message-container h5 {
    font-size: 26px;
}

.courses-error-message-container p {
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

.checklist-container {
    width: 20rem;
    max-width: 85vw;
}

</style>
<script>
    var coursesNamespace = {

        toggleVerificationModal: () => {
            $("#coursesVerificationModal").modal("toggle");
        },

        handleUniversityOnKeyUp: () => {
            const universitySelection = document.getElementById("courses-university-selection");
            let departmentSelection = document.getElementById("courses-department-selection");

            if (universitySelection.value === "") {
                departmentSelection.value = '';
                departmentSelection.disabled = true;
            } else {
                departmentSelection.disabled = false;
            }
        },

        getUniversityDepartments: universityInput => {

            let departmentSelection = document.getElementById("courses-department-selection");
            let departmentOptions = document.getElementById("coursesDepartmentOptions");

            if (universityInput.value === "") {
                departmentSelection.value = '';
                departmentSelection.disabled = true;
            } else {
                departmentSelection.disabled = false;
                departmentOptions.innerHTML = '';
                const universities = document.getElementById("coursesUniversityOptions").getElementsByTagName("option");

                for (const university of universities) {
                    if (university.value === universityInput.value) {
                        function storeDepartments(departments) {
                            for (const department of departments) {
                                console.log(department);
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
    }

    function submitApplicationCourses(event) {     
        event.preventDefault();
        coursesNamespace.toggleVerificationModal();
        
        const universitySelection = document.getElementById("courses-university-selection");
        const departmentSelection = document.getElementById("courses-department-selection");
        const selectedCourses = window.checkListComponent.state.items.map(item => item.content[0]);

        if (universitySelection.value === "" || departmentSelection.value === "") {
            document.getElementById('modal-body-msg').innerHTML = 'Εκρεμμεί η επιλογή ιδρύματος και τμήματος.';
            $('#errorMsgModal').modal("show");
        }
        else if (selectedCourses.length === 0) {
            document.getElementById('modal-body-msg').innerHTML = 'Εκρεμμεί η επιλογή μαθημάτων προς ανάθεση.';
            $('#errorMsgModal').modal("show");
        }
        else {
            $.ajax({
                type: "POST",
                url: "/submit_application_courses.php",
                dataType: "json",
                success: answer => {
                    //console.log(answer);
                    //window.alert();
                    document.forms["courses-submission-form"].submit();
                },
                error: answer => {
                    // Reject submission
                    document.getElementById('modal-body-msg').innerHTML = answer;
                    $('#errorMsgModal').modal("show");
                },
                data: {
                    "application_id" : window.applicationID,
                    "university": universitySelection.value,
                    "department": departmentSelection.value,
                    "courses": selectedCourses,
                    "comments": document.getElementById('admin-comments-textbox').value
                }
            });
        }
    }

    function hideModal() {
        $("#errorMsgModal").modal("toggle");
    }

    function addCourse() {
        let courseInput = document.getElementById('courses-input');
        if (courseInput.value !== "") {
            window.checkListComponent.addItem([courseInput.value]);
            courseInput.value = "";
        }
    }

</script>

<?php

function getCoursesVerificationModal() {
    return '
    <div class="modal fade" id="coursesVerificationModal" tabindex="-1" role="dialog" aria-labelledby="coursesVerificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="coursesVerificationModalLabel">Επιβεβαίωση</span>
                </div>
                <div id="courses-verify-modal-body-msg" class="modal-body">
                    Είστε βέβαιοι ότι θέλετε να αναθέσετε τα επιλεγμένα μαθήματα σε αυτή την αίτηση?
                </div>
                <div class="modal-footer verify-footer">
                    <button type="button" class="btn btn-secondary close-doc-btn cancel-reject" data-dismiss="modal" onclick="coursesNamespace.toggleVerificationModal()">
                        Ακύρωση
                    </button>
                    <button type="submit" class="btn btn-secondary close-doc-btn verify-reject" data-dismiss="modal" onclick="submitApplicationCourses(event)">
                        Συνέχεια
                    </button>
                </div>
            </div>
        </div>
    </div>
    ';
}

function getCourseUniversityOptions()
{
    return '
    <option id="course_uni_1" data-uni-id="1" value="ΕΚΠΑ">
    <option id="course_uni_2" data-uni-id="2" value="ΕΜΠ">
    <option id="course_uni_3" data-uni-id="3" value="ΟΠΑ">
    <option id="course_uni_4" data-uni-id="4" value="ΑΠΘ">
    <option id="course_uni_5" data-uni-id="5" value="Παν. Μακεδονίας">
    ';

    # getUniversities("gr")
}

function getApplicationCoursesForm()
{
    return '
    <div class="admin-courses-container">
        <span style="font-size: 21px">
            Eπιλέξτε ίδρυμα & τμήμα και εισάγετε τα απαιτούμενα μαθήματα από το επιλεγμένο τμήμα:
        </span>
        <form name="courses-submission-form" action="index.php?application_id=148&status=accepted" method="POST" onsubmit="submitApplicationCourses(event)">
            <div class="courses-form-contents">
                <div class="courses-form-field">
                    <label class="bold-label" for="courses-university-selection">Επιλέξτε Ίδρυμα:</label>
                    <input class="form-control" list="coursesUniversityOptions" id="courses-university-selection" placeholder="Επιλέξτε Ίδρυμα..."
                    onchange="coursesNamespace.getUniversityDepartments(this)" onkeyup="coursesNamespace.handleUniversityOnKeyUp()" autocomplete="off">
                    <span class="courses-form-extra-info">Μπορείτε επίσης να εισάγετε Ίδρυμα εκτός λίστας.</span>
                    <datalist id="coursesUniversityOptions">' .

                    getCourseUniversityOptions()
                    
                    . '
                    </datalist>
                </div>
                <div class="courses-form-field">
                    <label class="bold-label" for="courses-department-selection">Επιλέξτε Τμήμα:</label>
                    <input class="form-control" list="coursesDepartmentOptions" id="courses-department-selection" placeholder="Επιλέξτε Τμήμα..."
                    autocomplete="off" disabled>
                    <span class="courses-form-extra-info">Μπορείτε επίσης να εισάγετε Τμήμα εκτός λίστας.</span>
                    <datalist id="coursesDepartmentOptions">
                    </datalist>
                </div>
                <div style="display: flex; flex-direction: row; flex-wrap: wrap; column-gap: 1em; row-gap: .5em; align-items:flex-end;">                    
                    <div class="courses-form-field">
                        <span class="bold-label">Επιλέξτε Μάθημα:</span>
                        <input class="form-control" id="courses-input" placeholder="Επιλέξτε Μάθημα...">
                    </div>
                    <button type="button" onclick="addCourse()" style="font-size:20px; height: 2em;
                     padding: .25em 1em;" class="btn btn-primary">
                        Εισαγωγή
                    </button>
                </div>
                <span class="courses-form-extra-info">Παρακάτω μπορείτε να δείτε τα μαθήματα που έχετε επιλέξει για ανάθεση:</span>                
                <!-- Using React component -->
                <div id="checklist_container" class="checklist-container"></div>
                <div class="submit-courses-button">
                    <button class="btn btn-primary" type="button" onclick="coursesNamespace.toggleVerificationModal()">
                        Ανάθεση Μαθημάτων
                    </button>
                </div>
                '. getCoursesVerificationModal() .'
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="/js/checklist.js"></script>
    ';
}

function getSelectedCourses(array $courses) {
    $ret = '';
    foreach ($courses as $course) {
        $ret = $ret . '<li>'. $course . '</li>';
    }
    return $ret;
}

function getApplicationCoursesFrozen(string $university, string $department, array $courses)
{
    return '
    <div class="admin-courses-container">
        <span style="font-size: 21px">
            Εχουν ανατεθεί τα ακόλουθα μαθήματα για την πραγματοποίηση αντιστοίχισης:
        </span>
        <div class="courses-form-contents">
            <div class="courses-form-field">
                <span class="bold-label">Επιλεγμένο Ίδρυμα:</span>
                <span>' . $university . '</span>
            </div>
            <div class="courses-form-field">
                <span class="bold-label">Επιλεγμένο Τμήμα:</span>
                <span>' . $department . '</span>
            </div>
            <div class="courses-form-field">
                <span class="bold-label">Επιλεγμένα Μαθήματα:</span>
                <ul>'.
                getSelectedCourses($courses)
                .'</ul>
            </div>
        </div>
    </div>
    ';
}

?>
