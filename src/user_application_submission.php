<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">

<body>
<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Αιτήσεις</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Διαδικασία Υποβολής</li>
                </div>
        </div>
    <div class="page-content-container" style="margin-bottom:2rem;">
    
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"?>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs.php";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/titlos_spoudon.php";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";

            const sample_form_values = array(
                "uname" => "",
                "email" => "",
                "pwd" => "",
                "pwd_dup" => "",
        
                "fname" => "Κώστας",
                "surname" => "Χρήστου",
                "fathersName" => "Χρήστος",
                "mothersName" => "Μαρία",
                "birthDate" => "31-1-1999",
                "gender" => "Άνδρας",
        
                "country" => "",
                "city" => "",
                "address" => "",
        
                "docSelection" => "Ταυτότητα",
                "docID" => "14572",
        
                "mobilePhone" => "6969696969",
                "homePhone" => "2106969696",
            );
        
            const sample_titlos_values = array(
                "titlos" => "",
                "ects" => "",
                "uni" => "",
                "tei" => "",
        
                "fname" => "Κώστας",
                "surname" => "Χρήστου",
                "fathersName" => "Χρήστος",
                "mothersName" => "Μαρία",
                "entryDate" => "31-1-1999",
                "graduationDate" => "31-1-1999",
                "attendance" => "Άνδρας",
                "fullTime" => "Άνδρας",
        
                "country" => "",
                "universityAbroad" => "",
                "attendanceTime" => "",
        
                "docSelection" => "Ταυτότητα",
                "docID" => "14572",
        
                "mobilePhone" => "6969696969",
                "homePhone" => "2106969696",
            );
            ob_start();
            echoTitlosForm(sample_titlos_values,true);
            $val = ob_get_contents();
            ob_end_clean();

            ob_start();
            echoProfileInfoForm(sample_form_values,true);
            $val2 = ob_get_contents();
            ob_end_clean();

            $tab_sample_content = array(
                "<i class='fas fa-info-circle'></i><br> Προσωπικά Στοιχεία" => array(
                    "basic_info",
                    
                    $val2
                ),
                "<i class='fas fa-edit'></i> <br>Τίτλος Σπουδών" => array(
                    "selected_deps",
                 
                    $val
                ),
                "<i class='fas fa-pencil-alt'></i><br> Συνεκτίμηση Τίτλου" => array(
                    "course_choices",
                    $val
                ),
                "<i class='fas fa-cloud-upload-alt'></i> <br>Επισυναπτόμενα" => array(
                    "upload",
                    '
                    <div class="table-wrapper" style="background-color:transparent">
                        <form> 
                            <div class="table">
                                <div class="row" style="diplay:flex; flex-direction:row; justify-content:space-evenly;">
                                    <h6><i class="fas fa-info-circle"></i>Μεταφόρτωση Απαραίτητων Δικαιολογητικών </h6>
                                    
                                </div>
                            </div>

                            <table class="table" style="text-align:center">
                            <thead>
                            <tr>
                                <th scope="col">Δικαιολογητικό</th>
                                <th scope="col">Αρχείο</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>ΑΠΟΛΥΤΗΡΙΟ ΛΥΚΕΙΟΥ</td>
                                <th scope="row" style="color:#002e69ce;font-size:large;"><a href="#">apolitirio.pdf</a></th>
                                <td><a href="#" class="fas fa-trash" style="color:red; text-decoration:none;">
                                <div class="popup" data-trigger="hover" onclick="myFunction()">
                                <span class="popuptext"  id="myPopup">Popup text...</span>
                                </div> 
                                </a></td>
                            </tr>
                            
                            </tbody>
                        </table>
                        </form>

                    </div>
                    <div class="col-sm-6">
                    <div style="background-color:#269b65; width:max-content; padding:0rem; height:max-content; border-radius:5%;">
                        <button style="font-size:medium; color:white; padding:0.5rem; font-weight:500; margin-bottom:0rem;justify-content:center;" type="submit" name="submit" 
                        value="δικαιολογητικο" data-toggle="modal"  
                        data-target="#newApplication" class="btn btn-success" ><i class="fas fa-file-alt" aria-hidden="true" ></i> Προσθήκη Δικαιολογητικού</input>
                        </button>
                    </div></div>'
                )
            );
            
            echoContentTabs($tab_sample_content,"user-tab-wrapper");
        ?>
            
    </div>
    
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>
<script>
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>