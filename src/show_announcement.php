<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/anouncements.css">

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

