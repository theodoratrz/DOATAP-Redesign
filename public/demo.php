<link rel="stylesheet" href="css/index.css">

<?php require_once("../components/template.php"); ?>

<body>

<div class="page-container fluid-container">
<?php require_once("../components/navbar.php"); ?>

<style>
.central-container {
    padding: 1rem;
    display: flex;
    flex-direction: row;
    column-gap: 2rem;
    row-gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
}

@media only screen and (max-width: 840px) {
    .central-container {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<div class="central-container">
    <?php require_once("../components/sidebar.php"); ?>

    <?php require_once("../components/content_accordion.php"); ?>

    <?php require_once("../components/profile-info.php"); ?>
</div>

<!-- <div class="page-container fluid-container">
    <div class="parallax"></div>
</div> -->

</div>

<?php require_once("../components/footer.php"); ?>

</body>
