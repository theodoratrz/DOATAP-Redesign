<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>
<!-- purple x moss 2020 -->
<link rel="stylesheet" href="/css/error404.css">

<head>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

  <div class="mainbox" style="z-index:-2;">
    <div class="err">4</div>
    <div class='spin-container'>
      <i style="top:20%; right:1rem; left:1rem; z-index:-1;" class="far fa-question-circle fa-spin"></i>
    </div>
    <div class="err2">4</div>
    <div class="msg">Μήπως η σελίδα μετακόμισε; Διαγράφτηκε; Είναι σε καραντίνα; Ποτέ δεν υπήρξε;<p>Ας πάμε στην <a href="index.php">αρχική</a> και βλέπουμε.</p>
    </div>
  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>