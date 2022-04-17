<?php
    require 'header.php';
?>

<main>
    <div class="container">
        <div class="row justify-content-center">
        <div style="border:2px solid skyblue; padding:18px; border-radius:12px;">
        <div class="container">
            
                        <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == "emptyfields"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Please fill out all fields!
                                </div></b></small>';
                                }elseif($_GET['error'] == "pwdnotmatched"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Password not matched!
                                </div></b></small>';
                                }elseif($_GET['error'] == "incorrectlastname"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Incorrect lastname!
                                </div></b></small>';
                                }elseif($_GET['error'] == "incorrectfirstname"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Incorrect firstname!
                                </div></b></small>';
                                }elseif($_GET['error'] == "incorrectusername"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Incorrect username!
                                </div></b></small>';
                                }elseif($_GET['error'] == "incorrectlastname"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Incorrect lastname!
                                </div></b></small>';
                                }elseif($_GET['error'] == "incorrectemail"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Incorrect email!
                                </div></b></small>';
                                }elseif($_GET['error'] == "incorrectpet"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    Incorrect favorite pet!
                                </div></b></small>';
                                }elseif($_GET['error'] == "nouser"){
                                    echo '<small><b><div class="alert alert-danger al-txt2">
                                    No registered username!
                                </div></b></small>';
                                }
                            }elseif(isset($_GET['resetpassword'])){
                                if($_GET['resetpassword'] == "success"){
                                    echo '<small><b><div style="text-align:center;" class="alert alert-success">
                                    Password reset successfully!
                                  </div></b></small>';
                                }

                            }
                            
                        ?>
                            
                    </div>
            <center><h2>Forgot Password?</h2></center><br><br><br>
            <form action="includes/manageAcc.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="usname" class="form-control" placeholder="Username:">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="lname" class="form-control" placeholder="Lastname:">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="fname" class="form-control" placeholder="Firstname:">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="mel" class="form-control" placeholder="Email:">
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="pas1" class="form-control" placeholder="New Password:">
                </div>
                <div class="form-group">
                    <input type="password" name="pas2" class="form-control" placeholder="Confirm Password:">
                </div>
                <div class="form-group">
                    <label><small>What is your favorite pet?...</small></label>
                    <input type="text" name="pet" class="form-control" placeholder="Favorite Pet:">
                </div>
                <div class="form-group">
                    <button type="submit" name="forgot-submit" class="btn btn-info btn-sm">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</main>

<?php
    
?>