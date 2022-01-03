<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/forms.css">

<?php require_once("../components/template.php"); ?>

<body>

<div class="page-container fluid-container">
    <?php require_once("../components/navbar.php"); ?>

    <nav class="below-navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container d-flex">
        Σύνδεση
        </div>
    </nav>
    <div class="login-container-wrapper">
        <div class="login-container">
                <div class="mb-3">
                    <i class="fas fa-user-circle"></i>
                    <label for="formGroupExampleInput" class="form-label">Όνομα Χρήστη</label>
                    <input type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="mb-3">
                    <i class="fas fa-key"></i>
                    <label for="formGroupExampleInput2" class="form-label">Κωδικός</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2">
                </div>
        </div>
    </div>
</div>
    <?php require_once("../components/footer.php"); ?>
</body>