<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel="stylesheet" href="/css/forms.css">

<body>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Προσωρινή Αποθήκευση</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Η εγγραφή σας ολοκληρώθηκε επιτυχώς!
                </div>
            </div>
            </div>
        </div>  
    <div class="page-container fluid-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
          <a href="/index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Σύνδεση</a>
            <div class="breadcrumb" style="align-items:end;">
              <li class="breadcrumb-item"><a href="/index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Σύνδεση</li>
            </div>
            
        </div>
        <div class="login-container-wrapper">
            <div class="login-container">
                <h3 style="text-align:center;">ΣΥΝΔΕΣΗ</h3>
                <hr>
                <h7 style="text-align:center;">Συμπληρώστε το όνομα χρήστη και τον κωδικό πρόσβασης</h7>
                <h7 style="text-align:center;"> για να συνδεθείτε στην πλατφόρματου ΔΟΑΤΑΠ.</h7>
                <br>
                <h7 style="text-align:center;">Εναλλακτικά μπορείτε να συνδεθείτε μέσω <a href="https://www1.gsis.gr/oauth2server/login.jsp"">TaxisNet</a></h7>
                <hr>
                <div id="error-message">
            </div>
            <div class="mb-3">
                <i class="fas fa-user-circle"></i>
                <label for="username-input" class="form-label">Όνομα Χρήστη</label>
                <input type="text" class="form-control" id="username-input" required>
            </div>
            <div class="mb-3">
                <i class="fas fa-key"></i>

                <label for="password-input" class="form-label">Κωδικός</label>
                <input type="password" class="form-control" id="password-input" required>

            </div>
            
            <button id="submit-button" class="btn btn-primary">Σύνδεση</button>
            <div class="dropdown-divider"></div>
                <a class="create-item" style="color:blue; text-decoration:underline; font-size:x-large; text-align:center" href="register.php">Δημιουργία Λογαριασμού</a>
        </div>
    </div>

    </div>

</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

<script>
    $("#submit-button").click(function() {
        let username = $('#username-input').val();
        let password = $('#password-input').val();
        $.post("/api/login.php", {
            username: username,
            password: password
        }).done(function(data) {
            console.log(data);
            if (data === 'login') {
                // Redirect to home
                window.location.replace('/');
            } else {
                // display error message
                $("#error-message").text(data);
            }
        });
    });
</script>