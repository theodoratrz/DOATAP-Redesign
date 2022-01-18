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
    const coursesNamespace = {
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
        },
    
        submitApplicationCourses: event => {
            event.preventDefault();
            const universitySelection = document.getElementById("courses-university-selection");
            const departmentSelection = document.getElementById("courses-department-selection");

            if (universitySelection.value === "" || departmentSelection.value === "") {
                let errorMsgElement = document.getElementById("courses-error-msg-container");
                document.getElementById('courses-error-message').innerHTML = 'Εκρεμμεί η επιλογή ιδρύματος και τμήματος.';
                errorMsgElement.style.display = 'block';
            } else {
                $.ajax({
                    type: "POST",
                    url: "/submit_application_courses.php",
                    dataType: "json",
                    success: answer => {
                        document.forms["courses-submission-form"].submit();
                    },
                    error: answer => {
                        // Reject submission
                        let errorMsgElement = document.getElementById("courses-error-msg-container");
                        document.getElementById('courses-error-message').innerHTML = answer;
                        errorMsgElement.style.display = 'block';
                        return false;
                    },
                    data: {
                        "university": universitySelection.value,
                        "department": departmentSelection.value
                    }
                });
            }
        },

        closeErrorMsg: () => {
            let errorMsgElement = document.getElementById("courses-error-msg-container");
            errorMsgElement.style.display = 'none';
            document.getElementById('courses-error-message').innerHTML = '';
        }
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

/* function getUniversityOptions()
{
    return '
    <option id="uni_1" data-uni-id="1" value="ΕΚΠΑ">
    <option id="uni_2" data-uni-id="2" value="ΕΜΠ">
    <option id="uni_3" data-uni-id="3" value="ΟΠΑ">
    <option id="uni_4" data-uni-id="4" value="ΑΠΘ">
    <option id="uni_5" data-uni-id="5" value="Παν. Μακεδονίας">
    ';

    # getUniversities("gr")
} */

function getApplicationCoursesForm()
{
    return '
    <div class="admin-courses-container">
        <div class="alert alert-danger courses-error-message-container" role="alert" id="courses-error-msg-container">
            <h5 class="alert-heading">Σφάλμα</h5>
            <p id="courses-error-message"></p>
            <hr>
            <button type="button" class="btn btn-secondary close-message-btn" onclick="coursesNamespace.closeErrorMsg()">
                Κλείσιμο
            </button>
        </div>
        <span style="font-size: 21px">
            Eπιλέξτε ίδρυμα & τμήμα και εισάγετε τα απαιτούμενα μαθήματα από το επιλεγμένο τμήμα:
        </span>
        <form name="courses-submission-form" action="index.php?application_id=148&status=accepted" method="POST" 
        onsubmit="coursesNamespace.submitApplicationCourses(event)">
            <div class="courses-form-contents">
                <div class="courses-form-field">
                    <label class="bold-label" for="courses-university-selection">Επιλέξτε Ίδρυμα:</label>
                    <input class="form-control" list="coursesUniversityOptions" id="courses-university-selection" placeholder="Επιλέξτε Ίδρυμα..."
                    onchange="coursesNamespace.getUniversityDepartments(this)" onkeyup="coursesNamespace.handleUniversityOnKeyUp()" autocomplete="off">
                    <span class="courses-form-extra-info">Μπορείτε επίσης να εισάγετε Ίδρυμα εκτός λίστας.</span>
                    <datalist id="coursesUniversityOptions">' .

                    getUniversityOptions()
                    
                    . '
                    </datalist>
                </div>
                <div class="courses-form-field">
                    <label class="bold-label" for="courses-department-selection">Επιλέξτε Τμήμα:</label>
                    <input class="form-control" list="departmentOptions" id="courses-department-selection" placeholder="Επιλέξτε Τμήμα..."
                    autocomplete="off" disabled>
                    <span class="courses-form-extra-info">Μπορείτε επίσης να εισάγετε Τμήμα εκτός λίστας.</span>
                    <datalist id="coursesDepartmentOptions">
                    </datalist>
                </div>
                <span class="courses-form-extra-info">Παρακάτω μπορείτε να εισάγετε μαθήματα για ανάθεση:</span>
                <div style="display: flex; flex-direction: row; flex-wrap: wrap; column-gap: 1em; row-gap: .5em; align-items:flex-end;">                    
                    <div class="courses-form-field">
                        <span class="bold-label" for="courses-input">Επιλέξτε Μάθημα:</span>
                        <input class="form-control" list="departmentOptions" id="courses-input" placeholder="Επιλέξτε Μάθημα...">
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
                    <button class="btn btn-primary" type="submit">Ανάθεση Μαθημάτων</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="/js/checklist.js"></script>
    ';
}

function getApplicationCoursesFrozenForm(string $university, string $department)
{
    return '
    <div class="admin-courses-container">
        <span style="font-size: 21px">
            Έχει επιλεγεί το ακόλουθο ίδρυμα & τμήμα για αντιστοίχιση τίτλου σπουδών:
        </span>
        <form name="courses-submission-form">
            <div class="courses-form-contents">
                <div class="courses-form-field">
                    <span class="bold-label">Επιλεγμένο Ίδρυμα:</span>
                    <span>' . $university . '</span>
                </div>
                <div class="courses-form-field">
                    <span class="bold-label">Επιλεγμένο Τμήμα:</span>
                    <span>' . $department . '</span>
                </div>
            </div>
        </form>
    </div>
    ';
}

?>
