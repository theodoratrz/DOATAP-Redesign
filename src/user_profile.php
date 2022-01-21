<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel="stylesheet" href="/css/user.css">

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
        <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Προφίλ</a>
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οι Πληροφορίες μου</li>
                </div>
        </div>
    <div class="page-content-container">
    
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            echoSidebar("/profile/prof/");
            ?>
                        <div class="table-wrapper">
                            <form> 
                               
                              <div style="display:flex; flex-direction:column; justify-content:space-between;margin-bottom:1rem;">
                                <div class="row1">
                                    <h5><i class="fas fa-user-circle"></i> Το προφίλ μου </h5>
                                    <hr>
                                </div>
                                <div class="row2">
                                <?php 
                                    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php";
                                    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/users.php";
                                    
                                    $name = getUserInfo($userID)['username'];
                                     $sample_form_values = array(
                                        "uname" => "",
                                        "email" => "",
                                        "pwd" => "",
                                        "pwd_dup" => "",
                                
                                        "fname" => array("getUserInfo($userID)['username']"),
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
                                    #echoProfileInfoForm(sample_form_values,true);
                                ?>
                                </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

