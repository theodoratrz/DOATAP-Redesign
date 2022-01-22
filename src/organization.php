<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/grid.css">

<body>

  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

    <div class="gray-box">
      <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;"> Οργανισμός</a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οργανσιμός</li>
      </div>
    </div>
    <div class="menu">
      <a href="under_construction.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; text-decoration:none; color:inherit"> Ταυτότητα</div>
        </h6>
        <span style="text-align:center"> Πληροφορίες για τη διοίκηση του ΔΟΑΤΑΠ.</span>
      </a>
      <a href="under_construction.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; text-decoration:none; color:inherit"> Διοίκηση</div>
        </h6>
        <span style="text-align:center">Πληροφορίες το Διοικητικό Σύμβουλιο.</span>
      </a>
      <a href="under_construction.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; color:inherit"> Ετήσιος Απολογισμός Δ.Σ</div>
        </h6>
        <span style="text-align:center">Ενημερωθείτε για τον ετήσιο απολογισμό του οργανισμού.</span>
      </a>
      <a href="under_construction.php" class="icon-text">
        <h6>
          <div style="font-weight:bold; color:inherit"> Στατιστικά Στοιχεία</div>
        </h6>
        <span style="text-align:center">Στατιστικά Στοιχεία αναφορικά με την εξυπηρέτηση και τη διεκπεραίωση των αιτήσεων.</span>
      </a>
    </div>
  </div>

</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>