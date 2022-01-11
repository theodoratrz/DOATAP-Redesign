<link rel="stylesheet" href="/public/css/anouncements.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
            <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem; margin-top:1.7rem;">Αιτήσεις</a>
        </div>
    
       
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nitem" role="presentation">
                  <button class="nav-link active" id="anouncements-tab" data-bs-toggle="tab" data-bs-target="#anouncements" type="button" role="tab" aria-controls="home" aria-selected="true">Ανακοινώσεις</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="generalinfo-tab" data-bs-toggle="tab" data-bs-target="#generalinfo" type="button" role="tab" aria-controls="profile" aria-selected="false">Γενικές Πληροφορίες</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="decisions-tab" data-bs-toggle="tab" data-bs-target="#decisions" type="button" role="tab" aria-controls="contact" aria-selected="false">Αποφάσεις Δ.Σ</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="budget-tab" data-bs-toggle="tab" data-bs-target="#budget" type="button" role="tab" aria-controls="contact" aria-selected="false">Προϋπολογισμοί-Προκηρύξεις</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="med-tab" data-bs-toggle="tab" data-bs-target="#med" type="button" role="tab" aria-controls="contact" aria-selected="false">Εξετάσεις Ιατρικής</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="tooth-tab" data-bs-toggle="tab" data-bs-target="#tooth" type="button" role="tab" aria-controls="contact" aria-selected="false">Εξετάσεις Οδοντιατρικής</button>
                </li>
              </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="anouncements" role="tabpanel" aria-labelledby="anouncements-tab">...</div>
              <div class="tab-pane fade" id="generalinfo" role="tabpanel" aria-labelledby="generalinfo-tab">...</div>
              <div class="tab-pane fade" id="decisions" role="tabpanel" aria-labelledby="decisions-tab">...</div>
              <div class="tab-pane fade show active" id="budget" role="tabpanel" aria-labelledby="budget-tab">...</div>
              <div class="tab-pane fade" id="med" role="tabpanel" aria-labelledby="med-tab">...</div>
              <div class="tab-pane fade" id="tooth" role="tabpanel" aria-labelledby="tooth-tab">...</div>
            </div>

            <div class="anouncements-box">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Ημερομηνία</th>
      <th scope="col">Τίτλος</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="color:#002e69ce;font-size:large;">01/01/2022</th>
      <td><a href="#">Jacob</a></td>
    </tr>
    <tr>
      <th scope="row" style="color:#002e69ce;font-size:large;">01/01/2022</th>
      <td><a href="#">Jacob</a></td>
    </tr>
    <tr>
      <th scope="row" style="color:#002e69ce;font-size:large;">01/01/2022</th>
      <td><a href="#">Jacob</a></td>
    </tr>
  </tbody>
</table>
</div>


</div>
    
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

