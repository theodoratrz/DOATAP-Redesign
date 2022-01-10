<link rel="stylesheet" href="/public/css/navbar.css">

<?php
$nav_links = array(
	"Αιτήσεις" => array(
		"demo.php",
		array("Διαδικασία Υποβολής" => "procedure_submission.php",
		"Η Πορεία μίας Αίτησης" => array(
		"Αξιολόγηση Αίτησης" => "applications-evaluation.php",
		"Χρόνοι Διεκπεραίωσης" => "cc.php",
		"Υπέρβαση Ουράς Προτεραιότητας" => "cc.php"
		),
		"Φόρμες Αιτήσεων" => "applications-forms.php",
		"Παράβολα" => "paravola.php")
	),
	"Ανακοινώσεις" => array(
	"demo.php",
	array("Γενικές Πληροφορίες" => "anouncements.php",
	"Αποφάσεις Δ.Σ" => "aa.php",
	"Προϋπολογισμοί-Προκηρύξεις" => "aa.php",
	"Εξετάσεις Οδοντιατρικής" => "aa.php",
	"Εξετάσεις Ιατρικής" => "aa.php")
	),
	"Ενημέρωση" => array(
	"demo.php",
	array("Ανώτατα Εκπαιδευτικά Ιδρύματα" => "aa.php",
	"Εκπαιδευτικά Ιδρύματα Αλλοδαπής" => "aa.php",
	"Το Ελληνικό Σύστημα Εκπαίδευσης" => "aa.php",
	"Δι@υγεια" => "aa.php")
	),
	"Οργανισμός" => array(
	"demo.php",
	array("Σύσταση του ΔΟΑΤΑΠ" => "aa.php",
	"Ετήσιος Απολογισμός ΔΣ" => "aa.php",
	"Στατιστικά Στοιχεία" => "aa.php")
	),
	"Επικοινωνία" => "contact.php"

);

function echoNavbarMainItem(string $title, string $href)
{
	echo '
	<li class="nav-item">
		<a class="nav-link nav-pills" aria-current="page" href="' . $href . '">' . $title . '</a>
	</li>';
}

function echoNavbarMenu(array $contents)
{
	echo '
	<ul class="dropdown-menu shadow">';
	foreach ($contents as $title => $value) {
		if (gettype($value) === "array") {
			echoNavbarSubmenu($title, '', $value);
		} else {
			$itemHref = $value;
			echoNavbarMenuItem($title, $itemHref);
		}
	}
	echo '
	</ul>';
}

function echoNavbarSubmenu(string $title, string $href, array $contents)
{
	echo '
	<li class="dropend">
		<a href="' . $href . '" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">' . $title . '</a>
		<ul class="dropdown-menu dropdown-submenu shadow">
	';

	foreach ($contents as $itemTitle => $itemHref) {
		echoNavbarMenuItem($itemTitle, $itemHref);
	}

	echo '
		</ul>
	</li>';
}

function echoNavbarMenuItem(string $title, string $href)
{
	echo '
	<li>
		<a class="dropdown-item" href="' . $href . '">' . $title . '</a>
	</li>
	';
}

function echoNavbarContent(array $content)
{
	foreach ($content as $title => $value) {
		if (gettype($value) === "array") {
			$href = $value[0];
			$subitems = $value[1];
			echo '
			<li class="nav-item dropdown nav-pills ">
				<a class="nav-link dropdown-toggle" href="' . $href . '" data-bs-toggle="dropdown" data-bs-auto-close="outside">' . $title . '</a>
			';
				echoNavbarMenu($subitems);
				echo '
			</li>';
		} else {
			$href = $value;
			echoNavbarMainItem($title, $href);
		}
	}
}

?>

<nav class="primary-navbar navbar-expand-lg bg-primary navbar-dark">
	<div class="container d-flex">

	<a class="navbar-brand" href="index.php"> <img src="/public/images/doatap-logo.png" alt="" width="250px"> </a>

	<!-- LANGUAGE -->
		<!--a class="search_button"><i class="fas fa-globe-americas"></i></a>
		<select class="language_picker" data-width="fit">
		<option><span class="flag-icon flag-icon-gr"></span>Greek</option>
		<option><span class="flag-icon flag-icon-mx"></span>English</option>
		</select-->

		<!-- login--> 
		<?php


		if (isset(($_SESSION['user'])) && ($_SESSION['user']) == true) {
			if ($_SESSION['role'] == 'admin') {
				echo '<li class ="nav-item">
				</li>';
			} else {
				echo '<li class ="nav-item">
				</li>';
			}
		} else {
			echo '
			<div class="login-signup-container d-flex justify-content-end">
				
				<a href="login.php" class="navbar-button nav-fill nav-pills">Σύνδεση</a>
				<span style="color:white">|</span>
				<a href="register.php" class="navbar-button nav-fill nav-pills">Εγγραφή</a>
			 
			</div>';
		}

	?>
	
	</div>
</nav>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
	<div class="container-fluid" style="flex-wrap: wrap; justify-content: center;">
	<ul class="nav">
		
		<?php
		echoNavbarContent($nav_links);
		?>

	</ul>
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
