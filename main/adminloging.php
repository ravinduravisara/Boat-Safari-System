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
    
    if (!isset($_SESSION['adminLoginAttempts'])) {
        // Initialize the login attempts session variable to 0
        $_SESSION['adminLoginAttempts'] = 0;
    }
;     
    $_SESSION['adminMaxloginAttempts'] = 3;

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            
            
            $Sql = "SELECT * FROM admin WHERE email = '$email' and pwd = '$pwd'"; 
            $result = $conn->query($Sql);
            $row = $result->fetch_assoc();

            if($result->num_rows > 0){

                if($row['status'] == "Deactivated"){
                    echo "<script> alert('Your account has been deactivated. Please contact the admin');</script>";
                    header("Refresh: 0; URL = adminloging.php");
                }else{
                    echo "<script> alert('You have succesfully logged In');</script>";
                    header("Refresh: 0; URL = ../admin/dashboard.php");
                    $_SESSION['adminID'] = $row['adminID'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['adminLoginAttempts'] = 0;

                }
                    

                
            }else{
                
                $_SESSION['adminLoginAttempts']++;
                echo "<script> alert('No such records: Login Tries->". $_SESSION['adminLoginAttempts']."');</script>";

                if($_SESSION['adminLoginAttempts'] >= $_SESSION['adminMaxloginAttempts']){
                    $updateStatus = "UPDATE admin SET status = 'Deactivated' WHERE email = '$email'";
                    $conn->query($updateStatus);
                    echo "<script> alert('You login Attemp Reached Out. Account will be Temporary Deactivated');</script>";
                    $_SESSION['adminLoginAttempts'] = 0;
                }
                header("Refresh: 0; URL = adminloging.php");

            }

            
    
            
                    
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/adminloging.css">
    <title>Admin Loging</title>
</head>
<body>
    <?php include("header.php"); ?>



    <div class="container">
        <img src="images/boat.webp" alt="">
        <div class="wrap">
            <div class="formwrap">
                <div class="imgwrap">
                </div>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <div class="background">
                        <p>Log In</p>
                        <div class="inputs">
                            <label for="email">Username</label>
                            <input type="email" name="email" id="email" placeholder="Email" autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required >
                        </div>
        
                        <div class="inputs">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <!-- <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> -->
                        </div>
        
                        <div class="inputs">
                            <input type="submit" name="submit" value="Log In">
                        </div>
                    </div>
                    

                </form>
            </div>
            
        </div>
    </div>
    
</body>
</html>