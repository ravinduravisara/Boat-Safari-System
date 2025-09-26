<?php
    session_start();
    if($_SESSION['adminID'] == ""){
        header("LOCATION: ../main/deniedpage.php");
        echo "<script> alert('Please Login');</script>";
        // header("location: ../main/adminloging.php");
        die();
        
    }else{
        $adminID = $_SESSION['adminID'];
        $ufname = $_SESSION['fname'];
        $ulname = $_SESSION['lname'];
        $userName = $ufname . " " . $ulname;
    }

?>