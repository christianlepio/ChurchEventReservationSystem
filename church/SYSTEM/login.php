<?php
    require 'header.php';
?>
    <main>
        <div class="container">
        
        
            <div class="row justify-content-center">
            <div style="border:2px solid #2B3856; border-radius:15px; width:500px; padding: 80px;">
            <h3 style="text-align:center;">Log In</h3><br>        
                <form action="includes/login.php" method="POST">
                    <div class="form-group">
                        <label><small>Username:</small></label>
                        <input type="text" name="usname" class="form-control" placeholder="Enter Username ">                        
                    </div>
                    <div class="form-group">
                        <label><small>Password:</small></label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">                        
                    </div>
                    <div class="form-group">
                        <center>
                            <button style="width:160px;" type="submit" name="login-submit" class="btn btn-info btn-sm">Log In</button><br>
                            <a href="passforgot.php">forgot password?</a>
                        </center>         
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
<?php
    require 'footer.php';
?>