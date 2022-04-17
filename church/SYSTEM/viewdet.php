<?php
    session_start();
    require "header1.php";
    require "includes/dbconn.php";
?>
    <main>
        <div class="container">
        <div class="row justify-content-center">
            <div>
                <?php
                    require 'includes/dbconn.php';
                    if(isset($_GET['viewap'])){
                        $id = $_GET['viewap'];

                        $sql = "SELECT * FROM appointment_tbl WHERE appointmentid = $id;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h2>DETAILS</h2><br>';
                                echo '<p><b>Appointment ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['appointmentid']. '</b></p>';
                                echo '<p><b>Lastname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['lastname']. '</b></p>';
                                echo '<p><b>Firstname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['firstname']. '</b></p>';
                                echo '<p><b>Contact No.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['contact']. '</b></p>';
                                echo '<p><b>Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['adrss']. '</b></p>';
                                echo '<p><b>Appointment Purpose: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['purpose']. '</b></p>';
                                echo '<p><b>Appointment Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['appdate']. '</b></p>';
                            }
                        }
                    }if(isset($_GET['viewres'])){
                        $id = $_GET['viewres'];

                        $sql = "SELECT * FROM reserve_tbl WHERE reserve_id = $id;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h2>DETAILS</h2><br>';
                                echo '<p><b>Reservation ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['reserve_id']. '</b></p>';
                                echo '<p><b>Lastname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['lastname']. '</b></p>';
                                echo '<p><b>Firstname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['firstname']. '</b></p>';
                                echo '<p><b>Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['gender']. '</b></p>';
                                echo '<p><b>Age: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['age']. '</b></p>';
                                echo '<p><b>Contact No.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['phone']. '</b></p>';
                                echo '<p><b>Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['adrss']. '</b></p>';
                                echo '<p><b>Reservation Purpose: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['purpose']. '</b></p>';
                                echo '<p><b>File_url: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['file_url']. '</b></p>';
                            }
                        }
                    }if(isset($_GET['viewusr'])){
                        $id = $_GET['viewusr'];

                        $sql = "SELECT * FROM users_tbl WHERE userid = $id;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h2>DETAILS</h2><br>';
                                echo '<p><b>Profile Picture: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img style="width:100px; height:100px; border-radius:47px;" src="uploads/'. $row['img_url']. '"></b></p>';
                                echo '<p><b>User ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['userid']. '</b></p>';
                                echo '<p><b>Lastname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['lastname']. '</b></p>';
                                echo '<p><b>Firstname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['firstname']. '</b></p>';
                                echo '<p><b>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['email']. '</b></p>';
                                echo '<p><b>Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['username']. '</b></p>';
                                echo '<p><b>Usertype: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['usertype']. '</b></p>';
                                echo '<p><b>Favorite Pet: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $row['fav_pet']. '</b></p>';
                                
                            }
                        }
                    }
                ?>
            </div>
        </div>          
        </div>
    </main>
<?php
    
    require "footer1.php";
?>