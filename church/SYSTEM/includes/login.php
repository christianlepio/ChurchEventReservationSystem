<?php
    if(isset($_POST['login-submit'])){
        require 'dbconn.php';

        $uname = $_POST['usname'];
        $pass = $_POST['password'];

        if(empty($uname) || empty($pass)){
            header("Location: ../login.php?error=emptyfields");
            exit();
        }else{
            $sql = "SELECT * FROM users_tbl WHERE username=? OR email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../login.php?error=sqlerrore");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    //password verifier...
                    $passCheck = password_verify($pass, $row['pwd']);
                    if($passCheck == false){
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }elseif($passCheck == true){
                        session_start();
                        $_SESSION['usrId'] = $row['userid'];
                        $_SESSION['usernm'] = $row['username'];
                        $_SESSION['ustype'] = $row['usertype'];
                        $_SESSION['image'] = $row['img_url'];
                
                        header("Location: ../reservetbl.php?login=success");
                        exit();
                    }else{
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                }else{
                    header("Location: ../login.php?error=nouser");
                    exit();
                }
            }
        }
    }else{
        header("Location: ../index.php");
    }
?>