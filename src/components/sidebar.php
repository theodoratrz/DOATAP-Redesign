<script>
	window.FontAwesomeConfig = {
		searchPseudoElements: true
	}
</script>

<link rel="stylesheet" href="/css/sidebar.css">

<?php
	 
	 $_sidebar_page_names_ = array(
		"announcements" => array(
			"?type=1" => "Γενικές Πληροφορίες",
			"?type=2" => "Αποφάσεις Δ.Σ",
			"?type=3" => "Προϋπολογισμοί-Προκηρύξεις",
			"?type=4" => "Εξετάσεις Ιατρικής",	
			"?type=5" => "Εξετάσεις Οδοντιατρικής",
		),
		"applications" => array(
			"procedure_submission.php" => "Διαδικασία Υποβολής",
			"applications_evaluation.php" => "Η Πορεία μίας Αίτησης",
			"applications_forms.php" => "Φόρμες Αιτήσεων",
			"paravola.php" => "Παράβολα"	
		)
	);

	if (isset($_SESSION['user_id'])) {
		$userID = $_SESSION['user_id'];
		
		if (isAdmin($userID)){
			$_sidebar_page_names_["profile"] = array(
				"index.php" => "Οι πληροφορίες μου",
				"applications" => "Διαχείριση Αιτήσεων",
				"under_construction.php" => "Διαχείριση Λογαριασμών Χρηστών"				
			);
		}
		else{			
			$_sidebar_page_names_["profile"] =  array(
				"index.php" => "Οι πληροφορίες μου",
				"new_application.php" => "Νέα Αίτηση",
				"applications/myapplications.php" => "Οι Αιτήσεις μου"				
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
		$isActive = ($subpage === $pathArray[1]) || ("/$pathArray[0]/$subpage" === "$path/index.php");
		echoSidebarItem("$value", "/$pathArray[0]/$subpage", $isActive);
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

?>
