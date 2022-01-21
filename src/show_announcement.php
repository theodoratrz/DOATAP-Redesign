<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/anouncements.css">

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

    <div class="gray-box">
          <a href="announcements.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Ανακοινωση</a>
            <div class="breadcrumb" style="align-items:end;">
              <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
              <li class="breadcrumb-item"><a href="announcements.php" style="text-decoration:none; font-size:15px;">Ανακοινώσεις</a></li>
              <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Ανακοίνωση</li>
            </div>
            
        </div>
        <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
        ?>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . "/api/announcements.php";
            $announcementID = $_GET["ann_id"];
            $announcement = getAnnouncement($announcementID);
            echo $announcement['content'];
            echo $announcementID;
            ?>
</div>
      </div>
    
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

