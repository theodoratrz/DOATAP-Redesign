<link rel="stylesheet" href="/public/css/index.css">
<link rel="stylesheet" href="/public/css/contact.css">

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

    <div class="mail-wrap">
        <i class="fas fa-envelope"> <a href="mailto:protocol@doatap.gr" style="font-weight:normal;">protocol@doatap.gr</a></i>
        <span style="font-size:medium"> >Αποστολή Εγγράφων</span>
        <i class="fas fa-envelope"><a href="mailto:information_dep@doatap.gr" style="font-weight:normal;">information_dep@doatap.gr</a></i>
        <span style="font-size:medium"> >Πληροφορίες</span>
        <i class="fas fa-envelope"><a href="mailto:gnisiotita@doatap.gr" style="font-weight:normal;">gnisiotita@doatap.gr</a></i>
        <span style="font-size:medium"> >Αιτήματα Φορέων για Επαλήθευση Γνησιότητας</span>
    </div>


</div>


</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>