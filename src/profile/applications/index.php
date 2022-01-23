<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/grid.css">

<body>

  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

    <div class="gray-box">
      <a href="/profile/index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Διαχείριση Αιτήσεων</a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item"><a href="/profile/index.php" style="text-decoration:none;">Το Προφίλ μου</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Διαχείριση Αιτήσεων</li>
      </div>

    </div>

    <div class="menu">

      <a href="submitted_applications.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; text-decoration:none; color:inherit"> Αιτήσεις που έχουν Υποβληθεί</div>
        </h6>
      </a>

      <a href="pending_applications.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; text-decoration:none; color:inherit"> Αιτήσεις που είναι Εκκρεμείς</div>
        </h6>
      </a>

      <a href="approved_applications.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; color:inherit"> Αιτήσεις που έχουν Εγκριθεί</div>
        </h6>
      </a>

      <a href="declined_applications.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; color:inherit"> Αιτήσεις που έχουν Απορριφθεί</div>
        </h6>
      </a>

    </div>
  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>
</body>