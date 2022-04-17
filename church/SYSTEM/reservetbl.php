<?php
    session_start();
    $_SESSION['actib'] = 'reserve';
    require "header1.php";
    require "includes/dbconn.php";
?>
    <main>
    <!-- this is for alert -->
    <div id="dialogoverlay"></div>
    <div id="dialogbox">
        <div>
            <div id="dialogboxhead"></div>
            <div id="dialogboxbody"></div>
            <div id="dialogboxfoot"></div>
        </div>
    </div>
    <!-- end of alert -->
        <h2 style="text-align:center;"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
</svg> Reservations</h2><br>
        <div class="container">
            <div class="row justify-content-start">
                <form method="POST" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" name="sirch" placeholder="Search" aria-label="Search">
                    <button type="submit" name="srch" class="btn btn-secondary my-2 my-sm-0 btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></button>&nbsp;&nbsp;&nbsp;
                    
                    <button type="submit" name="add-data" formaction="reservetbl.php" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                    </svg></button>
                </form>
            </div>
        </div><br>
        <?php
                $counter=0;
                $resultCheck=0;
                if(isset($_POST['srch'])){
                    $idd = $_POST['sirch'];
                    $surnim = $_POST['sirch'];
                    if(empty($_POST['sirch'])){
                        echo '<div class="container"><small><b><div class=" alert alert-danger alert-sm">
                            Empty search field!
                        </div></b></small></div>';
                        $counter=1;
                    }else{
                        $sql = "SELECT * FROM reserve_tbl WHERE reserve_id='$idd' or lastname='$surnim';";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                    }    
                }else{
                    $sql = "SELECT * FROM reserve_tbl;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);    
                }
            ?>
            <div class="container">
                <?php
                    if(isset($_GET['action'])){
                        echo '<small><b><div class="alert alert-'.$_GET['action'].' alert-sm">';
                            if($_GET['action'] == 'danger')
                                echo 'Record has been deleted!';
                            else if($_GET['action'] == 'success')
                                echo 'Record has been added!';
                            else if($_GET['action'] == 'warning')
                                echo 'Record has been updated!';
                            else if($_GET['action'] == 'dark')
                                echo 'No Registered data for id no. '.$idd.' !';
                        echo '</div></b></small>';
                    }
                ?>
                <div class="row justify-content-center">
                    <table class="table table-hover table-sm">
                        <thead class="thead">
                            <tr>
                                <th>Reserve ID</th>
                                <th>Last name</th>
                                <th>First name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Purpose</th>
                                <th>File_URL</th>
                                <th colspan=2>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($resultCheck > 0 && $counter==0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<tr>';
                                        echo '<td>' . $row['reserve_id'] . '</td>';
                                        echo '<td>' . $row['lastname'] . '</td>';
                                        echo '<td>' . $row['firstname'] . '</td>';
                                        echo '<td>' . $row['gender'] . '</td>';
                                        echo '<td>' . $row['age'] . '</td>';
                                        echo '<td>' . $row['phone'] . '</td>';
                                        echo '<td>' . $row['adrss'] . '</td>';
                                        echo '<td>' . $row['purpose'] . '</td>';
                                        //echo '<td>' . $row['file_url'] . '</td>';
                                        echo '<td><a href="uploads/'.$row['file_url'].'">'.$row['file_url'].'</a></td>';
                                        echo '<td>
                                            <a href="viewdet.php?viewres='.$row['reserve_id'].'" class="btn btn-info btn-sm" data-bs-toggle="tool-tip" data-bs-placement="bottom" title="VIEW DETAILS." id="notif"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                              </svg></a>                                        
                                        </td>';
                                        /*echo '<td><a href="register.php?edit='.$row['reserve_id'].'" class="btn btn-warning btn-sm" data-bs-toggle="tool-tip" data-bs-placement="bottom" title="EDIT DATA."><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></a></td>';*/
                                        echo '<td><a href="includes/process.php?deletereserve='.$row['reserve_id'].'" class="btn btn-danger btn-sm" data-bs-toggle="tool-tip" data-bs-placement="bottom" title="DELETE DATA."><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg></a></td>';
                                        echo '</tr>';
                                    }
                                }elseif($resultCheck == 0 && $counter==0){
                                    echo '<div class="container"><small><b><div class="alert alert-danger alert-sm">
                                        No data record/Unknown data!
                                    </div></b></small></div>';                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
<?php
    
    require "footer1.php";
?>