<link rel="stylesheet" href="/public/css/index.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php" ?>

    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/components/content_accordion.php";
        const content = array(
            array(
                "<b>header1</b>",
                "<div style='display: flex; flex-direction: row; column-gap:0.5em;'>
                    <span style='font-size: 0.75em'>Hi</span>
                    <i>Hi</i>
                    <b>Hi</b>
                </div>"
            ),
            array(
                "<i>header2</i>",
                "<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow."
            )
        );
        echoAccordion(content, true);
    ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/profile-info.php" ?>
</div>

<!-- <div class="page-container fluid-container">
    <div class="parallax"></div>
</div> -->

</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>
