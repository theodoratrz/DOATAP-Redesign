<script>
	window.FontAwesomeConfig = {
		searchPseudoElements: true
	}
</script>

<link rel="stylesheet" href="css/sidebar.css">

<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
	<ul class="list-unstyled ps-0">
		<button class="btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
			Home
		</button>
		<div class="collapse show" id="home-collapse">
			<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="link-dark">Overview</a></li>
				<li><a href="#" class="link-dark">Updates</a></li>
				<li><a href="#" class="link-dark">Reports</a></li>
			</ul>
		</div>
		</li>
		<button class="btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
			Dashboard
		</button>
		<div class="collapse" id="dashboard-collapse">
			<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="link-dark">Overview</a></li>
				<li><a href="#" class="link-dark">Weekly</a></li>
				<li><a href="#" class="link-dark">Monthly</a></li>
				<li><a href="#" class="link-dark">Annually</a></li>
			</ul>
		</div>
		</li>
	</ul>
</div>
