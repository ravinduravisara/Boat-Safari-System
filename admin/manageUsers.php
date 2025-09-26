<?php
    include_once("config.php");
    include_once("sessionAdmin.php");
//     session_start();
//     if($_SESSION['adminID'] == ""){
//         header("LOCATION: ../main/deniedpage.php");
//         echo "<script> alert('Please Login');</script>";
//         // header("location: ../main/adminloging.php");
//         die();
        
//     }else{
//         $adminID = $_SESSION['adminID'];
//         $ufname = $_SESSION['fname'];
//         $ulname = $_SESSION['lname'];
//         $userName = $ufname . " " . $ulname;
//     }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manageUsers.css">
    <link rel="stylesheet" href="css/common.css">
    
    
     <!-- This are icon for dash board -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
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
                    <h6>Manage Users</h6>
                </div>

                <?php include_once("upperPanelRight.php"); ?>

            </div>

            <div class="middle_panel">
                <div class="left_box">
                        <h6>All System Users</h6>
                                    
                        <div class="grid">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>Operation</th>
                                </tr>
                                <?php
                        
                                    $sql = "SELECT * FROM admin";
                            
                                    $result = $conn->query($sql);
                        
                        
                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            $aID = $row["adminID"];
                                            $fname = $row["fname"];
                                            $lname = $row["lname"];
                                            $email = $row["email"];
                                            $cnumber = $row["cnumber"];
                                            
                                    
                                            echo '
                                            
                                                    <tr>
                                                        <td>' . $aID. '</td>
                                                        <td>' . $fname. '</td>
                                                        <td>' . $lname. '</td>
                                                        <td>' . $cnumber. '</td>
                                                        <td> 
                                                            <div class="opBtns">
                                                                <button id="vwBtn"><a href="updateUsers.php?updateid='.$aID.'">View</a></button>
                                                                <button id="dlBtn" onclick="return confirmDelete()"><a href="deleteAdmin.php?deleteid='.$aID.'">Delete</a></button>
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                
                                        }
                                    }else{
                                        echo "<td>Empty rows!!</td>";
                                    }

                                    $sql2 = "SELECT * FROM user";
                            
                                    $result2 = $conn->query($sql2);
                        
                        
                                    if($result2->num_rows>0){
                                        while($row2 = $result2->fetch_assoc()){
                                            $uID = $row2["userID"];
                                            $ufname = $row2["fname"];
                                            $ulname = $row2["lname"];
                                            $uemail = $row2["email"];
                                            $ucnumber = $row2["cnumber"];
                                            
                                    
                                            echo '
                                            
                                                    <tr>
                                                        <td>' . $uID. '</td>
                                                        <td>' . $ufname. '</td>
                                                        <td>' . $ulname. '</td>
                                                        <td>' . $ucnumber. '</td>
                                                        <td> 
                                                            <div class="opBtns">
                                                                <button id="vwBtn"><a href="updateUsers.php?updateid='.$uID.'">View</a></button>
                                                                <button id="dlBtn" onclick="return confirmDelete()"><a href="deleteAdmin.php?deleteid='.$uID.'">Delete</a></button>
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                
                                        }
                                    }else{
                                        echo "<td>Empty rows!!</td>";
                                    }

                                ?>

                            </table>

                        </div>
                        
                       
                        
                                                    
                    </div>

                <div class="right_box">
                    <p>Create Admin Account</p>
                    <form method="POST" action="createAdmin.php">
                        <div class="namewrap">
                            <div class="fwrap">
                                <label for="fname">First name</label><br>
                                <input type="text" name="fname" id="fname" placeholder="First Name" required><br>
                            </div>
                            <div class="lwrap">
                                <label for="lname">Last name</label><br>
                                <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="otherwrap">
                            <label for="email">Email</label><br>
                            <input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required><br>
                            <label for="cNo">Contact No</label><br>
                            <input type="number" name="cNo" id="cNo" placeholder="Contact Number"><br>
                            <label for="pwd">Password</label><br>
                            <input type="password" name="pwd" id="pwd" placeholder="Password" ><br>
  
                            <label for="cpwd">Confirm Password</label><br>
                            <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" >
  
                            <span id="err">Password does not matched</span>
                            <input type="checkbox" id="checkbox"><span class="pwdtxt">Show Password</span>
                            
                                
                            <input type="submit" value="Create" id="sbt" name="submit"><br>

                        </div>
                                  
                    </form>
                            
                </div>
                
                                       
                 
            </div>
        </div>
        
    </div>

    
    <script src="adminindex.js"></script>
</body>
</html>