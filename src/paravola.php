<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/navbar.css">
<link rel="stylesheet" href="/css/paravola.css">


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
            <a href="applications.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; margin-left:13rem; 
            margin-top:1.7rem;">Παράβολα</a>
        </div>
        <div class="page-content-container">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";

            #echoSidebar();
        ?>
        <div style="display:flex; flex-direction:row; justify-content:center;">
        <?php

            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

            const accordionContent = array(
                array(
                    "<b><div style='font-size:large;'>
                    Αναγνώριση «ισοτιμίας» ή «ισοτιμίας
                    και αντιστοιχίας» τίτλου σπουδών 
                        </div></b>",
                    "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                  <div class='columns'>
                    <ul class='price'>
                      <li class='header'>Βασικός Τίτλος</li>
                      <li class='grey'>230,40&#128</li>
                      <li>Τιμή Παραβόλου: 225&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 5,40&#128</li>
                    </ul>
                  </div>
                  <div class='columns'>
                    <ul class='price'>
                      <li class='header'>Μεταπτυχιακός Τίτλος</li>
                      <li class='grey'>229,32&#128</li>
                      <li>Τιμή Παραβόλου: 225&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 4,32&#128</li>
                    </ul>
                  </div>
                  <div class='columns'>
                    <ul class='price'>
                      <li class='header'>Διδακτορικό Δίπλωμα</li>
                      <li class='grey'>229,32&#128</li>
                      <li>Τιμή Παραβόλου: 225&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 4,32&#128</li>
                    </ul>
                  </div>
                  <div class='columns'>
                    <ul class='price'>
                      <li class='header'>Μεταπτυχιακός τίτλος και Διδακτορικό
                      δίπλωμα</li>
                      <li class='grey'>368,64&#128</li>
                      <li>Τιμή Παραβόλου: 360&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 8,64&#128</li>
                    </ul>
                  </div>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large;'>
                    Αναγνώριση
                    πτυχίου με συνεκτίμηση μεταπτυχιακού
                    τίτλου
                        </div></b>",
                    "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                  <div class='columns-one'>
                    <ul class='price'>
                      <li class='header'>Βασικός
                      και Μεταπτυχιακός τίτλος</li>
                      <li class='grey'>414,72&#128</li>
                      <li>Τιμή Παραβόλου: 405&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 9,72&#128</li>
                    </ul>
                  </div>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Επανεξέταση
αιτήματος αναγνώρισης τίτλου σπουδών
                        </div></b>",
                        "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                        <div class='columns-one'>
                          <ul class='price'>
                            <li class='header'>Επανεξέταση
                            αιτήματος αναγνώρισης τίτλου σπουδών</li>
                            <li class='grey'>230,40&#128</li>
                            <li>Τιμή Παραβόλου: 225&#128</li>
                            <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 5,40&#128</li>
                          </ul>
                        </div>
                          </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Καθορισμός
της αντιστοιχίας της βαθμολογικής
ή αξιολογικής κλίμακας των
αναγνωριζόμενων ως «ισότιμων» ή
«ισότιμων και αντίστοιχων» αλλοδαπών
τίτλων σπουδών με τη βαθμολογική ή
αξιολογική κλίμακα των ημεδαπών
τίτλων ή το χαρακτηρισμό των τίτλων
ως αδιαβάθμητων
                        </div></b>",
                        "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                        <div class='columns-one'>
                          <ul class='price'>
                            <li class='grey'>51,20&#128</li>
                            <li>Τιμή Παραβόλου: 50&#128</li>
                            <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 1,20&#128</li>
                          </ul>
                        </div>
                          </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Συμμετοχή
σε εξετάσεις οργανισμού, ανά
μάθημα εξέτασης
                        </div></b>",
                        "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                        <div class='columns-one'>
                          <ul class='price'>
                            <li class='grey'>148,48&#128</li>
                            <li>Τιμή Παραβόλου: 145&#128</li>
                            <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 3,48&#128</li>
                          </ul>
                        </div>
                          </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Χορήγηση
                    αποσπασμάτων πρακτικών συνεδριάσεων
                    Διοικητικού Συμβουλίου, ανά
                    απόσπασμα
                        </div></b>",
                        "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                        <div class='columns-one'>
                          <ul class='price'>
                            <li class='grey'>20,48&#128</li>
                            <li>Τιμή Παραβόλου: 20&#128</li>
                            <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 0,48&#128</li>
                          </ul>
                        </div>
                          </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Χορήγηση
                    ακριβών αντιγράφων εγγράφων που
                    έχει εκδώσει ο ΔΟΑΤΑΠ ή φυλάσσονται
                    στο αρχείο του, ανά
                    ακριβές αντίγραφο
                        </div></b>",
                        "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                        <div class='columns-one'>
                          <ul class='price'>
                            <li class='grey'>20,48&#128</li>
                            <li>Τιμή Παραβόλου: 20&#128</li>
                            <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 0,48&#128</li>
                          </ul>
                        </div>
                          </div>"
                ),
                array(
                    "<b><div style='font-size:large;'>
                    Παροχή
κάθε είδους πληροφορίας και βεβαίωσης
                        </div></b>",
                    "<div style='display: flex; flex-direction: row; column-gap:0.5em; justify-content:center;'>
                  <div class='columns-two'>
                    <ul class='price'>
                      <li class='header'>Αίτηση αναγνώρισης ομοταγούς
                      ιδρύματος</li>
                      <li class='grey'>1.024,00&#128</li>
                      <li>Τιμή Παραβόλου: 1.000&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 24,00&#128</li>
                    </ul>
                  </div>
                  <div class='columns-two'>
                    <ul class='price'>
                      <li class='header'>Αιτήσεις διάφορες,ανά
                      αίτηση</li>
                      <li class='grey'>20,48&#128</li>
                      <li>Τιμή Παραβόλου: 20&#128</li>
                      <li>Χαρτόσημο(2%) & ΟΓΑ ΧΑΡΤ(20%): 0,48&#128</li>
                    </ul>
                  </div>"
                )
            );
            echoAccordion(accordionContent, true);
        ?>
</div>
</div>
        </div>
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

