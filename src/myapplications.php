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
                    <li class="breadcrumb-item"><a href="applications.php" style="text-decoration:none; font-size:15px;">Αιτήσεις</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:15px;">Διαδικασία Υποβολής</li>
                </div>
        </div>
    <div class="page-content-container">
    
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"?>
                        <div class="table-wrapper">
                            <form> 
                                <div class="table">
                                    <div class="row" style="diplay:flex; flex-direction:row; justify-content:space-evenly;">
                                        <h2>Αιτήσεις </h2>
                                        <div style="background-color:#77B6EA; width:max-content; padding:0rem; height:max-content; border-radius:5%;">
                                            <button style="font-size:medium; color:#002E69; padding:0.5rem; margin-bottom:0rem;justify-content:center;" type="submit" name="submit" 
                                            value="Αίτηση" data-toggle="modal"  
                                            data-target="#newApplication" class="btn btn-success" ><i class="fas fa-file-alt" aria-hidden="true" ></i> Νέα Αίτηση</input>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <table class="table" style="text-align:center">
                                <thead>
                                  <tr>
                                    <th scope="col">Αίτηση</th>
                                    <th scope="col">Κατάσταση</th>
                                    <th scope="col">Ημ/νία Υποβολής</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row" style="color:#002e69ce;font-size:large;"><a href="#">34567</a></th>
                                    <td>-</td>
                                    <td>1/12/2021</td>
                                    <td><a href="#" class="fas fa-trash" style="color:red; text-decoration:none;">
                                    <div class="popup" onclick="myFunction()">Click me!
                                        <span class="popuptext" id="myPopup">Popup text...</span>
                                    </div></a></td>
                                  </tr>
                                
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