<?php

    include_once("config.php");
    include_once("sessionAdmin.php");
    

    $id = $_GET['updateid'];
    

    if(isset($_POST['submit'])){
        $Sname = $_POST['Sname'];
        $location = $_POST['Slocation'];
        $price = $_POST['Sprice'];
        $date = $_POST['Sdate'];
        $description= $_POST['Sdescription'];

        $sql = "UPDATE msafari SET Sname='$Sname', Slocation='$location', Sprice='$price', Sdate='$date', Sdescription='$description' WHERE Sid='$id'";
        $conn->query($sql);
        echo "<script> alert('Update Successfully');</script>";
        header("Refresh: 0; URL = updateSafari.php?updateid=$id");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="manageUsers.css"> -->
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/updateSafari.css">
    
    
    
     <!-- This are icon for dash board -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        
    </style>
    
    <!-- This are icon for dash board -->
    
    <!-- scroll reveal effect -->
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <!-- scroll reveal effect -->
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <title>User Management</title>
</head>
<body>
    <div class="container">

        <?php include_once("leftPanel.php"); ?>

        <div class="right_panel">

            <div class="upper_panel">
                <div class="upper_panel_left">
                    <h6>Update Safari Details</h6>
                </div>

                <?php include_once("upperPanelRight.php"); ?>

            </div>
    

            <div class="middle_panel">
                <div class="left_box">
                    <?php
                        

                        

                        $sql = "SELECT * FROM msafari WHERE Sid = '$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        
                        
                        $Name = $row['Sname'];
                        echo "<h6>".$Name."</h6>";
                    ?>

                    <div class="profile">

                        

                        <div class="details">

                            <div class="detBox">
                                <p>Safari Name:<?php echo " " .$row['Sname'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Location:<?php echo " " .$row['Slocation'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Price:<?php echo " " .$row['Sprice'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Date:<?php echo " " .$row['Sdate'] ?></p>
                            </div>
                            <div class="detBox">
                                <p>Description:<?php echo " " .$row['Sdescription'] ?></p>
                            </div>

                        </div>

                    </div>
        

                </div>

                    
                   

                    
                     
            

                <div class="right_box">
                
                    <p>Update Safari Details</p>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                       
                        <label for="Sname">Safari Name:</label><br>
                        <input type="text" id="Sname" name="Sname" value="<?php echo $row['Sname']?>"><br>
                        <label for="Slocation">Location:</label><br>
                        <input type="text" id="Slocation" name="Slocation" value="<?php echo $row['Slocation']?>"><br>
                        <label for="Sprice">Price LKR:</label><br>
                        <input type="text" id="Sprice" name="Sprice" value="<?php echo $row['Sprice']?>"><br>
                        <label for="Sdate">Date:</label><br>
                        <input type="date" id="Sdate" name="Sdate" value="<?php echo $row['Sdate']?>"><br>
                        <label for="Sdescription">Description::</label><br>
                        <input type="text" id="Sdescription" name="Sdescription"  value="<?php echo $row['Sdescription']?>"><br>

                        <input type="submit" value="Submit" id="sbt" name="submit"><br>

                    </form>

                </div>
                    
                        
                                  
                  
                            
                </div>
                
                                       
                 
            </div>
        </div>
        
    </div>
    

    
   <script src="adminindex.js"></script>
</body>
</html>