<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php"; ?>
<style>
  .application-status {
    padding: 0rem;
    height: max-content;
    width: fit-content;
    font-size: medium;
    padding: 0.5rem;
    margin-bottom: 0rem;
    justify-content: center;
    font-weight: bold;
  }

  .application-status.status-stored {
    background-color: transparent;
    color: #ff5400;
  }

  .application-status.status-submit {
    background-color: transparent;
    color: #1b68ca;
    ;
  }

  .application-status.status-approved {
    background-color: transparent;
    color: #24801c;
  }

  .application-status.status-declined {
    background-color: transparent;
    color: red;
  }

  .application-status.status-pending {
    background-color: transparent;
    color: #ff5400;
  }

</style>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">

<body>
  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
    <div class="gray-box">
      <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;"> Οι Αιτήσεις μου</a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οι Αιτήσεις μου</li>
      </div>
    </div>
    <div class="page-content-container">

      <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
      echoSidebar("/profile/myapplications.php/");
      ?>

      
            
      </div>
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>
</body>

