<script>
	window.FontAwesomeConfig = {
		searchPseudoElements: true
	}
</script>

<link rel="stylesheet" href="/css/sidebar.css">

<?php

const _sidebar_page_names_ = array(
	"profile" => array(
		"" => "Οι πληροφορίες μου",
		"account" => array(
			"Ο Λογαριασμός μου",
			array(
				"details1" => "1",
				"details2" => "2"
			)				
		),
		"my_applications" => array(
			"Πρόσφατες Αιτήσεις",
			array(
				"declined" => "Απορρίφθηκαν",
				"accepted" => "Εγκρίθηκαν"
			)				
		)
	),
	"announcements" => array(
		"an1" => "Ανακοινώσεις1",
		"an2" => "Ανακοινώσεις2"
	),
	
	"applications.php" => 
	"Αιτήσεις",
	array(
		"procedure-submission.php" => "Διαδικασία Υποβολής",
		"applications-evaluation.php" => "Η Πορεία μίας Αίτησης",
		"applications-forms.php" => "Φόρμες Αιτήσεων",
		"paravola.php" => "Παράβολα"
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

echoSidebar("/profile/my_applications/accepted");

?>
