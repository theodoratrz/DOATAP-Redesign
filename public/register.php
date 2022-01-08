<link rel="stylesheet" href="/public/css/index.css">
<link rel="stylesheet" href="/public/css/navbar.css">
<link rel="stylesheet" href="/public/css/forms.css">


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>

<body>

    <div class="page-container fluid-container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php" ?>

        <div class="gray-box">
                <a class="fas fa-arrow-circle-left" onclick="history.back()" style="text-decoration:none; color:#002E69; cursor:pointer; margin-left:13rem; margin-top:1.7rem;">Εγγραφή</a>
            </div>
        <div class="login-container-wrapper">
            <div class="login-container">

                <form class="well form-horizontal" action=" " method="post"  id="contact_form">
                <fieldset>

                    <!-- Form Name -->
                    <legend><center><h3>ΔΗΜΙΟΥΡΓΙΑ ΛΟΓΑΡΙΑΣΜΟΥ</h3></center></legend><br>
                    <hr>
                    <h7 style="text-align:center;">Συμπληρώστε τα στοιχεία σας ώστε να αποκτήσετε πρόσβαση</h7>
                    <br>
                    <h7 style="text-align:center;"> σε όλες τις δυνατότητες της πλατφόρμας του ΔΟΑΤΑΠ.</h7>
                    <br>
                    <h7 style="text-align:center;"><b>Όλα τα πεδία είναι υποχρεωτικά.</b></h7>
                    <hr>
                    <!-- Text input-->

                    <div style="display:flex; flex-direction:row;">
                        <div class="first_col">
                            <div class="form-group">
                                <label class="col-md-4 control-label">ΟΝΟΜΑ</label>  
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" >ΕΠΩΝΥΜΟ</label> 
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col-md-4 control-label">Department / Office</label>
                                <div class="col-md-4 selectContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <select name="department" class="form-control selectpicker">
                                            <option value="">Select your Department/Office</option>
                                            <option>Department of Engineering</option>
                                            <option>Department of Agriculture</option>
                                            <option >Accounting Office</option>
                                            <option >Tresurer's Office</option>
                                            <option >MPDC</option>
                                            <option >MCTC</option>
                                            <option >MCR</option>
                                            <option >Mayor's Office</option>
                                            <option >Tourism Office</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>  
                                <div class="col-md-4 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input  name="user_name" placeholder="Username" class="form-control"  type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    <div class="sec_col">
                        <div class="form-group">
                            <label class="col-md-4 control-label" >ΚΩΔΙΚΟΣ</label> 
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="user_password" placeholder="Password" class="form-control"  type="password">
                                </div>
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <label class="col-md-4 control-label" >ΕΠΙΒΕΒΑΙΩΣΗ ΚΩΔΙΚΟΥ</label> 
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail</label>  
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                                </div>
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">ΤΗΛΕΦΩΝΟ</label>  
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input name="contact_no" placeholder="(639)" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <!-- Select Basic -->

                        <!-- Success message -->
                        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4"><br>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div><!-- /.container -->
    </div>
        
</body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/footer.php" ?>

