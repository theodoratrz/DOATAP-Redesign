<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">

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
        <button id="delete-button" type="button" class="btn " style="background-color:red; color:white;">Διαγραφή</button>
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
        <button type="button" class="btn " style="background-color:blue; color:white;">Επαναφορά</button>
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
        <button id="final-submit-button" type="button" class="btn " style="background-color:#46b31e; color:white;">Υποβολή</button>
      </div>
    </div>
  </div>
</div>


<body>
  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>

    <?php
    if (isset($_GET['id'])) {
      $page_title = "Επεξεργασία Αίτησης";
    } else {
      $page_title = "Νέα Αίτηση";
    }
    ?>
    <div class="gray-box">
      <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;"> <?php echo $page_title ?></a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;"><?php echo $page_title ?></li>
      </div>
    </div>
    <div class="page-content-container" style="margin-bottom:2rem;">

      <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            echoSidebar("/profile/user_application_submission.php/");?>
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
              <button type="button" class="btn " style="background-color:red; color:white;">Διαγραφή</button>
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
              <button type="button" class="btn " style="background-color:blue; color:white;">Επαναφορά</button>
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
              <button id="final-submit-button" type="button" class="btn " style="background-color:#46b31e; color:white;">Υποβολή</button>
            </div>
          </div>
        </div>
      </div>

      <div style="display:flex; flex-direction:column; justify-content:center; row-gap:2rem;">
        <?php

        function redirect($url)
        {
          $string = '<script type="text/javascript">';
          $string .= 'window.location = "' . $url . '"';
          $string .= '</script>';

          echo $string;
        }


        require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_tabs.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/titlos_spoudon.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";

        require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

        $userInfo = getUserInfo($_SESSION['user_id']);
        $form_values = array(
          "uname" => $userInfo['username'],
          "email" => $userInfo['email'],

          "pwd" => "12345678",
          "pwd_dup" => "12345678",

          "fname" =>  $userInfo['first_name'],
          "surname" => $userInfo['last_name'],
          "fathersName" => $userInfo['fathers_name'],
          "mothersName" => $userInfo['mothers_name'],
          "birthDate" => date("d-m-Y", strtotime($userInfo['birthday'])),
          "gender" => ($userInfo['gender'] === "Male") ? "Άνδρας" : ($userInfo['gender'] === "Female" ? "Γυναίκα" : "Άλλο"),

          "country" => $userInfo['country'],
          "city" => $userInfo['city'],
          "address" => $userInfo['address'],

          "docSelection" => $userInfo['docType'] === "ID" ? "Ταυτότητα" : "Διαβατήριο",
          "docID" => $userInfo['docNumber'],

          "mobilePhone" => $userInfo['mobile'],
          "homePhone" => $userInfo['phone'],
        );

        $titlos_values = array(
          "ects" => "",
          "entryDate" => "",
          "graduationDate" => "",
          "attendance" => "",
          "partTime" => "",

          "country" => "",
          "universityAbroad" => "",
          "attendanceTime" => "",

          "mobilePhone" => "",
          "homePhone" => "",
        );

        $appInfo['state'] = "stored";

        if (isset($_GET['id'])) {
          $appID = $_GET['id'];
          $appInfo = getApplication($appID);

          if ($_SESSION['user_id'] != $appInfo['user_id']) {
            redirect("/myapplications.php");
            exit();
          }

          $titlos_values = array(
            "ects" => $appInfo['ECTS'],

            "entryDate" => "10-10-2000",
            "graduationDate" => "10-10-2000",
            "attendance" => $appInfo['attendance'] == 0 ? "Συμβατικός" : "Εξ Αποστάσεως",
            "partTime" => $appInfo['studiesType'] == 0 ? "Τακτική" : "Μερική",

            "country" => $appInfo['country'],
            "universityAbroad" => $appInfo['university'],
            "attendanceTime" => $appInfo['yearsOfStudy'],
          );

          $files1 = (getFiles($appID));

          foreach ($files1 as $file) {
            if (isset($file["type"])) {
              $files[$file["type"]] = $file;
            }
          }
        }

        ob_start();
        echo "<form id='titlos-form'>";
        if ($appInfo['state'] != "stored") echo '<fieldset disabled="disabled">';
        echoTitlosForm($titlos_values, true);
        if ($appInfo['state'] != "stored") echo '</fieldset>';
        echo "</form>";
        $val = ob_get_contents();
        ob_end_clean();

        ob_start();
        echo "<form id='profile-form'>";
        echo '<fieldset disabled="disabled">';
        echoProfileInfoForm($form_values, true);
        echo '</fieldset>';
        echo "</form>";
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
            <div class="table-wrapper" style="background-color:transparent">' .
              ($appInfo['state'] != "stored" ? '<fieldset disabled="disabled">' : '')
              . '<form id="file-form" method="POST" enctype="multipart/form-data">
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
                    <td>
                      <div class="upload-btn">
                        <input type="file" id="actual-btn-1" name="file-1" hidden />
                        <label for="actual-btn-1"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
                        <span id="file-chosen-1">' .
              ($files['id']['filename'] == '' ? 'Επιλέξτε Αρχείο' : $files['id']['filename']) .
              '</span>
                      </div>
                    </td>
          
                    <!-- Trigger/Open The Modal -->
                    <td>
                      <button type="button" id="del-1" class="btn fas fa-trash delete-form" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
                      </button>
                    </td>
                  </tr>
          
                  <tr>
                    <td>Αίτηση</td>
                    <td>
                      <div class="upload-btn">
                        <input type="file" id="actual-btn-2" name="file-2" hidden />
                        <label for="actual-btn-2"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
                        <span id="file-chosen-2">' .
              ($files['app']['filename'] == '' ? 'Επιλέξτε Αρχείο' : $files['app']['filename']) .
              '</span>
                      </div>
                    </td>
          
                    <!-- Trigger/Open The Modal -->
                    <td>
                      <button type="button" id="del-2" class="btn fas fa-trash delete-form" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
                      </button>
                    </td>
                  </tr>
          
                  <tr>
                    <td>Παράβολα</td>
                    <td>
                      <div class="upload-btn">
                        <input type="file" id="actual-btn-3" name="file-3" hidden />
                        <label for="actual-btn-3"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
                        <span id="file-chosen-3">' .
              ($files['par']['filename'] == '' ? 'Επιλέξτε Αρχείο' : $files['par']['filename']) .
              '</span>
                      </div>
                    </td>
          
                    <!-- Trigger/Open The Modal -->
                    <td>
                      <button type="button" id="del-3" class="btn fas fa-trash delete-form" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
                      </button>
                    </td>
          
                  </tr>
                </tbody>
              </table>
            </form>' .
              ($appInfo['state'] != "stored" ? '</fieldset>' : '')
              . '</div>'
          )
        );

        echoContentTabs($tab_sample_content, "user-tab-wrapper");
        ?>

        <?php

        if ($appInfo['state'] == "stored") {
          echo '
        <div class="page_btn">
          <button data-bs-toggle="modal" data-bs-target="#redoModal" id="submit-button-redo" class="btn btn-secondary m-2">
            <i class="fas fa-redo" aria-hidden="true"></i> Επαναφορά
          </button>
          <button data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit-button-temporary" class="btn btn-warning m-2">
            <i class="fas fa-lock-open-alt" aria-hidden="true"></i> Προσωρινή Αποθήκευση
          </button>
          <button data-bs-toggle="modal" data-bs-target="#beforeSubmitModal" id="submit-button" class="btn btn-success m-2">
            <i class="fas fa-lock-alt" aria-hidden="true"></i> Οριστική Υποβολή
          </button>
        </div>
        ';
        }

        if ($appInfo['state'] == "approved"){
        echo '
          <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#beforeSubmitModal" id="submit-button" style="font-size:medium; padding:0.5rem; margin-bottom:0rem;justify-content:center;">
          <i class="fas fa-download"></i> Λήψη Εντύπου Αναγνώρισης
          </button>
          ';
        }

        ?>


      </div>
    </div>

  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

  <script>
    // SUBMIT FORM

    function getFormData($form) {
      let unindexed_array = $form.serializeArray();
      let indexed_array = {};

      $.map(unindexed_array, function(n, i) {
        indexed_array[n['name']] = n['value'];
      });

      return indexed_array;
    }

    let savebtn = $("#submit-button-temporary");
    let submitbtn = $("#final-submit-button");

    savebtn.click(function() {
      submitForm('stored');
      $("#exampleModal").on("hidden.bs.modal", function() {
        window.location.href = "myapplications.php";
      })
    });

    submitbtn.click(function() {
      submitForm('submitted');
      window.location.href = "myapplications.php";
    });

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const app_id = urlParams.get('id')

    function submitForm(state) {

      let titleForm = getFormData($("#titlos-form"));

      let initFormData = {
        'app_id': app_id,
        'state': state,
        'attendance': titleForm['partTime'],
        'studiesType': titleForm['attendance'],
        'ECTS': titleForm['ects'],
        'country': titleForm['country'],
        'dateIntro': titleForm['entryDate-year'] + '-' + titleForm['entryDate-month'] + '-' + titleForm['entryDate-day'],
        'dateGrad': titleForm['graduationDate-year'] + '-' + titleForm['graduationDate-month'] + '-' + titleForm['graduationDate-day'],
        'yearsOfStudy': titleForm['attendanceTime'],
        'department': "",
        'university': titleForm['universityAbroad'],
        'file-id': filesUploaded[0],
        'file-app': filesUploaded[1],
        'file-par': filesUploaded[2]
      };

      let formData = new FormData();
      for (let k in initFormData) {
        formData.append(k, initFormData[k]);
      }

      $.ajax({
        url: "/api/manage_application.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
      }).done(function(data) {
        if (data != 'success') {
          // Display error
          alert(data);
        } else {
          // Do smth
        }
      })
    }
  </script>

  <script>
    // UPLOAD FILES

    let filesUploaded = Array();

    $("#del-1").hide();
    const actualBtn1 = document.getElementById('actual-btn-1');
    const fileChosen1 = document.getElementById('file-chosen-1');
    actualBtn1.addEventListener('change', function() {
      fileChosen1.textContent = this.files[0].name
      $("#del-1").show()
      filesUploaded[0] = this.files[0];
    })

    $("#del-2").hide();
    const actualBtn2 = document.getElementById('actual-btn-2');
    const fileChosen2 = document.getElementById('file-chosen-2');
    actualBtn2.addEventListener('change', function() {
      fileChosen2.textContent = this.files[0].name
      $("#del-2").show()
      filesUploaded[1] = this.files[0];
    })

    $("#del-3").hide();
    const actualBtn3 = document.getElementById('actual-btn-3');
    const fileChosen3 = document.getElementById('file-chosen-3');
    actualBtn3.addEventListener('change', function() {
      fileChosen3.textContent = this.files[0].name
      $("#del-3").show()
      filesUploaded[2] = this.files[0];
    })


    $("#deleteModal").on("show.bs.modal", function(event) {
      var button = $(event.relatedTarget);
      var form_num = button.attr('id').split("-")[1]
      var modal = $(this);

      // let form_name = form_num == 1 ? "id" :
      //                 form_num == 2 ? "app": "par";

      $("#delete-button").click(function() {
        $("actual-btn-" + form_num).val();
        $("#del-" + form_num).hide();
        $("#file-chosen-" + form_num).text("Επιλέξτε αρχείο");
        modal.modal('hide');
      })
    });


    function disableUploadButtons() {
      $(".upload-btn > label").hide();
    }
  </script>

  <?php

  if ($appInfo['state'] != "stored") {
    echo "<script>disableUploadButtons()</script>";
  }

  ?>

</body>