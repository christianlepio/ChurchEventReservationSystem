<?php
    session_start();
    $_SESSION['actib'] = 'reset';
    require 'header1.php';
?>
    <main>
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
                    }elseif($_GET['error'] == "wrongoldpassword"){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        Incorrect old Password!
                      </div></b></small>';
                    }elseif($_GET['error'] == "success"){
                        echo '<small><b><div style="text-align:center;" class="alert alert-success">
                        Password reset successfully!
                      </div></b></small>';
                    }
                }
            ?>
        
        
            <div class="row justify-content-center">
            <div style="border:2px solid #2B3856; border-radius:15px; width:500px; padding: 20px;">
            <h3 style="text-align:center;">Reset Password?</h3><br>        
                <form action="includes/manageAcc.php" method="POST">

                    <div class="form-group">
                        <label><small>Username:</small></label>
                        <input type="text" name="usn" class="form-control" placeholder="Enter Email " value="<?php echo $_SESSION['usernm'];?>" disabled>                        
                    </div>
                    <div class="form-group">
                        <label><small>Old-Password:</small></label>
                        <input type="password" name="ppass" class="form-control" placeholder="Enter Old-password ">                        
                    </div>
                    <div class="form-group">
                        <label><small>New-Password:</small></label>
                        <input type="password" name="pass1" class="form-control" placeholder="Enter New-password ">                        
                    </div>
                    <div class="form-group">
                        <label><small>Confirm-Password:</small></label>
                        <input type="password" name="pass2" class="form-control" placeholder="Enter Confirm-password ">                        
                    </div>
                    <input type="hidden" name="uid" value="<?php echo $_SESSION['usrId']; ?>">
                    <div class="form-group">
                        <center>
                           <button style="width:160px;" type="submit" name="cpass-submit" class="btn btn-info btn-sm">Reset</button>;
                        </center>         
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
<?php
    require 'footer1.php';
?>