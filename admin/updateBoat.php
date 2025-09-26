<?php

    include_once("config.php");
    include_once("sessionAdmin.php");

        $id = $_GET['updateid'];
        // $prefix = str_split($id);
    
    if(isset($_POST['submit'])){
        $blic = $_POST['blic'];
        $bname = $_POST['bname'];
        $bmodel = $_POST['model'];
        $bcapacity = $_POST['cap'];
        $blength = $_POST['length'];
        $bweight = $_POST['weight'];
        
        

        $image_name = $_FILES['b_image']['name'];//return the name of the image or file
        $image_size = $_FILES['b_image']['size'];//return the name of the image or file in bytes
        $image_tmp_name = $_FILES['b_image']['tmp_name'];//return the temp name of the image or file
        $image_folder = '../uploads/Boats_img/'.basename($image_name);//image destination
        $image_extension = strtolower(pathinfo($image_folder, PATHINFO_EXTENSION));//return the extension of the file or image strtolower

        $sql = "UPDATE boat SET b_license_no='$blic', b_name='$bname', b_model='$bmodel', b_capacity='$bcapacity', b_length='$blength', b_weight='$bweight' WHERE b_id='$id'";
        $result = $conn->query($sql);

        if($result){
            echo "<script> alert('Boat Updated Successfully');</script>";
            header("Refresh: 0; URL = updateBoat.php?updateid=$id");
        }else{
            echo "<script> alert('Boat Not Updated');</script>";
        }

        if(!empty($image_name)){
            if($image_extension == "jpg" || $image_extension == "png" || $image_extension == "jpeg" || $image_extension == "gif"){
                if($image_size <= 5000000){
                    if(move_uploaded_file($image_tmp_name, $image_folder)){
                        $sql = "UPDATE boat SET b_image='$image_name' WHERE b_id='$id'";
                        $conn->query($sql);
                        echo "<script> alert('Boat Image Updated Successfully');</script>";
                        header("Refresh: 0; URL = updateBoat.php?updateid=$id");
                    }else{
                        echo "<script> alert('Image not uploaded');</script>";
                    }
                }else{
                    echo "<script> alert('Image size is too large');</script>";
                }
    
            }
        }else{
            echo "<script> alert('Please select an image to update the image');</script>";
        }
        
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
    <link rel="stylesheet" href="css/updateBoat.css">
    
    
    
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
    <title>Boat Management</title>
</head>
<body>
    <div class="container">

        <?php include_once("leftPanel.php"); ?>

        <div class="right_panel">

            <div class="upper_panel">
                <div class="upper_panel_left">
                    <h6>Manage Boats</h6>
                </div>

                <?php include_once("upperPanelRight.php"); ?>

            </div>
    

            <div class="middle_panel">
                <div class="left_box">
                    
                        
                    <?php
                        

                        

                        $sql = "SELECT * FROM boat WHERE b_id = '$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        
                        
                        $bName = $row['b_name'];
                        echo "<p id='left-top'>".$bName." details </p>";
                    ?>

                    <div class="profile">

                        <div class="pImg">
                            <?php 

                                
                              if($row['b_image'] == NULL){
                                echo "<img src='../uploads/Boats_img/boat_default.png' alt='profile'>";
                              }else{
                                echo "<img src='../uploads/Boats_img/".$row['b_image']."' alt='profile'>";
                              }
                                
                            ?>
                            
                        </div>
                        
                        <div class="vl" id="vl"></div>

                        <div class="details">

                            <div class="detBox">
                                <p>License No:<?php echo " " .$row['b_license_no'] ?></p>
                            </div>
                            
                            <div class="detBox">
                                <p>Boat Name:<?php echo " " .$row['b_name'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Model:<?php echo " " .$row['b_model'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Capacity:<?php echo " " .$row['b_capacity'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Length:<?php echo " " .$row['b_length'] ?></p>
                            </div>

                            <div class="detBox">
                                <p>Weight:<?php echo " " .$row['b_weight'] ?></p>
                            </div>


                            

                        </div>

                    </div>
                   

                    
                     
                </div>

                <div class="right_box">
                
                    <p>Update <?php echo $bName; ?></p>
                    <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
                        <div class="topwrap">
                            <div class="fwrap">
                                <label for="blic">Boat License</label><br>
                                <input type="text" name="blic" id="blic" value="<?php echo $row['b_license_no']?>" >
                            </div>
                            <div class="lwrap">
                                <label for="bname">Boat name</label><br>
                                <input type="text" name="bname" id="bname" value="<?php echo $row['b_name']?>">
                            </div>
                        </div>

                        <div class="otherwrap">
                            <label for="model">Model</label><br>
                            <input type="text" name="model" id="model" value="<?php echo $row['b_model']?>"><br>
                            <label for="cap">Capacity</label><br>
                            <input type="number" name="cap" id="cap" value="<?php echo $row['b_capacity']?>"><br>
                            <label for="length">Length</label><br>
                            <input type="text" name="length" id="length" value="<?php echo $row['b_length']?>"><br>
                            <label for="weight">weight</label><br>
                            <input type="text" name="weight" id="weight" value="<?php echo $row['b_weight']?>"><br>
                            
                            <div class="btnwrap">
                                <label for="b_image" id="upload">Upload a Image</label>
                                <input type="file" id="b_image" name="b_image" >        
                            </div>

                            <input type="submit" value="Update" id="sbt" name="submit"><br>
                        </div>
                                  
                    </form>
                            
                </div>
                
                                       
                 
            </div>
        </div>
        
    </div>
   

    
   <script src="adminindex.js"></script>
</body>
</html>