<?php
    session_start();
    require 'header.php';
?>
    <main>
    <section id="home" class="sec1">
    <div class="container"><br><br><br>
            <h1 style="text-align: center;">Church Event Reservation System</h1><br><br>
            <div class="row justify-content-center">
            <div class="form-row">
                    <div class="form-group col-md-4">
                    
                    <img style="width:350px; height:200px; border-radius:50px" src="churchimg1.jpg" alt="">
                    </div>
                    <div class="form-group col-md-4">
                    
                    <img style="width:350px; height:200px; border-radius:50px" src="churchimg2.jpg" alt="">
                    </div>
                    <div class="form-group col-md-4">
                    
                    <img style="width:350px; height:200px; border-radius:50px" src="churchimg4.jpg" alt="">
                    </div>
            </div>
            <div class="form-group">
                <img style="width:1000px; height:500px; border-radius:50px" src="churchimg3.jpg" alt="">
            </div>
            </div>
            
        </div>
    </section>
    
    <section style="background-color:#FFD700;" id="contact" class="sec3">
    <div class="container"><br><br><br><br>
            
            <h1 style="text-align: center;">Contact Us</h1><br><br>
            <h4 style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
  <path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/>
</svg> 09123456789</h4>
<h4 style="text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg> 8 - 7000</h4><br><br><br><br>
            
        </div>
    </section>
    <section id="about" class="sec2">
    <div class="container"><br><br><br><br>
            
    <h1 style="text-align: center;">About Us</h1><br><br><br><br><br><br>
            
        </div>
        </section>
    <section style="background-color:#2B3856;" id="inquire" class="sec4">
    <div class="container"><br><br><br>
    
        <?php
            if(isset($_GET['inquiry'])){
                if($_GET['inquiry'] == 'success'){
                    echo '<div style="text-align:center; font-weight:bold;" class="alert alert-success">Reservation sent Successfully! please wait for messages or call from our staff.</div>';
                }
            }elseif(isset($_GET['error'])){
                if($_GET['error'] == 'emptyfields'){
                    echo '<div style="text-align:center; font-weight:bold;" class="alert alert-danger">Fill out all fields!</div>';
                }
            }
        ?>
    
    <center><h1 style="color:white;"><b><u>Reserve Now</u></b></h1></center><br><br>
            <div class="container row justify-content-center">
            <form action="includes/process.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    
                    <input type="text" name="fname" class="form-control" placeholder=" First name">
                    </div>
                    <div class="form-group col-md-6">
                    
                    <input type="text" name="lname" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    
                    <select name="gndr" class="form-control">
                        <option value="" selected disabled>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    
                    <input type="number" name="age" class="form-control" placeholder="Age">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    
                    <input type="text" name="contact" class="form-control" placeholder="Contact">
                    </div>
                    <div class="form-group col-md-6">
                    
                    <input type="text" name="adrss" class="form-control" placeholder="Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><small style="color:white;">Purpose of Reservation:</small></label>
                    <select name="purp" class="form-control">
                        <option value="" selected disabled>Purpose of Reservation</option>
                        <option value="Baptismal">Baptismal</option>
                        <option value="Marriage">Marriage</option>
                        <option value="Burial Ceremony">Burial Ceremony</option>
                    </select>    
                </div>
                <div class="form-group">
                    <label for=""><small style="color:white;">Attach file here:</small></label>
                    <input type="file" name="file-input" class="form-control">
                    <label for=""><small style="color:white;"><br>( Note: attach Birth certificate(PSA) for baptismal and Marriage, <br> &nbsp; Death certificate for burial ceremony. ( .docx and .pdf only) )</small></label>    
                </div>
                <div class="form-group">
                    <center>
                    <button type="submit" class="btn btn-outline-success btbt" name="reserve">Submit Reservation</button>    
                    </center>
                </div>
            </form>
            </div>
        </div><br><br>
    </section>

    </main>
<?php
    require 'footer.php';
?>