<?php
    session_start();
    require 'header1.php';
?>
    <main>
        <div class="container">
        
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfields'){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        Please fill out all fields!
                      </div></b></small>';
                    }elseif($_GET['error'] == 'extensionformatimg'){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        Invalid file extension name!
                      </div></b></small>';
                    }elseif($_GET['error'] == 'largesizeimg'){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        Too large image file size!
                      </div></b></small>';
                    }elseif($_GET['error'] == 'passwordNotMatched'){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        Password not matched!
                      </div></b></small>';
                    }elseif($_GET['error'] == 'usernametaken'){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        Username already taken!
                      </div></b></small>';
                    }elseif($_GET['error'] == 'noimage'){
                        echo '<small><b><div class="alert alert-danger al-txt2">
                        No attached image!
                      </div></b></small>';
                    }
                }
            ?>
            <div class="row justify-content-center">
            <div style="border:2px solid #2B3856; border-radius:15px; width:500px; padding: 20px;">
            <h3 style="text-align:center;">Sign Up</h3><br>        
                <form action="includes/signup.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><small>Lastname:</small></label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Lastname " value="<?php echo $uslname;?>">   
                        </div>
                        <div class="form-group col-md-6">
                        <label><small>Firstname:</small></label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter Firstname " value="<?php echo $usfname;?>">                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label><small>Email:</small></label>
                        <input type="text" name="mail" class="form-control" placeholder="Enter Email " value="<?php echo $usemail;?>">                        
                    </div>
                    <div class="form-row">
                        <?php
                            if(isset($_GET['editUser'])){
                                echo '<div class="form-group col-md-6">
                                <label><small>Username:</small></label>
                                <input type="text" name="usname" class="form-control" placeholder="Enter Username " value="'.$usname.'" disabled>                        
                                </div>';
                            }elseif(!isset($_GET['editUser'])){
                                echo '<div class="form-group col-md-6">
                                <label><small>Username:</small></label>
                                <input type="text" name="usname" class="form-control" placeholder="Enter Username " value="'.$usname.'">                        
                                </div>';
                            }
                        ?>
                        <div class="form-group col-md-6">
                        <label><small>UserType:</small></label>
                        <select name="usrtyp" class="form-control">
                            <option value="" selected disabled>UserType</option>
                            <?php
                                if($usertype == 'Admin'){
                                    echo '<option value="Admin" selected>Admin</option>
                                    <option value="Staff">Staff</option>';
                                }elseif($usertype == 'Staff'){
                                    echo '<option value="Admin">Admin</option>
                                    <option value="Staff" selected>Staff</option>';
                                }else{
                                    echo '<option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>';
                                }
                            ?>
                        </select>                        
                        </div>
                    </div>
                    <div class="form-row">
                    <?php
                        if(!isset($_GET['editUser'])){
                            echo '<div class="form-group col-md-6">
                            <label><small>Password:</small></label>
                            <input type="password" name="pas1" class="form-control" placeholder="Enter Password">   
                            </div>
                            <div class="form-group col-md-6">
                            <label><small>Confirm Password:</small></label>
                            <input type="password" name="pas2" class="form-control" placeholder="Confirm Password">                        
                            </div>';
                        }

                    ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><small>What is your favorite pet?</small></label>
                        <input type="text" name="pet" class="form-control" placeholder="Answer " value="<?php echo $fav;?>">     
                        </div>
                        <div class="form-group col-md-6">
                        <label><small>Attach profile picture:</small></label>
                        <input type="file" name="img-input" class="form-control">     
                        </div>                   
                    </div>
                    <input type="hidden" name="id" value="<?php echo $userid;?>">
                    <div class="form-group">
                        <center>
                            <?php
                                if(isset($_GET['editUser'])){
                                    echo '<button style="width:160px;" type="submit" name="signup-update" formaction="includes/process.php" class="btn btn-info btn-sm">Update</button><br>';
                                }else{
                                    echo '<button style="width:160px;" type="submit" name="signup-submit" class="btn btn-info btn-sm">Sign Up</button><br>';
                                }
                            ?>
                            
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