<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel="stylesheet" href="/css/user.css">

<body>
<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
        <a href="/index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Προφίλ</a>
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οι Πληροφορίες μου</li>
                </div>
        </div>
    <div class="page-content-container">
    
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            echoSidebar("/profile");
            ?>
                        <div class="table-wrapper" style="width:60%">
                            <form> 
                               
                              <div style="display:flex; flex-direction:column; justify-content:space-between;margin-bottom:1rem;">
                                <div class="row1">
                                    <h5><i class="fas fa-user-circle"></i> Το προφίλ μου </h5>
                                    <?php 
                                        if (isset($_SESSION['user_id'])) {
                                            $userID = $_SESSION['user_id'];
                                            if (isAdmin($userID)){
                                                echo '<h7 style="color:#002E69"><i class="fas fa-tools"></i> Διαχειριστής</h7>';
                                            }
                                        }
                                    ?>
                                    
                                    <hr>
                                </div>
                                
                                <div class="row2">
                                <?php 
                                    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";
                                    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/users.php";
                                    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

                                    $userInfo = getUserInfo($_SESSION['user_id']);

                                    echo '<script>window.userID = '. $_SESSION['user_id'] .'</script>';

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
                                    
                                    ob_start();
                                    echoProfileInfoForm($form_values, false);
                                    $val2 = ob_get_contents();
                                    ob_end_clean();
                                    echo $val2;
                                ?>
                                </div>
                                <script>
                                    const updateProfile = (event) => {
                                        const birthDay = document.getElementById('birthDate-day').value;
                                        const birthMonth = document.getElementById('birthDate-month').value;
                                        const birthYear = document.getElementById('birthDate-year').value;
                                        const updatedInfo = {
                                            'user_id': window.userID,
                                            'first_name': document.getElementById('fname').value,
                                            'last_name': document.getElementById('surname').value,
                                            'mothers_name': document.getElementById('mothersName').value,
                                            'fathers_name': document.getElementById('fathersName').value,
                                            'country': document.getElementById('country').value,
                                            'city': document.getElementById('city').value,
                                            'address': document.getElementById('address').value,
                                            'docType': document.getElementById('docSelection-0').checked ? "ID" : "passport",
                                            'docNumber': document.getElementById('docID').value,
                                            'birthday': `${birthYear}-${birthMonth}-${birthDay}`,
                                            'mobile': document.getElementById('mobilePhone').value,
                                            'phone': document.getElementById('homePhone').value
                                        }

                                        $.ajax({
                                            type: "POST",
                                            url: "/requests_api/edit_profile.php",
                                            dataType: "json",
                                            success: answer => {
                                                // Display success modal
                                            },
                                            error: answer => {
                                                // Reject submission
                                                document.getElementById('modal-body-msg').innerHTML = answer;
                                                $('#errorMsgModal').modal("show");
                                            },
                                            data: updatedInfo
                                        });
                                    }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="updateProfile(event)">
                                    <i class="fas fa-user-edit"></i> Αποθήκευση Αλλαγών
                                </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

<script>
    $("#exampleModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var app_id = button.data("app-id");
    var modal = $(this);

    $("#delete-button").click(function() {

      $.ajax({
        url: "/api/manage_application.php?" + $.param({
          app_id: app_id,
          operation: "delete"
        }),
        type: "GET",
      }).done(function(data) {
        window.location.href = "/applications/myapplications.php";
      })
    })
  });
</script>