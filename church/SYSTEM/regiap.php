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
                    }
                }
            ?>
        
            <div class="row justify-content-center">
            <div style="border:2px solid #2B3856; border-radius:15px; width:500px; padding: 20px;">
            <h3 style="text-align:center;">Set Appointment</h3><br>        
                <form action="includes/process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><small>Lastname:</small></label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Lastname " value="<?php echo $lname;?>">   
                        </div>
                        <div class="form-group col-md-6">
                        <label><small>Firstname:</small></label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter Firstname " value="<?php echo $fname;?>">                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label><small>Contact:</small></label>
                        <input type="text" name="contact" class="form-control" placeholder="Enter Contact No. " value="<?php echo $phone;?>">                        
                    </div>
                    <div class="form-group">
                        <label><small>Address:</small></label>
                        <textarea name="adrss" cols="30" rows="4" class="form-control"><?php echo $ad;?></textarea>
                    </div>
                    <div class="form-group">
                    <label for=""><small>Purpose of Reservation:</small></label>
                        <select name="purp" class="form-control">
                            <option value="" selected disabled>Purpose of Reservation</option>
                            <?php
                                if($purp = 'Baptismal'){
                                    echo '<option value="Baptismal" selected>Baptismal</option>
                                    <option value="Marriage">Marriage</option>
                                    <option value="Burial Ceremony">Burial Ceremony</option>';
                                }elseif($purp = 'Marriage'){
                                    echo '<option value="Baptismal">Baptismal</option>
                                    <option value="Marriage" selected>Marriage</option>
                                    <option value="Burial Ceremony">Burial Ceremony</option>';
                                }elseif($purp = 'Burial Ceremony'){
                                    echo '<option value="Baptismal">Baptismal</option>
                                    <option value="Marriage">Marriage</option>
                                    <option value="Burial Ceremony" selected>Burial Ceremony</option>';
                                }else{
                                    echo '<option value="Baptismal">Baptismal</option>
                                    <option value="Marriage">Marriage</option>
                                    <option value="Burial Ceremony">Burial Ceremony</option>';
                                }
                            ?>
                        </select>    
                    </div>
                    <div class="form-group">
                    <label for=""><small>Date of Appointment:</small></label>
                        <input type="date" name="dit" class="form-control" value="<?php echo $dit;?>">    
                    </div>
                    <input type="hidden" name="id" value="<?php echo $apid;?>">
                    <div class="form-group">
                        <center>
                            <?php
                                if(isset($_GET['editapp'])){
                                    echo '<button style="width:160px;" type="submit" name="app-update" formaction="includes/process.php" class="btn btn-info btn-sm">Update</button><br>';
                                }else{
                                    echo '<button style="width:160px;" type="submit" name="app-submit" class="btn btn-info btn-sm">Set Appointment</button><br>';
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