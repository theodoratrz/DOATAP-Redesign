<link rel="stylesheet" href="css/navbar.css">

<?php
$nav_links = array(
  "Αιτήσεις" => array(
    "Διαδικασία Υποβολής" => "aa.php",
    "Η Πορεία μίας Αίτησης" => array(
      "Αξιολόγηση Αίτησης" => "cc.php",
      "Χρόνοι Διεκπεραίωσης" => "cc.php",
      "Υπέρβαση Ουράς Προτεραιότητας" => "cc.php"
    ),
    "Φόρμες Αιτήσεων" => "bb.php"
  ),
  "Ανακοινώσεις" => array(
    "Γενικές Πληροφορίες" => "aa.php",
    "Αποφάσεις Δ.Σ" => "aa.php",
    "Προϋπολογισμοί-Προκηρύξεις" => "aa.php",
    "Εξετάσεις Οδοντιατρικής" => "aa.php",
    "Εξετάσεις Ιατρικής" => "aa.php"
  ),
  "Ενημέρωση" => array(
    "Ανώτατα Εκπαιδευτικά Ιδρύματα" => "aa.php",
    "Εκπαιδευτικά Ιδρύματα Αλλοδαπής" => "aa.php",
    "Το Ελληνικό Σύστημα Εκπαίδευσης" => "aa.php",
    "Δι@υγεια" => "aa.php"
  ),
  "Οργανισμός" => array(
    "Σύσταση του ΔΟΑΤΑΠ" => "aa.php",
    "Ετήσιος Απολογισμός ΔΣ" => "aa.php",
    "Στατιστικά Στοιχεία" => "aa.php"
  ),
  "Επικοινωνία" => "contact.php"

);

function echo_nav_array($arr)
{
  foreach ($arr as $name => $href) {
    if (gettype($href) === "array") {
      echo '
      <li class="dropend">
      <a href="' . $href . '" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">' . $name . '</a>
      <ul class="dropdown-menu dropdown-submenu shadow">
      ';

      echo_nav_array($href);

      echo '</ul></li>';
    } else {
      echo '
      <li><a class="dropdown-item" href="' . $href . '">' . $name . '</a></li>
      ';
    }
  }
}
?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="#"> <img src="images/doatap-logo.png" alt="" width="250px"><!--  <span class="badge bg-primary">Mega Menu</span> --> </a>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
      <div class="hamburger-toggle">
        <i class="fas fa-bars"></i> 
      </div>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">


        <!-- Dynamic Navbar -->
        <?php

        foreach ($nav_links as $name => $href) {
          if (gettype($href) === "array") {
            echo '
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="' . $href . '" data-bs-toggle="dropdown" data-bs-auto-close="outside">' . $name . '</a>
            <ul class="dropdown-menu shadow">
            ';

            echo_nav_array($href);

            echo '</ul></li>';
          } else {
            echo '
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="' . $href . '">' . $name . '</a>
            </li>
            ';
          }
        }

        ?>

      </ul>

      
      <div class="ms-auto">
        <!-- LANGUAGE -->
        <a class="search_button"><i class="fas fa-globe-americas"></i></a>
        <select class="language_picker" data-width="fit">
          <option><span class="flag-icon flag-icon-gr"></span>Greek</option>
          <option><span class="flag-icon flag-icon-mx"></span>English</option>
        </select>

        <!-- SEARCH -->
        <form class="navbar_search">
          <div class="input-group">
            <a class="search_button"><i class="fas fa-search"></i></a>
            <input class="search_form" type="search" placeholder="Αναζήτηση" aria-label="Search">
          </div>
        </form>

      </div>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('click', function(e) {
    // Hamburger menu
    if (e.target.classList.contains('hamburger-toggle')) {
      e.target.children[0].classList.toggle('active');
    }
  })
</script>