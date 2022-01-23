<link rel="stylesheet" href="/css/navbar.css">

<?php
$nav_links = array(
	"Αιτήσεις" => array(
		"/applications",
		array("Διαδικασία Υποβολής" => "/applications/procedure_submission.php",
		"Η Πορεία μίας Αίτησης" => "/applications/applications_evaluation.php",
		"Φόρμες Αιτήσεων" => "/applications/applications_forms.php",
		"Παράβολα" => "/applications/paravola.php")
	),
	"Ανακοινώσεις" => array(
	"/announcements",
	array("Γενικές Πληροφορίες" => "/announcements/?type=1",
	"Αποφάσεις Δ.Σ" => "/announcements/?type=2",
	"Προϋπολογισμοί-Προκηρύξεις" => "/announcements/?type=3",
	"Εξετάσεις Οδοντιατρικής" => "/announcements/?type=4",
	"Εξετάσεις Ιατρικής" => "/announcements/?type=5")
	),
	"Ενημέρωση" => array(
	"/under_construction.php",
	array("Ανώτατα Εκπαιδευτικά Ιδρύματα" => "/under_construction.php",
	"Εκπαιδευτικά Ιδρύματα Αλλοδαπής" => "/under_construction.php",
	"Το Ελληνικό Σύστημα Εκπαίδευσης" => "/under_construction.php",
	"Δι@υγεια" => "https://et.diavgeia.gov.gr/f/doatap")
	),
	"Οργανισμός" => array(
	"/organization",
	array("Ταυτότητα" => "/under_construction.php",
	"Διοίκηση" => "/under_construction.php",
	"Ετήσιος Απολογισμός ΔΣ" => "/under_construction.php",
	"Στατιστικά Στοιχεία" => "/under_construction.php")
	),
	"Επικοινωνία" => "/contact.php"

);

function echoNavbarMainItem(string $title, string $href)
{
	echo '
	<li class="custom-nav-item">
		<a class="custom-nav-link custom-nav-pills" aria-current="page" href="' . $href . '">' . $title . '</a>
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
			<li class="custom-nav-item dropdown custom-nav-pills ">
				<a class="custom-nav-link dropdown-toggle" href="' . $href . '" data-bs-auto-close="outside">' . $title . '</a>
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

<nav class="primary-custom-navbar custom-navbar-expand-lg bg-primary custom-navbar-dark">
	<div class="navbar-container d-flex">

	<a class="custom-navbar-brand" href="/index.php"> <img src="/images/doatap-logo.png" alt="logo" width="250px"> </a>

	<!-- LANGUAGE -->
		<!--a class="search_button"><i class="fas fa-globe-americas"></i></a>
		<select class="language_picker" data-width="fit">
		<option><span class="flag-icon flag-icon-gr"></span>Greek</option>
		<option><span class="flag-icon flag-icon-mx"></span>English</option>
		</select-->

		<!-- login--> 
		<?php

		require_once $_SERVER['DOCUMENT_ROOT'] . '/api/users.php';

		if (isset($_SESSION['user_id'])) {
			$userID = $_SESSION['user_id'];

			if (isAdmin($userID)) {
				echo '
				<div class="login-signup-navbar-container d-flex justify-content-end">
				<div class="dropdown">
					<a class="btn dropdown-toggle fas fa-user-circle " style="color:white; font-weight:100; font-size:20px; 
					padding:0rem; align-items:center;" href="/profile" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" 
					aria-expanded="false"> '
					. getUserInfo($userID)['username'] .
					'</a>

					<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<li><a class="dropdown-item" href="/profile">Το Προφίλ μου</a></li>
						<li><a class="dropdown-item" href="/profile/applications">Διαχείριση Αιτήσεων</a></li>
						<li><a class="dropdown-item" href="/under_construction.php">Διαχείριση Λογαριασμών Χρηστών</a></li>
					</ul>
				</div>
				<span style="color:white">|</span>
				<a href="/logout.php" class="login-link fas fa-sign-out-alt">Αποσύνδεση</a>
			 
			</div>';
			} else {
				echo '
				<div class="login-signup-navbar-container d-flex justify-content-end">
				<div class="dropdown">
					<a class="btn dropdown-toggle fas fa-user-circle " style="color:white; font-weight:100; font-size:20px; 
					padding:0rem; align-items:center;" href="/user_profile.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" 
					aria-expanded="false"> '
					. getUserInfo($userID)['username'] .
					'</a>

					<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<li><a class="dropdown-item" href="/profile">Το Προφίλ μου</a></li>
						<li><a class="dropdown-item" href="/profile/new_application.php">Νέα Αίτηση</a></li>
						<li><a class="dropdown-item" href="/profile/applications/myapplications.php">Οι Αιτήσεις μου</a></li>
					</ul>
				</div>
				<span style="color:white">|</span>
				<a href="/logout.php" class="login-link fas fa-sign-out-alt">Αποσύνδεση</a>
			 
			</div>';
			}
		} else {
			echo '
			<div class="login-signup-navbar-container d-flex justify-content-end">
				
				<a href="/login.php" class="login-link">Σύνδεση</a>
				<span style="color:white">|</span>
				<a href="/register.php" class="login-link">Εγγραφή</a>
			 
			</div>';
		}

	?>
	
	</div>
</nav>

<nav class="custom-navbar custom-navbar-expand-lg bg-primary custom-navbar-dark">
	<div class="container-fluid" style="flex-wrap: wrap; justify-content: center;">
	<ul class="custom-nav">
		
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
