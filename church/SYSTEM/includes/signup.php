<?php
if(isset($_POST['signup-submit'])){
    
    require "dbconn.php";

    $lastname = $_POST['lname'];
    $firstname = $_POST['fname'];
    $email = $_POST['mail'];
    $username = $_POST['usname'];
    $usertype = $_POST['usrtyp'];
    $pass1 = $_POST['pas1'];
    $pass2 = $_POST['pas2'];
    $fav = $_POST['pet'];

    $img_name = $_FILES['img-input']['name'];
    $img_type = $_FILES['img-input']['type'];
    $img_tmp_name = $_FILES['img-input']['tmp_name'];
    $img_error = $_FILES['img-input']['error'];
    $img_size = $_FILES['img-input']['size'];

    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed_ext = array("jpeg", "jpg", "png");
    

    if(empty($lastname) || empty($firstname) || empty($username) || empty($email) || empty($pass1) || empty($pass2) || empty($usertype) || empty($fav) || $img_error > 0 ){
        header("Location: ../signup.php?error=emptyfields&lastname=".$lastname."&firstname=".$firstname."&usname=".$username."&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9_-]*$/", $username) && !preg_match("/^[a-zA-Z_ -]*$/", $lastname) && !preg_match("/^[a-zA-Z_ -]*$/", $firstname)){
        header("Location: ../signup.php?error=invalidusnamelastnamefirstname&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9_-]*$/", $username) && !preg_match("/^[a-zA-Z_ -]*$/", $lastname)){
        header("Location: ../signup.php?error=invalidusnamelastname&firstname=".$firstname."&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9_-]*$/", $username) && !preg_match("/^[a-zA-Z_ -]*$/", $firstname)){
        header("Location: ../signup.php?error=invalidusnamefirstname&lastname=".$lastname."&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z_ -]*$/", $firstname) && !preg_match("/^[a-zA-Z_ -]*$/", $lastname)){
        header("Location: ../signup.php?error=invalidlastnamefirstname&usname=".$username."&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9_-]*$/", $username)){
        header("Location: ../signup.php?error=invalidusname&lastname=".$lastname."&firstname=".$firstname."&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z_ -]*$/", $lastname)){
        header("Location: ../signup.php?error=invalidlastname&firstname=".$firstname."&usname=".$username."&mail=".$email);
        exit();
    }elseif(!preg_match("/^[a-zA-Z_ -]*$/", $firstname)){
        header("Location: ../signup.php?error=invalidfirstname&lastname=".$lastname."&usname=".$username."&mail=".$email);
    }elseif($pass1 !== $pass2){
        header("Location: ../signup.php?error=passwordNotMatched&usname=".$username."&mail=".$email);
        exit();
    }else{
        $sql = "SELECT username FROM users_tbl WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usernametaken&lastname=".$lastname."&firstname=".$firstname."&mail=".$email);
                exit();
            }else{

                if($img_error == 0){
                    if($img_size <= 1000000){
                        if(in_array($img_ext, $allowed_ext)){
                            $img_new_name = uniqid("IMG-", true) . '.' . $img_ext;
                            $img_upload_path = '../uploads/'. $img_new_name;
                            move_uploaded_file($img_tmp_name, $img_upload_path);
                        }else{
                            header("Location: ../signup.php?error=extensionformatimg");
                        }
                    }else{
                        header("Location: ../signup.php?error=largesizeimg");
                        exit();
                    }
                }else{
                    header("Location: ../signup.php?error=noimage");
                    exit();
                }

                $sql = "INSERT INTO users_tbl (lastname, firstname, email, username, usertype, pwd, fav_pet, img_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }else{
                    //this is for encrypting the password...
                    $hashedPass = password_hash($pass1, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssssss", $lastname, $firstname, $email, $username, $usertype, $hashedPass, $fav, $img_new_name);
                    //this is for execution of the sql statement
                    mysqli_stmt_execute($stmt);
                    header("Location: ../user.php?action=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);  
}else{
    header("Location: ../signup.php");
    exit();
}
?>