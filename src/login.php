<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel="stylesheet" href="/css/forms.css">

<body>

    <div class="page-container fluid-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
            <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; margin-left:13rem; margin-top:1.7rem;">Σύνδεση</a>
        </div>
        <div class="login-container-wrapper">
            <form action="/api/login.php" method="POST" class="login-container">
                <h3 style="text-align:center;">ΣΥΝΔΕΣΗ</h3>
                <hr>
                <h7 style="text-align:center;">Συμπληρώστε το όνομα χρήστη και τον κωδικό πρόσβασης</h7>
                <h7 style="text-align:center;"> για να συνδεθείτε στην πλατφόρματου ΔΟΑΤΑΠ.</h7>
                <br>
                <h7 style="text-align:center;">Εναλλακτικά μπορείτε να συνδεθείτε μέσω <a href="https://www1.gsis.gr/oauth2server/login.jsp"">TaxisNet</a></h7>
                <hr>
                <div id=" error-message">
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
        <div class="mb-3">
            <label>
                <input type="checkbox" class="form-check-input" name="remember">Remember me
            </label>
        </div>
        <button id="submit-button" class="btn btn-primary">Σύνδεση</button>
        <div class="dropdown-divider"></div>
        <a class="forgot-item" style="color:blue; text-decoration:double; font-size:medium; text-align:right" href="#">Ξεχάσατε τον κωδικό σας;</button>
            <a class="create-item" style="color:blue; text-decoration:underline; font-size:x-large; text-align:center" href="register.php">Δημιουργία Λογαριασμού</a>
            </form>
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
            if (data === true) {
                // Redirect to home
            } else {
                // display error message
                $("#error-message").text(data);
            }
        });
    });
</script>