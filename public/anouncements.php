<link rel="stylesheet" href="/public/css/applications.css">


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
            <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem; margin-top:1.7rem;">Αιτήσεις</a>
        </div>
    
        <div class="menu">
    <a href="procedure_submission.php" class="icon-text">
      <h6><div style="font-weight:bold; text-decoration:none; color:inherit"> Γενικές Πληροφορίες</div></h6>
      <span style="text-align:center"></span>
    </a>
    <a href="applications-evaluation.php"  class="icon-text">
      <h6><div style="font-weight:bold; text-decoration:none; color:inherit"> Αποφάσεις Δ.Σ</div></h6>
      <span style="text-align:center"></span>
    </a>
    <a href="paravola.php" class="icon-text">
        <h6><div style="font-weight:bold; color:inherit"> Προϋπολογισμοί-Προκηρύξεις</div></h6>
        <span style="text-align:center"></span>
    </a>
</div>
    <div class="menu">
    <a href="applications-forms.php"  class="icon-text">
      <h6><div style="font-weight:bold; color:inherit"> Εξετάσεις Ιατρικής</div></h6>
      <span style="text-align:center"></span>
    </a>
    <a href="paravola.php" class="icon-text">
        <h6><div style="font-weight:bold; color:inherit"> Εξετάσεις Οδοντιατρικής</div></h6>
        <span style="text-align:center"></span>
    </a>
</div>
</div>
    
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

