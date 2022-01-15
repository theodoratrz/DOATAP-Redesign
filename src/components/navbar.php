<link rel="stylesheet" href="/css/navbar.css">

<?php
$nav_links = array(
	"Αιτήσεις" => array(
		"applications.php",
		array("Διαδικασία Υποβολής" => "procedure_submission.php",
		/* "Η Πορεία μίας Αίτησης" => array(
		"Αξιολόγηση Αίτησης" => "applications-evaluation.php",
		"Χρόνοι Διεκπεραίωσης" => "cc.php",
		"Υπέρβαση Ουράς Προτεραιότητας" => "cc.php"
		), */
		"Η Πορεία μίας Αίτησης" => "application_trip.php",
		"Φόρμες Αιτήσεων" => "applications-forms.php",
		"Παράβολα" => "paravola.php")
	),
	"Ανακοινώσεις" => array(
	"anouncements.php",
	array("Γενικές Πληροφορίες" => "under_construction.php",
	"Αποφάσεις Δ.Σ" => "error404.php",
	"Προϋπολογισμοί-Προκηρύξεις" => "under_construction.php",
	"Εξετάσεις Οδοντιατρικής" => "under_construction.php",
	"Εξετάσεις Ιατρικής" => "under_construction.php")
	),
	"Ενημέρωση" => array(
	"demo.php",
	array("Ανώτατα Εκπαιδευτικά Ιδρύματα" => "under_construction.php",
	"Εκπαιδευτικά Ιδρύματα Αλλοδαπής" => "under_construction.php",
	"Το Ελληνικό Σύστημα Εκπαίδευσης" => "error404.php",
	"Δι@υγεια" => "https://et.diavgeia.gov.gr/f/doatap")
	),
	"Οργανισμός" => array(
	"organization.php",
	array("Ταυτότητα" => "error404.php",
	"Διοίκηση" => "error404.php",
	"Ετήσιος Απολογισμός ΔΣ" => "error404.php",
	"Στατιστικά Στοιχεία" => "error404.php")
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
				<a class="nav-link dropdown-toggle" href="' . $href . '" data-bs-auto-close="outside">' . $title . '</a>
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

	<a class="navbar-brand" href="index.php"> <img src="/images/doatap-logo.png" alt="" width="250px"> </a>

	<!-- LANGUAGE -->
		<!--a class="search_button"><i class="fas fa-globe-americas"></i></a>
		<select class="language_picker" data-width="fit">
		<option><span class="flag-icon flag-icon-gr"></span>Greek</option>
		<option><span class="flag-icon flag-icon-mx"></span>English</option>
		</select-->

		<!-- login--> 
		<?php

		require_once $_SERVER['DOCUMENT_ROOT'] . "/api/users.php";

		if (isset($_SESSION['user_id'])) {
			$userID = $_SESSION['user_id'];
			$username = getUsername($userID);
			if (isAdmin($userID)) {
				echo '<a class ="nav-item">
					ADMIN: ' . $username . '
				</a>';
			} else {
				echo '<a class ="nav-item">
					USER: ' . $username . '
				</a>';
			}
		} else {
			echo '
			<div class="login-signup-container d-flex justify-content-end">
				
				<a href="login.php" class="login-link">Σύνδεση</a>
				<span style="color:white">|</span>
				<a href="register.php" class="login-link">Εγγραφή</a>
			 
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
