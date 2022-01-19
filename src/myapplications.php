<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/form.css">
<head>
<script></script> 
</head>
<body>
<div class="page-container fluid-container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>
        <div class="gray-box">
                <div class="breadcrumb" style="align-items:end;">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;"><i class="fas fa-home" style="font-size:15px;"></i></a></li>
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Το Προφίλ μου</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Οι Αιτήσεις μου</li>
                </div>
        </div>
    <div class="page-content-container">
    
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"?>
                        <div class="table-wrapper">
                            <form> 
                               
                              <div style="display:flex; flex-direction:row; justify-content:space-between;margin-bottom:1rem;">
                                  <h2>Αιτήσεις </h2>
                                  <div style="background-color:#20c997; width:max-content; padding:0rem; height:max-content; border-radius:5%;width:fit-content;">
                                      <button style="font-size:medium; color:black; padding:0.5rem; margin-bottom:0rem;justify-content:center;" type="submit" name="submit" 
                                      value="Αίτηση" data-toggle="modal"  
                                      data-target="#newApplication" class="btn btn-success" ><i class="fas fa-file-alt" aria-hidden="true" ></i> Νέα Αίτηση</input>
                                      </button>
                                  </div>
                                   
                                </div>

                                <table class="table" style="text-align:center">
                                <thead>
                                  <tr>
                                    <th scope="col">Αίτηση</th>
                                    <th scope="col">Κατάσταση</th>
                                    <th scope="col">Ημ/νία Υποβολής</th>
                                    <th scope="col">Ενέργειες</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th><a href="#">2345</a></th>
                                    <td style="text-align: -moz-center;">
                                    <div style="background-color:#fd7e14b3; padding:0rem; height:max-content;width:fit-content;
                                    font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;"   
                                     ><i class="fas fa-lock-open"></i> Προσωρινά Αποθηκευμένη</input>
                                    </td>
                                    <td>1/12/2021</td>
                                    <td style="text-align: -moz-center;">
                                    <div>
                                      <button style="background-color:#77B6EA; width:max-content; padding:0rem; height:max-content; border-radius:5%; width:fit-content;
                                      font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;"   
                                     class="btn btn-success" ><i class="fas fa-edit"></i> Επεξεργασία</input>
                                      </button>
                                    
                                <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#exampleModal">
                                </button></td>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Είστε σίγουροι ότι θα θέλατε να διαγράψετε αυτή την αίτηση;
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                                        <button type="button" class="btn " style="background-color:red; color:white;" >Διαγραφή</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>          
                                  </tr>
                                 
                                  <tr>
                                    <th><a href="#">2345</a></th>
                                    <td style="text-align: -moz-center;">
                                    <div style="background-color:#1bca26bf; padding:0rem; height:max-content; width:fit-content;
                                    font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;"   
                                    ><i class="fas fa-lock"></i> Οριστικοποιημένη</input>
                                    </td>
                                    <td>1/12/2021</td>
                                    <td style="text-align: -moz-center;">
                                    <div>
                                      <button style="background-color:#77B6EA; width:max-content; padding:0rem; height:max-content; border-radius:5%; width:fit-content;
                                      font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;"   
                                     class="btn btn-success" ><i class="fas fa-eye"></i> Προβολή</input>
                                      </button>
                                    
                                <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#exampleModal">
                                </button></td>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Είστε σίγουροι ότι θα θέλατε να διαγράψετε αυτή την αίτηση;
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                                        <button type="button" class="btn " style="background-color:red; color:white;" >Διαγραφή</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>          
                                  </tr>
                                  
                                  <tr>
                                    <th>
                                      <a href="#">2345</a>
                                    </th>
                                    <td style="text-align: -moz-center;">
                                    <div style="background-color:#f00c; padding:0rem; height:max-content; width:fit-content;
                                    font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;"   
                                     ><i class="fas fa-ban"></i> Απορρίφθηκε</input>
                                    </td>
                                    <td>1/12/2021</td>
                                    <td style="text-align: -moz-center;">
                                    <div>
                                    <button style="background-color:#77B6EA; width:max-content; padding:0rem; height:max-content; border-radius:5%; width:fit-content;
                                      font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;"   
                                     class="btn btn-success" ><i class="fas fa-eye"></i> Προβολή</input>
                                      </button>
                                      </button>
                                    
                                <button type="button" class="btn fas fa-trash" data-bs-toggle="modal" style="color:red" data-bs-target="#exampleModal">
                                </button></td>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Είστε σίγουροι ότι θα θέλατε να διαγράψετε αυτή την αίτηση;
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn" style="background-color:gray; color:white;" data-bs-dismiss="modal">Ακύρωση</button>
                                        <button type="button" class="btn " style="background-color:red; color:white;" >Διαγραφή</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>          
                                  </tr>
                                  <tr>
                                </tbody>
                              </table>
                            </form>

                        </div></div>
</div>
</body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

<script>
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>