<link rel="stylesheet" href="/public/css/anouncements.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
            <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem; margin-top:1.7rem;">Αιτήσεις</a>
        </div>
        <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
        ?>
        <div class="anouncements-box">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Ημερομηνία</th>
              <th scope="col">Τίτλος</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" style="color:#002e69ce;font-size:large;">01/01/2022</th>
              <td><a href="#">Jacob</a></td>
            </tr>
            <tr>
              <th scope="row" style="color:#002e69ce;font-size:large;">01/01/2022</th>
              <td><a href="#">Jacob</a></td>
            </tr>
            <tr>
              <th scope="row" style="color:#002e69ce;font-size:large;">01/01/2022</th>
              <td><a href="#">Jacob</a></td>
            </tr>
          </tbody>
        </table>
</div>
</div>
      </div>
    
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

