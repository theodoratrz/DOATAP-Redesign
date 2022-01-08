<link rel="stylesheet" href="/public/css/index.css">
<link rel="stylesheet" href="/public/css/contact.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
<nav class="gray-box">
    <div class="container d-flex">
        Σύνδεση
    </div>
    </nav>

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

<div class="page-content-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php" ?>

    <div class="mail-wrap">
        <i class="fas fa-envelope"> <a href="mailto:protocol@doatap.gr" style="font-weight:normal;">protocol@doatap.gr</a></i>
        <span style="font-size:medium; margin-bottom:1.5rem;"> >Αποστολή Εγγράφων</span>
        <i class="fas fa-envelope"> <a href="mailto:information_dep@doatap.gr" style="font-weight:normal;">information_dep@doatap.gr</a></i>
        <span style="font-size:medium; margin-bottom:1.5rem;"> >Πληροφορίες</span>
        <i class="fas fa-envelope"> <a href="mailto:gnisiotita@doatap.gr" style="font-weight:normal;">gnisiotita@doatap.gr</a></i>
        <span style="font-size:medium; margin-bottom:1.5rem;"> >Αιτήματα Φορέων για Επαλήθευση Γνησιότητας</span>
        <div class="mail-wrap">
            <div class="map-wrap">
                <span style="font-weight:600;">ΑΘΗΝΑ</span>
                <span style="font-weight:600;">ΘΕΣΣΑΛΟΝΙΚΗ</span>
            </div>
            <div class="map-wrap">
                <i class="fas fa-map-marker"><span style="font-size:medium; font-weight:normal;"> Αγίου Κωνσταντίνου 54, 104 37</span></i>
                <i class="fas fa-map-marker" style="margin-left:6rem"><span style="font-size:medium; font-weight:normal;"> Υπουργείο Μακεδονίας Θράκης-Διοικητήριο, 541 23</span></i>
                
            </div>
            <div class="map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3144.6525639092433!2d23.7203603158019!3d37.98523677972163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bd2f5bd56263%3A0x28c44f8caa298720!2zzpTOn86RzqTOkc6g!5e0!3m2!1sel!2sgr!4v1641600914610!5m2!1sel!2sgr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3027.5098573999057!2d22.94210651586312!3d40.640690079339684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a839af21cec64b%3A0xdbc815c9573bac04!2zzqXPhs-Fz4DOv8-Fz4HOs861zq_OvyDOnM6xzrrOtc60zr_Ovc6vzrHPgiAtIM6Yz4HOrM66zrfPgiAozpTOuc6_zrnOus63z4TOrs-BzrnOvyk!5e0!3m2!1sel!2sgr!4v1641602256858!5m2!1sel!2sgr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="map-wrap">
                <i class="fas fa-phone"><a href="tel:2105281000" style="font-size:medium; font-weight:normal; text-decoration:none; color:black;"> 210-5281000</a></i>
                <i class="fas fa-phone" style="margin-left:6rem"><a href="tel:2313501372" style="font-size:medium; font-weight:normal; text-decoration:none; color:black;"> 2313-501372</a></i>
                
            </div>
        </div>
    </div>
</div>


</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

</body>