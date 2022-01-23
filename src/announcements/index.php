<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/anouncements.css">

<body>

  <div class="page-container fluid-container">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

      <div class="gray-box">
          <a href="/index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Ανακοινώσεις
          </a>
          <div class="breadcrumb" style="align-items:end;">
            <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Ανακοινώσεις</li>
          </div>
      </div>
      <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            echoSidebar("/announcements/mostRecent");
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
              
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . "/api/announcements.php";
                $rows = getAnnouncements();
                foreach($rows as $announcement)
                {
                  echo '<tr><th scope="row" style="color:#002e69ce;font-size:large;">' .explode(" ",$announcement['time_uploaded'])[0]. '</th>
                  <td><a href="show_announcement.php?ann_id='.$announcement['ann_id'].'">'.$announcement['title'].'</a></td></tr>';
                }
                ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

