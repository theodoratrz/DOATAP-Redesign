<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/forms.css">

<body>
<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Αιτήσεις</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Διαδικασία Υποβολής</li>
                </div>
        </div>
    <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
            echoSidebar("/applications/apps/procedure-submission/");
        ?>
        <div class="fluid-container" style="width:30rem; margin-top:1%;">
        <h6 style="font-weight:bold">1. Σύνδεση ή Δημιουργία Λογαριασμού</h6>
        <!--hr style="color:blue; width:30%; height:0.5%; background-color:blue; margin=0px;"-->
        <p>Για τη δημιουργία και την υποβολή αιτήσεων στον ΔΟΑΤΑΠ απαιτείται η 
            <a href="register.php">Δημιουργία Λογαριασμού</a> στο doatap.gr. 
            Αν διαθέτετε ήδη λογαριασμό, πραγματοποιήστε
            <a href="login.php">Σύνδεση</a>.
        </p>

        <h6 style="font-weight:bold">2. Δημιουργία Νέας Αίτησης</h6>
        <!--hr style="color:blue; width:30%; height:0.5%; background-color:blue; margin=0px;"-->
        <p>Στην ενότητα Προφίλ > <span style="font-weight:bold">Νέα Αίτηση</span>
            μπορείτε να δημιοργήσετε μία νέα αίτηση. Μέσω του λογαριασμού σας έχετε τη
            δυνατότητα να αποθηκεύσετε προσωρινά την αίτησή σας, να την επεξεργαστείτε
            και να την υποβάλετε οριστικά όταν το επιθυμείτε.
        </p>

        <h6 style="font-weight:bold">3. Υποβολή Αίτησης</h6>
        <!--hr style="color:blue; width:30%; height:0.5%; background-color:blue; margin=0px;"-->
        <p>Πριν την Οριστική Υποβολή βεβαιωθείτε ότι όλα τα στοιχεία σας είναι
            σωστά συμπληρωμένα και τα αρχεία επιτυχώς ανεβασμένα.
            <br>
            <span style="font-weight:bold">Προσοχή:</span> Μετά την Οριστική
            Υποβολή δεν υπάρχει δυνατότητα αναίρεσης ή διαγραφής της αίτησης.
        </p>
    </div>
    </div>
</div>


</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>