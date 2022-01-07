<link rel="stylesheet" href="/public/css/index.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php" ?>
</div>

<!-- <div class="page-container fluid-container">
    <div class="parallax"></div>
</div> -->

</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>
