<script>
	window.FontAwesomeConfig = {
		searchPseudoElements: true
	}
</script>

<link rel="stylesheet" href="/css/sidebar.css">

<?php

const _sidebar_page_names_ = array(
	"profile" => array(
		"prof" => "Οι πληροφορίες μου",
		"new" => "Νέα Αίτηση",
		"myapplications" => "Οι Αιτήσεις μου"
					
	),
	"announcements" => array(
		array(
			"Ανακοινώσεις",
			array(
		"generalInfo" => "Γενικές Πληροφορίες",
		"ds" => "Αποφάσεις Δ.Σ",
		"statistics" => "Προϋπολογισμοί-Προκηρύξεις",
		"medInfo" => "Εξετάσεις Ιατρικής",	
		"teethInfo" => "Εξετάσεις Οδοντιατρικής",
			)
		),				
	),
	
	"applications" => array(
		"apps" => array(
			"Αιτήσεις",
		array(
		"procedure-submission" => "Διαδικασία Υποβολής",
		"applications-evaluation" => "Η Πορεία μίας Αίτησης",
		"applications-forms" => "Φόρμες Αιτήσεων",
		"paravola" => "Παράβολα"
		)	
		)		
	)
	
	
);


function echoSidebar(string $path)
{
	$pathArray = array_values(array_diff(explode("/", $path), [""]));

	echo "
	<div class='flex-shrink-0 bg-white' style='width: auto; padding: 0%'>
	<ul class='list-group ps-0'>
	";

	foreach (_sidebar_page_names_[$pathArray[0]] as $subpage => $value) {
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
	<button class='btn-toggle align-items-center collapsed' data-bs-target='#$topPage-collapse' aria-expanded='true'>
		$topPageTitle
		<div class='sidebar-active-arrow'>
			<i class='fas fa-chevron-right fa-xs'></i>
		</div>
	</button>
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
