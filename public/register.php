<link rel="stylesheet" href="/public/css/index.css">
<link rel="stylesheet" href="/public/css/navbar.css">
<link rel="stylesheet" href="/public/css/forms.css">


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

    <div class="page-container fluid-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
                <a href="index.php" class="fas fa-arrow-circle-left"  style="text-decoration:none; color:#002E69; cursor:pointer; margin-left:13rem; margin-top:1.7rem;">Εγγραφή</a>
            </div>
            <div class="login-container-wrapper">
                <div class="login-container">
                    <h3 style="text-align:center">Δημιουργία Λογαριασμού</h3>
                    <hr>
                    <h7 style="text-align:center;">Συμπληρώστε τα στοιχεία σας ώστε να αποκτήσετε πρόσβαση</h7>
                    <br>
                    <h7 style="text-align:center;">σε όλες τις δυνατότητες της πλατφόρμας του ΔΟΑΤΑΠ.</h7>
                    <br>
                    <h7 style="text-align:center;"><b>Όλα τα πεδία είναι υποχρεωτικά.</b></h7>
                   
                    <hr>

                    <!--label for="name"><b>ΟΝΟΜΑ</b></label>
                    <input type="text" placeholder="Όνομα" name="name" id="name" required>

                    <label for="last_name"><b>ΕΠΩΝΥΜΟ</b></label>
                    <input type="password" placeholder="Επώνυμο" name="last_name" id="last_name" required>

                    <label for="fathers_name"><b>ΠΑΤΡΩΝΥΜΟ</b></label>
                    <input type="text" placeholder="Πατρώνυμο" name="fathers_name" id="fathers_name" required>

                    <label for="mothers_name"><b>ΜΗΤΡΩΝΥΜΟ</b></label>
                    <input type="text" placeholder="Μητρώνυμο" name="mothers_name" id="mothers_name" required>

                    <label for="username"><b>ΟΝΟΜΑ ΧΡΗΣΤΗ</b></label>
                    <input type="text" placeholder="όνομα Χρήστη" name="username" id="username" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Email" name="email" id="email" required>

                    <label for="phone"><b>ΤΗΛΕΦΩΝΟ</b></label>
                    <input type="number" placeholder="Τηλέφωνο" name="phone" id="phone" required>

                    <label for="psw"><b>ΚΩΔΙΚΟΣ</b></label>
                    <input type="password" placeholder="Κωδικός" name="psw" id="psw" required>

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

                    <label for="id_type"><b>ΕΓΓΡΑΦΟ ΤΑΥΤΟΠΟΙΗΣΗΣ</b></label>
                    <input type="radio" id="id" name="id_type" value="ID">
                    <label for="id_type">ΤΑΥΤΟΤΗΤΑ</label><br>
                    <input type="radio" id="passport" name="id_type" value="PASSPORT">
                    <label for="passport">ΔΙΑΒΑΤΗΡΙΟ</label><br>

                    <label for="id_num"><b>ΑΡΙΘΜΟΣ ΕΓΓΡΑΦΟΥ</b></label>
                    <input type="number" placeholder="Αριθμός Εγγράφου" name="id_num" id="id_num" required>
                    <hr-->
                    <?php
                     require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php"

                    ?>
                    <p>By creating an account you agree to our <a href="terms.php" target="_blank">Οροι Χρήσης-Δήλωση Απορρήτου</a>.</p>
                    <button type="submit" class="registerbtn">Εγγραφή</button>
                    <p>Αν έχετε ήδη λογαριασμό <a href="login.php">Συνδεθείτε</a>.</p>
                </div>

</div> 
    </div>
        
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

