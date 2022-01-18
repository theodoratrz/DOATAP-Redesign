<style>

.admin-approve-container {
    display: flex;
    flex-direction: column;
    row-gap: 1em;
}

.bold-label {
    font-weight: bold;
}

form[name="match-approve-form"] .form-control::placeholder {
    font-style: italic;
}

</style>
<script>
    function getUniversityDepartments(universityInput) {

        let departmentSelection = document.getElementById("approve-department-selection");
        var departmentOptions = document.getElementById("departmentOptions");

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
                    })
                    break;
                }
            }
        }
    }
    
    function approveApplication(params) {
        
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

    # getUniversities("gr")
}

function getApplicationApproveForm()
{
    return '
    <div class="admin-approve-container">
        <span>
            Για την έγκριση της αίτησης, επιλέξτε ίδρυμα & τμήμα για αντιστοίχιση τίτλου σπουδών:
        </span>
        <form name="match-approve-form" onsubmit="approveApplication()">
            <label class="bold-label" for="approve-university-selection">Επιλέξτε Ίδρυμα:</label>
            <input class="form-control" list="universityOptions" id="approve-university-selection" placeholder="Επιλέξτε Ίδρυμα..."
            onchange="getUniversityDepartments(this)">
            <datalist id="universityOptions">' .

            getUniversityOptions()
            
            . '
            </datalist>

            <label class="bold-label" for="approve-department-selection">Επιλέξτε Τμήμα:</label>
            <input class="form-control" list="departmentOptions" id="approve-department-selection" placeholder="Επιλέξτε Τμήμα..." disabled>
            <datalist id="departmentOptions">
            </datalist>
        </form>
    </div>
    ';
}

?>
