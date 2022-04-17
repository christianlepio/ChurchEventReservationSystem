<?php
    //session_start();
    if(!isset($_SESSION['usrId'])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="navstyle.css">
</head>
<body>

    <?php
        require "includes/process.php";
    ?>

    <header>
        <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="navbar-brand" href="#">ChurchRS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($_SESSION['actib'] == 'reserve'){echo 'active';}?>" href="reservetbl.php">Reservations<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($_SESSION['actib'] == 'appoint'){echo 'active';}?>" href="appoint.php">Appointments</a>
                </li>
                <?php
                    if(isset($_SESSION['ustype'])){
                        if($_SESSION['ustype'] == 'Admin'){
                    
                            echo '<li class="nav-item">
                            <a class="nav-link '.$_SESSION['actib'].'"';
                            //if($_SESSION['actib']=='user'){echo 'active';}
                            echo ' href="user.php">Users</a>
                            </li>';
                        }
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($_SESSION['actib'] == 'reset'){echo 'active';}?>" href="resetP.php">Reset Password?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php">Logout</a>
                </li>
                </ul>
                
            </div>
        </nav>
        </div>
    </header>
    