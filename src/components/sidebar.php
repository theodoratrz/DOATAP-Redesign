<script>
	window.FontAwesomeConfig = {
		searchPseudoElements: true
	}
</script>

<link rel="stylesheet" href="/css/sidebar.css">

<?php
	 
	$_sidebar_page_names_ = array(
	"announcements" => array(
		array(
			"Ανακοινώσεις",
			array(
				"under_construction1.php" => "Γενικές Πληροφορίες",
				"under_construction2.php" => "Αποφάσεις Δ.Σ",
				"under_construction3.php" => "Προϋπολογισμοί-Προκηρύξεις",
				"under_construction4.php" => "Εξετάσεις Ιατρικής",	
				"under_construction5.php" => "Εξετάσεις Οδοντιατρικής",
			)
		),				
	),
	
		"applications" => array(
			"apps" => array(
				"Αιτήσεις",
				array(
					"procedure-submission.php" => "Διαδικασία Υποβολής",
					"applications-evaluation.php" => "Η Πορεία μίας Αίτησης",
					"applications-forms.php" => "Φόρμες Αιτήσεων",
					"paravola.php" => "Παράβολα"
				)	
			)		
		)
	);

	if (isset($_SESSION['user_id'])) {
		$userID = $_SESSION['user_id'];
		
		if (isAdmin($userID)){
			$_sidebar_page_names_["profile"] =  array(
				"user_profile.php" => "Οι πληροφορίες μου",
				"application_handling" => array(
					"Διαχείριση Αιτήσεων",
					array(
						"submitted_applications.php" => "Υποβλήθηκαν",
						"pending_applications.php" => "Σε εκκρεμότητα",
						"accepted_applications.php" => "Εγκρίθηκαν",
						"rejected_applications.php" => "Απορρίφθηκαν"
					)
				),
				"under_construction.php" => "Διαχείριση Λογαριασμών Χρηστών"				
			);
		}
		else{
			
			$_sidebar_page_names_["profile"] =  array(
				"user_profile.php" => "Οι πληροφορίες μου",
				"user_application_submission.php" => "Νέα Αίτηση",
				"myapplications.php" => "Οι Αιτήσεις μου"				
			);
		}
	}
function echoSidebar(string $path)
{
	global $_sidebar_page_names_;
	$pathArray = array_values(array_diff(explode("/", $path), [""]));

	echo "
	<div class='flex-shrink-0 bg-white' style='width: auto; padding: 0%'>
	<ul class='list-group ps-0'>
	";

	foreach ($_sidebar_page_names_[$pathArray[0]] as $subpage => $value) {
		$type = gettype($value);
		if ($type == 'string') {

			echoSidebarItem("$value", "$pathArray[0]/$subpage", $subpage == $pathArray[1]);

		} else if ($type == 'array') {
			if ($subpage != $pathArray[1]) {
				echoSidebarItem($value[0], "$pathArray[0]/$subpage", false);
			} else {
				if (count($pathArray) > 2) {
					echoSidebarSubmenu($subpage, $value[0], $value[1], $pathArray[2], $pathArray[0]);
				} else {
					echoSidebarSubmenu($subpage, $value[0], $value[1], "", $pathArray[0]);
				}
			}
			
		} else {
			die("Unexpected error while building sidebar in subpage '$subpage'.");
		}
	}

	echo "
	</ul>
	</div>
	";
}

function echoSidebarSubmenu(string $topPage, string $topPageTitle, array $subpages, string $selectedSubpage, string $rootPage)
{
	echo "
	<a href='$rootPage/$topPage' class='btn-toggle align-items-center collapsed' aria-expanded='true' style='text-decoration: none;'>
		$topPageTitle
		<div class='sidebar-active-arrow'>
			<i class='fas fa-chevron-right fa-xs'></i>
		</div>
	</a>
	";
	echo "
	<div class='collapse show' id='$topPage-collapse'>
	<ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small'>
	";
	foreach ($subpages as $page => $pageTitle) {
		if ($page == $selectedSubpage) {
			echoSidebarItem($pageTitle, "$rootPage/$topPage/$page", true);
		} else {
			echoSidebarItem($pageTitle, "$rootPage/$topPage/$page", false);
		}
	}
	echo "
	</ul>
	</div>
	";
}

function echoSidebarItem(string $pageTitle, string $href, bool $active)
{
	echo "
	<a href='$href' class='sidebar-subitem' active='". ($active ? 'true' : 'false') . "'>
	$pageTitle";

	if ($active) {
		echo "
		<div class='sidebar-active-arrow'>
			<i class='fas fa-chevron-right fa-xs'></i>
		</div>
		";
	}
	echo "
	</a>
	";
}

#echoSidebar("/profile/my_applications/accepted");

?>
