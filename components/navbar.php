<link rel="stylesheet" href="css/navbar.css">

<?php
$nav_links = array(
  "Αιτήσεις" => array(
    "Διαδικασία Υποβολής" => "index.php",
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
  "Επικοινωνία" => "contact.php",
  "Σύνδεση" => "login.php"

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

    <a class="navbar-brand" href="#"> <img src="images/doatap-logo.png" alt="" width="250px"> </a>

    <div class="collapse navbar-collapse" id="navbar-content">
      <ul class="nav nav-pills nav-fill">

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
            if(strcmp($name,"Σύνδεση") == 0){
              break;
            }
            echo '
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="' . $href . '">' . $name . '</a>
            </li>
            ';
          }
        }

        if(isset(($_SESSION['user'])) && ($_SESSION['user']) == true){
          if($_SESSION['role'] == 'admin'){
            echo '<li class ="nav-item">
            </li>';
          }else{
            echo '<li class ="nav-item">
            </li>';
          }
        }else{
          echo '<li class="nav-item=">
          <a class="nav-link login-icons" aria-current="page" href="' . $href . '">' . $name . '<i class="fas fa-sign-in-alt"></i></a>
          </li>';
          
        }
        
        ?>

      </ul>
    </div>

    <div class="navbar_language">
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
</nav>

<script>
  document.addEventListener('click', function(e) {
    // Hamburger menu
    if (e.target.classList.contains('hamburger-toggle')) {
      e.target.children[0].classList.toggle('active');
    }
  })
</script>