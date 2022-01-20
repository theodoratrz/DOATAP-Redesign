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
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Το Προφίλ μου</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Νέα Αίτηση</li>
                </div>
        </div>
    <div class="page-content-container" style="margin-bottom:2rem;">
          
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"?>
            <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Διαγραφή Δικαιολογητικού</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Είστε σίγουροι ότι θα θέλατε να διαγράψετε αυτό το δικαιολογητικό;
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                      <button type="button" class="btn " style="background-color:red; color:white;" >Διαγραφή</button>
                    </div>
                  </div>
                </div>
              </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Προσωρινή Αποθήκευση</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Η Αίτησή σας αποθηκεύτηκε επιτυχώς!
                </div>
              </div>
            </div>
          </div>    
          <div class="modal fade" id="redoModal" tabindex="-1" aria-labelledby="redoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="redoModalLabel">Επαναφορά</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Είστε σίγουροι ότι θα θέλατε να επαναφέρετε την αίτηση στην αρχική της κατάσταση;
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                  <button type="button" class="btn " style="background-color:blue; color:white;" >Επαναφορά</button>
                </div>
              </div>
            </div>
          </div>  
          <div class="modal fade" id="beforeSubmitModal" tabindex="-1" aria-labelledby="beforeSubmitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="beforeSubmitModalLabel">Οριστική Υποβολή</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Είστε σίγουροι ότι θα θέλατε να οριστικοποιήσετε την αίτησή σας;
                  Μετά την οριστικοποίηση η αίτηση δεν μπορεί να επεξεργαστεί.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                  <button type="button" class="btn " style="background-color:#46b31e; color:white;" >Υποβολή</button>
                </div>
              </div>
            </div>
          </div>  
          
        <div style="display:flex; flex-direction:column; justify-content:center; row-gap:2rem;">
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

                              <table class="table" style="text-align:left">
                              <thead>
                              <tr>
                                  <th scope="col">Δικαιολογητικό</th>
                                  <th scope="col">Αρχείο</th>
                                  <th scope="col"></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>Έγγραφο Ταυτοπροσωπίας</td>
                                  <th>
                                    <div class="upload-btn">
                                        <input type="file" id="actual-btn" hidden/>
                                        <label for="actual-btn"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
                                    </div>
                                  </th>
                                  
                                  <!-- Trigger/Open The Modal -->
                                  <td>
                                  <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
                                  </button>
                                  </td>
                              </tr>
                              
                              <tr>
                                  <td>Αίτηση</td>
                                  <th>
                                    <div class="upload-btn">
                                        <input type="file" id="actual-btn" hidden/>
                                        <label for="actual-btn"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
                                    </div>
                                  </th>
                                  
                                  <!-- Trigger/Open The Modal -->
                                  <td>
                                  <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
                                  </button>
                                  </td>
                              </tr>

                              <tr>
                                  <td>Παράβολα</td>
                                  <th>
                                    <div class="upload-btn">
                                        <input type="file" id="actual-btn" hidden/>
                                        <label for="actual-btn"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
                                    </div>
                                  </th>
                                  
                                  <!-- Trigger/Open The Modal -->
                                  <td>
                                  <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
                                  </button>
                                  </td>
                                
                              </tr>
                              </tbody>
                          </table>
                          </form>
                        
                      </div>
                      
                    '
                  )
              );
              
              echoContentTabs($tab_sample_content,"user-tab-wrapper");
          ?>
              <div class="page_btn">
                  <button data-bs-toggle="modal" data-bs-target="#redoModal" id="submit-button-redo" style="font-size:medium; color:black; background-color:#77B6EA; padding:0.5rem; margin-bottom:0rem;justify-content:center;">
                  <i class="fas fa-redo" aria-hidden="true" ></i>Επαναφορά
                  </button>
                  <button data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit-button-temporary" style="font-size:medium; color:black; background-color:orange; padding:0.5rem; margin-bottom:0rem;justify-content:center;">
                  <i class="fas fa-lock-open-alt" aria-hidden="true" ></i> Προσωρινή Αποθήκευση
                  </button>
                  <button data-bs-toggle="modal" data-bs-target="#beforeSubmitModal" id="submit-button" style="font-size:medium; 
                  color:black; background-color:#46b31e; padding:0.5rem; margin-bottom:0rem;justify-content:center;">
                  <i class="fas fa-lock-alt" aria-hidden="true" ></i> Οριστική Υποβολή
                  </button>
              </div>
        </div>
    </div>
    
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

<script>

var modalToggle = document.getElementById('beforeSubmitModal') // relatedTarget
myModal.show(modalToggle)


</script>
</body>
