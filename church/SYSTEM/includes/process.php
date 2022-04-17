<?php
    require 'dbconn.php';
    $uslname = '';
    $usfname = '';
    $usname = '';
    $usertype = '';
    $usemail = '';
    $fav = '';
    $userid = '';

    $lname = '';
    $fname = '';
    $phone = '';
    $ad = '';
    $purp = '';
    $dit = '';

    if(isset($_POST['reserve'])){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $gndr = $_POST['gndr'];
        $age = $_POST['age'];
        $cont = $_POST['contact'];
        $adrss = $_POST['adrss'];
        $purp = $_POST['purp'];
        
        $file_name = $_FILES['file-input']['name'];
        $file_type = $_FILES['file-input']['type'];
        $file_tmp_name = $_FILES['file-input']['tmp_name'];
        $file_error = $_FILES['file-input']['error'];
        $file_size = $_FILES['file-input']['size'];

        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext_file = array("doc", "docx", "pdf");

        if(empty($lname) || empty($fname) || empty($gndr) || empty($age) || empty($cont) || empty($adrss) || empty($purp) || $file_error != 0){
            header("Location: ../index.php?error=emptyfields#inquire");
            exit();
        }else{
            if($file_error == 0){
                if($file_size <= 1000000){
                    if(in_array($file_ext, $allowed_ext_file)){
                        $file_new_name = uniqid("FILE-", true) . '.' . $file_ext;
                        $file_upload_path = '../uploads/'. $file_new_name;
                        move_uploaded_file($file_tmp_name, $file_upload_path);

                        $sql = "INSERT INTO reserve_tbl (lastname, firstname, gender, age, phone, adrss, purpose, file_url) VALUES ('$lname', '$fname', '$gndr', '$age', '$cont', '$adrss', '$purp', '$file_new_name');";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            header("Location: ../index.php?inquiry=success#inquire");
                            exit();
                        }
                    }else{
                        header("Location: ../index.php?error=extensionformat#inquire");
                    }
                }else{
                    header("Location: ../signup.php?error=largesize#inquire");
                    exit();
                }
            }else{
                header("Location: ../signup.php?error=nofile#inquire");
                exit();
            }
        }
    }if(isset($_GET['deleteUser'])){
        $id = $_GET['deleteUser'];
        $sql = "DELETE FROM users_tbl WHERE userid = $userid;";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../user.php?action=danger");
            exit();
        }
    }if(isset($_GET['editUser'])){
        $userid = $_GET['editUser'];

        $sql = "SELECT * FROM users_tbl WHERE userid = $userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $uslname = $row['lastname'];
                $usfname = $row['firstname'];
                $usname = $row['username'];
                $usertype = $row['usertype'];
                $usemail = $row['email'];
                $fav = $row['fav_pet'];

            }
        }
    }if(isset($_POST['signup-update'])){
        $userid = $_POST['id'];
        $uslname = $_POST['lname'];
        $usfname = $_POST['fname'];
        $usname = $_POST['usname'];
        $usertype = $_POST['usrtyp'];
        $usemail = $_POST['mail'];
        $fav = $_POST['pet'];

        $img_name = $_FILES['img-input']['name'];
        $img_type = $_FILES['img-input']['type'];
        $img_tmp_name = $_FILES['img-input']['tmp_name'];
        $img_error = $_FILES['img-input']['error'];
        $img_size = $_FILES['img-input']['size'];

        $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $allowed_ext = array("jpeg", "jpg", "png");

        if(empty($userid) || empty($uslname) || empty($usfname) || empty($usertype) || empty($usemail) || empty($fav)){
            header("Location: ../signup.php?error=emptyfields&editUser=".$userid);
            exit();
        }elseif($img_error == 0){
            if($img_size <= 1000000){
                if(in_array($img_ext, $allowed_ext)){
                    $img_new_name = uniqid("IMG-", true) . '.' . $img_ext;
                    $img_upload_path = '../uploads/'. $img_new_name;
                    move_uploaded_file($img_tmp_name, $img_upload_path);

                    $sql1 = "UPDATE users_tbl SET lastname='$uslname', firstname='$usfname', email='$usemail' , usertype='$usertype', fav_pet='$fav', img_url='$img_new_name' WHERE userid=$userid;";
                    $result1 = mysqli_query($conn, $sql1);
                    echo mysqli_error($conn);
                    if($result1){
                        header("Location: ../user.php?action=warning");
                        exit();
                    }
                }else{
                    header("Location: ../signup.php?error=extensionformatimg&editUser=".$userid);
                }
            }else{
                header("Location: ../signup.php?error=largesizeimg&editUser=".$userid);
                exit();
            }
        }elseif($img_error > 0){
            $sql1 = "UPDATE users_tbl SET lastname='$uslname', firstname='$usfname', email='$usemail' , usertype='$usertype', fav_pet='$fav' WHERE userid=$userid;";
            $result1 = mysqli_query($conn, $sql1);
            echo mysqli_error($conn);
            if($result1){
                header("Location: ../user.php?action=warning");
                exit();
            }
        }
    }if(isset($_POST['app-submit'])){
        $ln = $_POST['lname'];
        $fn = $_POST['fname'];
        $cont = $_POST['contact'];
        $ad = $_POST['adrss'];
        $purp = $_POST['purp'];
        $dit = $_POST['dit'];

        if(empty($ln) || empty($fn) || empty($cont) || empty($ad) || empty($purp) || empty($dit)){
            header("Location: ../regiap.php?error=emptyfields");
            exit();
        }else{
            $sql = "INSERT INTO appointment_tbl (lastname, firstname, contact, adrss, purpose, appdate) VALUES ('$ln', '$fn', '$cont', '$ad', '$purp', '$dit');";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: ../appoint.php?action=success");
                exit();
            }
        }
    }if(isset($_GET['editapp'])){
        $apid = $_GET['editapp'];

        $sql = "SELECT * FROM appointment_tbl WHERE appointmentid = $apid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $lname = $row['lastname'];
                $fname = $row['firstname'];
                $phone = $row['contact'];
                $ad = $row['adrss'];
                $purp = $row['purpose'];
                $dit = $row['appdate'];
            }
        }
    }if(isset($_POST['app-update'])){
        $apid = $_POST['id'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $phone = $_POST['contact'];
        $ad = $_POST['adrss'];
        $purp = $_POST['purp'];
        $dit = $_POST['dit'];

        if(empty($apid) || empty($lname) || empty($fname) || empty($phone) || empty($ad) || empty($purp) || empty($dit)){
            header("Location: ../regiap.php?error=emptyfields&editapp=".$apid);
            exit();
        }else{
            $sql = "UPDATE appointment_tbl SET lastname='$lname', firstname='$fname', contact='$phone', adrss='$ad', purpose='$purp', appdate='$dit' WHERE appointmentid = $apid;";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: ../appoint.php?action=warning");
                exit();
            }
        }
    }if(isset($_GET['deleteapp'])){
        $apid = $_GET['deleteapp'];

        $sql = "DELETE FROM appointment_tbl WHERE appointmentid = $apid;";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../appoint.php?action=danger");
            exit();
        }
    }if(isset($_GET['deletereserve'])){
        $rid = $_GET['deletereserve'];

        $sql = "DELETE FROM reserve_tbl WHERE reserve_id = $rid;";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../reservetbl.php?action=danger");
            exit();
        }
    }
?>