<?php
    include_once("../admin/config.php");

    session_start();
    if(isset($_SESSION['userID'])){
        //header("LOCATION: ../main/deniedpage.php");
        echo "<script> alert('Your have already Logged as a user');</script>";
        header("Refresh: 0; URL = ../main/index.php");
        die();
        
        
    }else if(isset($_SESSION['adminID'])){
        echo "<script> alert('Your have already Logged as a admin');</script>";
        header("Refresh: 0; URL = ../admin/dashboard.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/loging_selector.css">
    <title>Home</title>
</head>



<body>
    <?php include("header.php"); ?>
    
    <div class="container">
        <img src="images/loging back2.jpg" alt="">
        <div class="wrap">
            <div class="btn_wrap">
                <button class="btn" id="admin" onclick="display('admin')">Admin</button>
                <button class="btn" id="user" onclick="display('user')">User</button>
            </div>
            <div class="box_wrap">
                <img class="closebtn" src="images/icons/close.png" alt="close btn" onclick="closebox()">



                <a class="admin_wrap" href="adminloging.php">

                    <h1>Admin</h1>
                    <img src="images/icons/admin3.png" alt="admin logo">
                </a>
                    
                
                <a class="user_wrap" href="login.php">
                    <h1>User</h1>
                    <img src="images/icons/user2.png" alt="">
                </a>
                    
                
            </div>
        </div>
       
    </div>

    

    <script>
        var adminBtn = document.querySelector('#admin');
        var userBtn = document.querySelector('#user');
        var boxWrap = document.querySelector('.box_wrap');
        var adminWrap = document.querySelector('.admin_wrap');
        var userWrap = document.querySelector('.user_wrap');
        var closebtn = document.querySelector('.closebtn');
        var btnWrap = document.querySelector('.btn_wrap');

        function display(x){
            if(x == "admin"){
                boxWrap.classList.add("active");
                btnWrap.classList.add("active");
                adminWrap.classList.add("active");
                
            }else if(x == "user"){
                boxWrap.classList.add("active");
                btnWrap.classList.add("active");
                userWrap.classList.add("active");
            }
             
        }

        function closebox(){
            boxWrap.classList.remove("active");
            btnWrap.classList.remove("active");
            adminWrap.classList.remove("active");
            userWrap.classList.remove("active");
        }
    </script>
</body>
</html>