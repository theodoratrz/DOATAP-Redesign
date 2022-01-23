<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/content_accordion.css">

<body>
<div class="page-container fluid-container">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
    
<div class="background-image">
<div class="container_photo" >
  <!--img src="/images/im.png" alt="Snow" style="width:100%; opacity:0.5"-->
    <div class="card" style="width: 18rem;">
        <img src="/images/statistics.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Δελτίο Τύπου – Συνοπτικός απολογισμός έτους 2021</h5>
            <p class="card-text">Στα πλαίσια της αρχής της διαφάνειας και του σεβασμού του πολίτη, 
                ανακοινώνονται συνοπτικά στοιχεία απολογισμού του έτους 2021</p>
            <a href="#" class="btn btn-primary fas fa-book-open" style="font-weight:normal;">Διαβάστε Περισσότερα</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="/images/exams.png" class="card-img-top" style="height:11.6rem;">
        <div class="card-body">
            <h5 class="card-title">Αποτελέσματα Εξετάσεων Οδοντιατρικής — Ιανουάριος 2022</h5>
            <p class="card-text">Ενημερωθείτε για τα αποτελέσματα της έκτακτης εξεταστικής περιόδου.</p>
            <a href="#" class="btn btn-primary fas fa-book-open" style="font-weight:normal;">Διαβάστε Περισσότερα</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="/images/menoymeasfaleis.png" class="card-img-top" style="height:11.6rem;">
        <div class="card-body">
            <h5 class="card-title">Επίσκεψη στον ΔΟΑΤΑΠ</h5>
            <p class="card-text">
            Όλα όσα πρέπει να ξέρετε για τη διαδικασία προσέλευσης κοινού στον οργανισμό.</p>
            <a href="#" class="btn btn-primary fas fa-book-open" style="font-weight:normal; margin-bottom:0.5rem;">Διαβάστε Περισσότερα</a>
        </div>
    </div>
    <div>


    </div>

</div> 
</div>
<div class="text-box">
<h5 style="font-weight: bold">Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλου Ακαδημαϊκών και Πληροφόρησης</h5>
    <span>
      Ο ΔΟΑΤΑΠ έχει ως βασικές αποστολές:
      <ul>
        <li>Tην αναγνώριση τίτλων σπουδών από ιδρύματα της αλλοδαπής</li>
        <li>Tην παροχή πληροφοριών σχετικά με σπουδές στην ανώτατη εκπαίδευση στην ημεδαπή και την αλλοδαπή.</li>
      </ul>
    </span>
</div>
<div class="menu-icons">
    <div class="icon-text">
      <h6><a href="applications/applications_forms.php" class="fas fa-file-alt" style="text-decoration:none; color:inherit"> Χρήσιμα Έγγραφα</a></h6>
      <span> Βρείτε χρήσιμα έγγραφα και αιτήσεις που θα χρειαστεί να συμπληρώσετε, ταξινομημένα και σε ηλεκτρονική μορφή.</span>
    </div>
    <div class="icon-text">
      <h6><a href="applications/procedure_submission.php" class="fas fa-pen-alt" style="text-decoration:none; color:inherit"> Νέα Αίτηση</a></h6>
      <span>Βρείτε όλα όσα χρειάζονται για να φτιάξετε μία νέα αίτηση.</span>
    </div>

    <div class="icon-text">
      <h6><a href="profile/applications/myapplications.php" class="fas fa-bell" style="text-decoration:none; color:inherit"> Παρακολούθηση Αίτησης</a></h6>
      <span>Παρακολουθήστε την κατάσταση όλων των αιτήσεων σας.</span>
    </div>
    <div class="icon-text">
        <h6><a href="/organization" class="fas fa-book" style="text-decoration:none; color:inherit"> Ο ΔΟΑΤΑΠ</a></h6>
        <span>Ενημερωθείτε για όλες τις δράσεις του οργανισμού.</span>
    </div>
</div>
<h5 style="text-align:center">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</h5><hr style=" margin-left:4rem; margin-right:4rem; text-align:center; ">

<div class="qa">
<?php

            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";

            const accordionContent = array(
                array(
                    "<b><div style='font-size:large'>
                    Τι δικαιολογητικά χρειάζονται για να αναγνωρίσω 
                    το Βασικό πτυχίο μου / το Μεταπτυχιακό μου / το Διδακτορικό μου;
                        </div></b>",
                    "<div style='display: flex; flex-direction: row; column-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Τα απαιτούμενα δικαιολογητικά για την αναγνώριση 
                        τίτλου σπουδών της αλλοδαπής αναφέρονται στην πλατφόρμα eDoatap, 
                        μέσω της οποίας υποβάλλονται και οι αιτήσεις αναγνώρισης τίτλων σπουδών.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Σπούδασα ένα χρόνο στο πρώτο πανεπιστήμιο και μετά έκανα μετεγγραφή στο 2ο έτος 
                    στο δεύτερο πανεπιστήμιο. Χρειάζομαι δικαιολογητικά και από τα δύο πανεπιστήμια;
                    </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Δικαιολογητικά απαιτούνται από κάθε Ίδρυμα στο 
                        οποίο έχει πραγματοποιηθεί μέρος ή το σύνολο των σπουδών. Υπενθυμίζουμε σχετικά 
                        ότι ο Ν.3328/2005 για την διαδικασία αναγνώρισης προβλέπει ότι το ήμισυ τουλάχιστον
                         των σπουδών ή σε περίπτωση που η διάρκεια των σπουδών είναι πενταετής τα δύο 
                         τουλάχιστον έτη,  θα πρέπει να έχει πραγματοποιηθεί στο Ίδρυμα που απένειμε τον τίτλο.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Δεν μπορώ να παραλάβω ο ίδιος την πράξη αναγνώρισης μου. 
                    Μπορεί να την παραλάβει κάποιος άλλο πρόσωπο για μένα και με ποιον τρόπο; 
                        </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Παραλαβή της πράξης αναγνώρισης 
                        (ή άλλου σχετικού εγγράφου) πραγματοποιείται από άλλο πρόσωπο με την 
                        επίδειξη σχετικής εξουσιοδότησης.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large;'>
                    Αναγνωρίζεται τίτλος πανεπιστημίου της αλλοδαπής μετά από σπουδές 
                    σε συνεργαζόμενο κολλέγιο/παράρτημα αυτού του πανεπιστημίου στην Ελλάδα;
                    </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>Σύμφωνα με τον ιδρυτικό νόμο 3328/2005, 
                        άρθρο 4, παρ. β, όλες οι σπουδές πρέπει να έχουν πραγματοποιηθεί αποκλειστικά 
                        σε ομοταγή εκπαιδευτικά ιδρύματα της αλλοδαπής. Πτυχία που απονέμονται μετά από
                         πραγματοποίηση σπουδών ή μέρους σπουδών σε παράρτημα εκπαιδευτικού ιδρύματος της 
                         ής στην Ελλάδα δεν αναγνωρίζονται ακαδημαϊκά, καθώς η αναγνώρισή τους δεν είναι 
                         σύμφωνη με τις διατάξεις του άρθρου 16 του Συντάγματος. Για τους τίτλους αυτούς 
                         οι ενδιαφερόμενοι μπορούν να απευθύνονται στο Αυτοτελές Τμήμα Εφαρμογής της 
                         Ευρωπαϊκής Νομοθεσίας (ΑΤΕΕΝ) του ΥΠΑΙΘ, που εξετάζει αιτήσεις αναγνώρισης 
                         επαγγελματικών Προσόντων και αναγνώρισης επαγγελματικής ισοδυναμίας τίτλου 
                         τυπικής ανώτατης εκπαίδευσης.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Έχω την αναλυτική βαθμολογία μου και την βεβαίωση του τόπου σπουδών σε κλειστό φάκελο. 
                    Μπορώ να τα καταθέσω ο ίδιος;
                        </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>    Η κατάθεση δικαιολογητικών στον Οργανισμό μας που 
                        έχουν επιδοθεί στον ενδιαφερόμενο απευθείας από το Ίδρυμα που πραγματοποίησε τις 
                        σπουδές του σε κλειστό και επίσημα σφραγισμένο φάκελο είναι αποδεκτή.
                        Ωστόσο αν η αρμόδια εκτελεστική επιτροπή το κρίνει απαραίτητο μπορεί να ζητήσει 
                        εκ νέου την απευθείας αποστολή τους από το αντίστοιχο Ίδρυμα.
                        </span>
                    </div>"
                ),
                array(
                    "<b><div style='font-size:large'>
                    Με τα πτυχία ποιου Τμήματος Α.Ε.Ι. της ημεδαπής θα αντιστοιχηθεί ο τίτλος σπουδών μου 
                    από πανεπιστήμιο της αλλοδαπής; Θα δώσω μαθήματα;
                    </div></b>",
                    "<div style='display: flex; flex-direction: column; row-gap:0.5em;'>
                        <span style='font-size: 0.75em'>    Η επιλογή του τμήματος ελληνικού Α.Ε.Ι. προς τα πτυχία του 
                        του οποίου επιθυμεί ο πολίτης να αποδοθεί αντιστοιχία οφείλει να γίνεται κατά βάσιν με γνώμονα 
                        την σύγκριση των μαθημάτων του πτυχίου του με τα μαθήματα του τμήματος της ημεδαπής.
                        Συνιστούμε η σύγκριση αυτή να γίνεται από τον ενδιαφερόμενο και πριν από την έναρξη των σπουδών του.
                        Ο καθορισμός μαθημάτων στα οποία ο ενδιαφερόμενος θα οφείλει να εξετασθεί προκειμένου 
                        να του αποδοθεί «Ισοτιμία και Αντιστοιχία» καθώς και ο αριθμός τους κρίνεται από 
                        την αρμόδια εκτελεστική επιτροπή κατά περίπτωση.
                        </span>
                    </div>"
                )
            );
            echoAccordion(accordionContent, true);
        ?>
 </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>
</div>
</body>

