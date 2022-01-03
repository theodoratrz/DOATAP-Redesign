<script>
	window.FontAwesomeConfig = {
		searchPseudoElements: true
	}
</script>

<link rel="stylesheet" href="css/sidebar.css">

<?php

function echoSidebar(string $path)
{
	$pageNames = array(
		"profile" => array(
			"" => "Οι πληροφορίες μου",
			"account" => "Ο Λογαριασμός μου",
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
		)
	);

	$mainPath = $path;
	$pathArray = explode("/", $mainPath);

	echo "
	<div class='flex-shrink-0 p-3 bg-white' style='width: 15rem;'>
	<ul class='list-group ps-0'>
	";

	foreach ($pageNames[$pathArray[0]] as $subpage => $value) {
		$type = gettype($value);
		if ($type == 'string' || $subpage != $pathArray[1]) {

			echoSidebarItem("$value", "$pathArray[0]/$subpage", false);

		} else if ($type == 'array') {
			if (count($pathArray) > 2) {
				echoSidebarSubmenu($subpage, $value[0], $value[1], $pathArray[2]);
			} else {
				echoSidebarSubmenu($subpage, $value[0], $value[1], "");
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

function echoSidebarSubmenu(string $topPage, string $topPageTitle, array $subpages, string $selectedSubpage)
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
			/* echo "
			<li><a href='$topPage/$page' class='sidebar-subitem' active='true'>
				$pageTitle
				<div class='sidebar-active-arrow'>
					<i class='fas fa-chevron-right fa-xs'></i>
				</div>
			</a></li>
			"; */
			echoSidebarItem($pageTitle, "$topPage/$page", true);
		} else {
			# echo "<li><a href='$topPage/$page' class='sidebar-subitem' active='false'>$pageTitle</a></li>";
			echoSidebarItem($pageTitle, "$topPage/$page", false);
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

echoSidebar("profile/my_applications/declined");

?>

<!-- <div class="flex-shrink-0 p-3 bg-white" style="width: 15rem;">
	<ul class="list-group ps-0">
		<a href="#" class="sidebar-subitem" active="true">
			Updates
			<div class="sidebar-active-arrow">
				<i class="fas fa-chevron-right fa-xs"></i>
			</div>
		</a>
		<button class="btn-toggle align-items-center collapsed " data-bs-target="#home-collapse" aria-expanded="true">
			Home
			<div class="sidebar-active-arrow">
				<i class="fas fa-chevron-right fa-xs"></i>
			</div>
		</button>
		<div class="collapse show" id="home-collapse">
			<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="sidebar-subitem" active="true">
					Overview
					<div class="sidebar-active-arrow">
						<i class="fas fa-chevron-right fa-xs"></i>
					</div>
				</a></li>
				<li><a href="#" class="sidebar-subitem" active="false">Updates</a></li>
				<li><a href="#" class="sidebar-subitem" active="false">Reports</a></li>
			</ul>
		</div>
		<a href="#" class="sidebar-subitem" active="false">Updates</a>
	</ul>
</div> -->
