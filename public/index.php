<link rel="stylesheet" href="css/index.css">

<?php require_once("../components/template.php"); ?>

<body>

<div class="page-container fluid-container">
<?php require_once("../components/navbar.php"); ?>

<style>
.temp-flex {
    padding: 1rem;
    display: flex;
    flex-direction: row;
    column-gap: 2rem;
    row-gap: 1rem;
    flex-wrap: nowrap;
    justify-content: center;
}

@media only screen and (max-width: 840px) {
    .temp-flex {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<div class="temp-flex">
    <?php require_once("../components/sidebar.php"); ?>

    <?php require_once("../components/content_accordion.php"); ?>

    <?php require_once("../components/profile-info.php"); ?>
</div>

</div>

<?php require_once("../components/footer.php"); ?>

</body>
