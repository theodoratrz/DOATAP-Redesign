<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">

<div class="table-wrapper" style="background-color:transparent">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="table">
      <div class="row" style="display:flex; flex-direction:row; justify-content:space-evenly;">
        <h6><i class="fas fa-info-circle"></i>Μεταφόρτωση Απαραίτητων Δικαιολογητικών </h6>

      </div>
    </div>

    <table class="table" style="text-align:left">
      <thead>
        <tr>
          <th scope="col">Δικαιολογητικό</th>
          <th scope="col">Αρχείο</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Έγγραφο Ταυτοπροσωπίας</td>
          <td>
            <div class="upload-btn">
              <input type="file" id="actual-btn-1" name="file-1" />
              <label for="actual-btn-1"><i class="fas fa-cloud-upload-alt"></i> Προσθήκη</label>
              <span id="file-chosen-1">Επιλέξτε Αρχείο</span>
            </div>
          </td>

          <!-- Trigger/Open The Modal -->
          <td>
            <button type="button" id="del-1" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#deleteModal">
            </button>
          </td>
        </tr>

        </tr>
      </tbody>
    </table>
    <input type="button" id="submit-button" value="Upload">
  </form>

</div>

<script>
  $("#del-1").hide();
  const actualBtn1 = document.getElementById('actual-btn-1');
  const fileChosen1 = document.getElementById('file-chosen-1');
  actualBtn1.addEventListener('change', function() {
    fileChosen1.textContent = this.files[0].name
    console.log(this.files[0]);
    $("#del-1").show()
  })

  $("#submit-button").click(function(){
    console.log($("actual-btn-1").files);
  })

</script>