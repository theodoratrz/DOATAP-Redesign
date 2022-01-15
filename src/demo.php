<?php require_once("../components/template.php"); ?>

<link rel="stylesheet" href="css/index.css">

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

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/react_usage_template.php" ?>
    <?php 
    require_once("../components/content_tabs.php"); 
    const tabContent = array(
        "Βασικές Πληροφορίες" => array(
            "basic_info",
            '<p><strong>This is the Βασικές Πληροφορίες tab\'s associated content.</strong>
            Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and styling.
            You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
        ),
        "Επιλεγμένα Τμήματα" => array(
            "selected_deps",
            '<p><strong>This is the Επιλεγμένα Τμήματα tab\'s associated content.</strong>
            Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and styling.
            You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
        ),
        "Επιλογές Αντιστοίχησης" => array(
            "course_choices",
            '<p><strong>This is the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
            Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and styling.
            You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
        ),
    );
    echoContentTabs(tabContent);
    ?>
</div>

<!-- <div class="page-container fluid-container">
    <div class="parallax"></div>
</div> -->

</div>

<?php require_once("../components/footer.php"); ?>

</body>
