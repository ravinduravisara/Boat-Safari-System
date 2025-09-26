<?php
    include_once("config.php");
    include_once("sessionAdmin.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/manageBoat.css">
     <!-- This are icon for dash board -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- This are icon for dash board -->
    
    <!-- scroll reveal effect -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- scroll reveal effect -->
    <script src="https://unpkg.com/scrollreveal"></script>
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
                    <h6>All Boats</h6>

                    <div class="tableContainer">
                        <table>
                            <tr>
                                <th>Boat ID</th>
                                <th>Boat License No</th>
                                <th>Boat Name</th>
                                <th>Capacity</th>
                                <th></th>
                            </tr>
                            

                        
                            <?php
                                $sql = "SELECT * FROM boat";
                                    
                                $result = $conn->query($sql);
                        
                        
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        $b_license_no = $row['b_license_no'];
                                        $b_name = $row['b_name'];
                                        $b_model = $row['b_model'];
                                        $b_capacity = $row['b_capacity'];
                                        $b_length = $row['b_length'];
                                        $b_weight = $row['b_weight'];
                                        $b_id = $row['b_id'];
                                            
                                    
                                        echo "
                                            
                                            <tr>
                                                <td>$b_id</td>
                                                <td>$b_license_no</td>
                                                <td>$b_name</td>
                                                <td>$b_capacity</td>
                                                <td> 
                                                    <div class='opBtns'>
                                                        <button id='vwBtn'><a href='updateBoat.php?updateid=".$b_id."'>View</a></button>
                                                        <button id='dlBtn' onclick='return confirmDelete()'><a href='deleteBoat.php?deleteid=".$b_id."'>Delete</a></button>
                                                    </div>
                                                </td>
                                            </tr>";
                                                
                                    }
                                }else{
                                    echo "<td>Empty rows!!</td>";
                                }

                            ?>



                        </table> 
                    </div>                         
                </div>

                <div class="right_box">
                    <p>Add new boat</p>
                    
                    <div class="fieldsWrap">
                        <form method="POST" action="addBoat.php" enctype="multipart/form-data">

                            <div class="topwrap">
                                <div class="fwrap">
                                    <label for="b_license_no">Boat License</label><br>
                                    <input type="text" name="b_license_no" id="b_license_no">
                                </div>

                                <div class="lwrap">
                                    <label for="b_name">Boat name</label><br>
                                    <input type="text" name="b_name" id="b_name">
                                </div>
                            </div>

                            <div class="otherwrap">
                                <label for="b_model">Model</label><br>
                                <input type="text" name="b_model" id="b_model"><br>

                                <label for="b_capacity">Capacity</label><br>
                                <input type="text" name="b_capacity" id="b_capacity"><br>

                                <label for="b_length">Length</label><br>
                                <input type="text" name="b_length" id="b_length" placeholder="20m"><br>

                                <label for="b_weight">Weight</label><br>
                                <input type="text" name="b_weight" id="b_weight" placeholder="20Kg"><br>

                                <label for="b_image" id="b_image">Upload Image</label>
                                <input type="file" name="b_image" id="b_image">

                                <input type="submit" name="submit" id="submit">
                            </div>
                        </form>
                    </div>        
                </div>    
            </div>
        </div>
        
    </div>

    <script src="adminindex.js"></script>
  
</body>
</html>