<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/grid.css">

<body>

  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

    <div class="gray-box">
      <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Αιτήσεις</a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Αιτήσεις</li>
      </div>

    </div>

    <div class="menu">

      <a href="procedure_submission.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; text-decoration:none; color:inherit"> Διαδικασία Υποβολής</div>
        </h6>
        <span style="text-align:center"> Πληροφορίες για τη διαδικασία υποβολής των αιτήσεων, βήμα-βήμα.</span>
      </a>

      <a href="applications-evaluation.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; text-decoration:none; color:inherit"> Η Πορεία μίας Αίτησης</div>
        </h6>
        <span style="text-align:center">Πληροφορίες για την πορεία των αιτήσεων σας, αφού τις καταθέσετε.</span>
      </a>

      <a href="applications-forms.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; color:inherit"> Φόρμες Αιτήσεων</div>
        </h6>
        <span style="text-align:center">Πληροφορίες για όλες τις απαραίτητες αιτήσεις που θα χρειαστείτε.</span>
      </a>

      <a href="paravola.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; color:inherit"> Παράβολα</div>
        </h6>
        <span style="text-align:center">Πληροφορίες για τα παράβολα που οφείλετε να κατaβάλλετε.</span>
      </a>

    </div>
  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>
</body>