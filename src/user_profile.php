<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel="stylesheet" href="/css/user.css">

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Το Προφίλ μου</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οι Αιτήσεις μου</li>
                </div>
        </div>
    <div class="page-content-container">
    
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"?>
                        <div class="table-wrapper">
                            <form> 
                               
                              <div style="display:flex; flex-direction:column; justify-content:space-between;margin-bottom:1rem;">
                                <div class="row1">
                                    <h5><i class="fas fa-user-circle"></i> Το προφίλ μου </h5>
                                    <hr>
                                </div>
                                <div class="row2">
                                        <div class="col-md-4">
                                            <div style="font-size:large">
                                                <label style="font-weight:bold;" class="col-sm-2">'Ονομα</label>
                                                <div class="col-sm-8">
                                                    <?php echo getUserInfo($userID)['username'] ; ?>
                                                </div>
                                            </div>
                                            <div style="font-size:large">
                                                <label style="font-weight:bold;" class="col-sm-2">'Ονομα</label>
                                                <div class="col-sm-8">
                                                    <?php echo getUserInfo($userID)['username'] ; ?>
                                                </div>
                                            </div>
                                        </div>   
                                </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

