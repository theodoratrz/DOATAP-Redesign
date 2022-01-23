<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/api/applications.php";

function echoPagination()
{
  if (array_key_exists("page", $_GET)) {
    $currentPage = intval($_GET['page']);
  } else {
    $currentPage = 1;
  }
  $hasPrevious = ($currentPage !== 1);
  $temp = getAllApplications('approved', $currentPage, '5', 'DESC');
  
  $applications = $temp[0];
  $hasNext = $temp[1];

  echo '<table class="table" style="text-align:center">
          <thead>
            <tr>
              <th scope="col">Αίτηση</th>
              <th scope="col">Ημ/νία Δημιουργίας</th>
              <th scope="col">Ενέργειες</th>
            </tr>
          </thead>
          <tbody>';

          foreach ($applications as $application) {
            echo '
                <tr>
                  <th><span>' . $application["app_id"] . '</span></th>
                  <td>' . explode(" ",$application["last_modified"])[0] . '</td>
                  <td>
                    <div>
                      <a href="/admin-application.php?app_id=' . $application["app_id"] . '"
                      class="btn btn-primary application-action-button">
                        <i class="fas fa-edit"></i> Επεξεργασία
                      </a>
                    </div>
                  </td>
                </tr>';
          }

          echo '
          </tbody>
        </table>

        <nav aria-label="...">
          <ul class="pagination">
              <li class="page-item '. ($hasPrevious ? '' : 'disabled') .'">
              <a class="page-link" '. ($hasPrevious ? 'href="/accepted_applications.php?page='. ($currentPage - 1) .'"' : '') .'>
                Previous
              </a>
              </li>
              <li class="page-item active" aria-current="page">
              <a class="page-link" href="#">'. $currentPage .'</a>
              </li>
              <li class="page-item '. ($hasNext ? '' : 'disabled') .'">
              <a class="page-link" '. ($hasNext ? 'href="/accepted_applications.php?page='. ($currentPage + 1) .'"' : '') .'>
                Next
              </a>
              </li>
          </ul>
        </nav>';
}

?>
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

</style>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">

<body>
  <div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
    <div class="gray-box">
      <a href="index.php" class="fas fa-arrow-circle-left" style="text-decoration:none; color:#002E69; cursor:pointer; 
            margin-left:13rem;margin-top:2%;"> Αιτήσεις που έχουν Εγκριθεί</a>
      <div class="breadcrumb" style="align-items:end;">
        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
        <li class="breadcrumb-item"><a href="applications_handling.php" style="text-decoration:none;">Διαχείριση Αιτήσεων</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Αιτήσεις που έχουν Εγκριθεί</li>
      </div>
    </div>
    <div class="page-content-container">

      <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php";
      echoSidebar("/profile/application_handling/accepted_applications.php/");
      ?>

      <div style="display:flex; flex-direction:column; row-gap:1rem; align-items:center;">
        <?php echoPagination() ?>
      </div>
    </div>
  </div>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>
</body>
