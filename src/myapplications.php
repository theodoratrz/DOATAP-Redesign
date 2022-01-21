<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php"; ?>
<style>
  .application-status {
    padding: 0rem;
    height: max-content;
    width: fit-content;
    font-size: medium;
    padding: 0.5rem;
    margin-bottom: 0rem;
    justify-content: center;
    font-weight: bold;
  }

  .application-status.status-stored {
    background-color: transparent;
    color: #ff5400;
  }

  .application-status.status-submit {
    background-color: transparent;
    color: #1b68ca;
    ;
  }

  .application-status.status-approved {
    background-color: transparent;
    color: #24801c;
  }

  .application-status.status-declined {
    background-color: transparent;
    color: red;
  }

  .application-status.status-pending {
    background-color: transparent;
    color: #ff5400;
  }

  .application-action-button {
    background-color: #77B6EA;
    width: max-content;
    padding: 0rem;
    height: max-content;
    border-radius: 5%;
    width: fit-content;
    font-size: medium;
    color: #002E69;
    padding: 0.5rem;
    margin-bottom: 0rem;
    justify-content: center;
  }
</style>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">

<body>
  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
    <div class="gray-box">
      <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;">Οι Αιτήσεις μου</a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οι Αιτήσεις μου</li>
      </div>
    </div>
    <div class="page-content-container">

      <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
      echoSidebar("/profile/myapplications/");
      ?>

      <div class="table-wrapper">
        <div style="display:flex; flex-direction:row; justify-content:space-between;margin-bottom:1rem; width:inherit; align-items:center;">
          <h2>Αιτήσεις </h2>
          <div style="background-color:#20c997; width:max-content; padding:0rem; height:max-content; border-radius:5%;width:fit-content;">
            <a href="/user_application_submission.php" style="text-decoration:none; color:inherit; font-size:inherit;" aria-hidden="true">
              <button style="font-size:medium; color:black; padding:0.5rem; margin-bottom:0rem;justify-content:center;" type="submit" name="submit" value="Αίτηση" data-toggle="modal" data-target="#newApplication" class="btn btn-success">
                <i class="fas fa-file-alt"></i> Νέα Αίτηση
              </button>
            </a>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Διαγραφή Αίτησης</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Είστε σίγουροι ότι θα θέλατε να διαγράψετε αυτή την αίτηση;
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                <button id="delete-button" type="button" class="btn " style="background-color:red; color:white;">Διαγραφή</button>
              </div>
            </div>
          </div>
        </div>
        <table class="table" style="text-align:center">
          <thead>
            <tr>
              <th scope="col">Αίτηση</th>
              <th scope="col">Ημ/νία Δημιουργίας</th>
              <th scope="col">Κατάσταση</th>
              <th scope="col">Τελ. Ενημέρωση</th>
              <th scope="col">Ενέργειες</th>
            </tr>
          </thead>
          <tbody>

            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

            // TODO: Check user rights

            $applications = getApplications($_SESSION['user_id']);

            foreach ($applications as $application) {
              echo '
                  <tr>
                    <th><span>' . $application["application_id"] . '</span></th>
                    <td>' . $application["date_created"] . '</td>
                    ';
              switch ($application["state"]) {
                case 'approved':
                  echo '
                      <td style="text-align: -moz-center;">
                        <div class="application-status status-approved">
                          <i class="fas fa-check-square"></i> Εγκρίθηκε
                        </div>
                      </td>
                      <td>' . $application["date_modified"] . '</td>
                      <td style="text-align: -moz-center;">
                      <div>
                        <a href="/user_application_submission.php?id=' . $application["application_id"] . '"
                        class="btn btn-success application-action-button">
                          <i class="fas fa-eye"></i> Προβολή
                        </a>
                      </div>
                      </td>';
                  break;
                case 'pending':
                  echo '
                      <td style="text-align: -moz-center;">
                        <div class="application-status status-pending">
                          <i class="fas fa-exclamation-circle"></i> Εκκρεμούν Μαθήματα
                        </div>
                      </td>
                      <td>' . $application["date_modified"] . '</td>
                      <td style="text-align: -moz-center;">
                      <div>
                        <a href="/user_application_submission.php?id=' . $application["application_id"] . '"
                        class="btn btn-success application-action-button">
                          <i class="fas fa-eye"></i> Προβολή
                        </a>
                      </div>
                      </td>';
                  break;
                case 'submitted':
                  echo '
                      <td style="text-align: -moz-center;">
                        <div class="application-status status-submit">
                          <i class="fas fa-lock"></i> Οριστικοποιημένη
                        </div>
                      </td>
                      <td>' . $application["date_modified"] . '</td>
                      <td style="text-align: -moz-center;">
                      <div>
                        <a href="/user_application_submission.php?id=' . $application["application_id"] . '"
                        class="btn btn-success application-action-button">
                          <i class="fas fa-eye"></i> Προβολή
                        </a>
                      </div>
                      </td>';
                  break;
                case 'declined':
                  echo '
                      <td style="text-align: -moz-center;">
                        <div class="application-status status-declined">
                          <i class="fas fa-ban"></i> Απορρίφθηκε
                        </div>
                      </td>
                      <td>' . $application["date_modified"] . '</td>
                      <td style="text-align: -moz-center;">
                      <div>
                        <a href="/user_application_submission.php?id=' . $application["application_id"] . '"
                        class="btn btn-success application-action-button">
                          <i class="fas fa-eye"></i> Προβολή
                        </a>
                      </div>
                      </td>';
                  break;
                case 'stored':
                  echo '
                      <td style="text-align: -moz-center; text-align: center;">
                        <div class="application-status status-stored"> 
                          <i class="fas fa-lock-open"></i> Προσωρινά Αποθηκευμένη
                        </div>
                      </td>
                      <td>' . $application["date_modified"] . '</td>
                      <td style="text-align: -moz-center;">
                        <div>
                          <a href="/user_application_submission.php?id=' . $application["application_id"] . '"
                          class="btn btn-success application-action-button">
                            <i class="fas fa-edit"></i> Επεξεργασία
                          </a>
                        </div>
                        <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#exampleModal" data-app-id=' . $application["application_id"] . '>
                        </button>
                      </td>
                      ';
                  break;
              }
              echo '</tr>';
            }

            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>
</body>


<script>
  // When the user clicks on <div>, open the popup
  function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }


  $("#exampleModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var app_id = button.data("app-id");
    var modal = $(this);

    $("#delete-button").click(function() {

      $.ajax({
        url: "/api/manage_application.php?" + $.param({
          app_id: app_id,
          operation: "delete"
        }),
        type: "GET",
      }).done(function(data) {
        window.location.href = "/myapplications.php";
      })
    })


  });
</script>