<?php

 include_once("../admin/config.php");

$ID = $_GET['updateid'];    
if (isset($_POST['update'])) {

  $fname = $_POST['fname']; 
  $lname = $_POST['lname']; 
  $email = $_POST['email'];
  $cnumber = $_POST['cnumber'];
  $Address = $_POST['Address'];
  $pwd = $_POST['pwd'];

  // SQL query to update user details
  $sql = "UPDATE user SET fname='$fname', lname='$lname', email='$email', pwd='$pwd', cnumber='$cnumber', Address='$Address'
          WHERE userID ='$ID'";

  if ($conn->query($sql) === TRUE) {
      echo "Updated successfully";
  } else {
      echo "Error: " . $conn->error;
  }
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
    <link rel="stylesheet" href="css/update.css">
   
    
    <title>User Profile</title>
</head>

<body>

    <?php include("header.php"); ?><br><br><br>
    
    <div class="container">
        <div class="wrap">
            <div class="tourwrap">
                <h2>Account Details</h2>
                <div class="profilepic">
                    <img src="images/userprofilepic.jpg" alt="User Profile Picture">
               </div>
                <div class="form">
                 <form action="" method="post">
                 <?php
                   $query = "SELECT * FROM user WHERE userID = '$ID'";
                   $result = mysqli_query($conn, $query);
                   $row = mysqli_fetch_assoc($result);
                   ?>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br><br>

                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" value="<?php echo $row['lname']; ?>"><br><br>

                    <label for="add">Address</label>
                    <input type="text" name="Address" value="<?php echo $row['Address']; ?>"><br><br>

                    <label for="number">Phone Number</label>
                    <input type="text" name="cnumber" value="<?php echo $row['cnumber']; ?>"><br><br> 

                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>

                    <label for="cpsw">Current Password</label>
                    <input type="password" name="pwd" value="<?php echo $row['pwd']; ?>"><br><br> 

                    <!-- Submit button -->
                    <button type="submit" name="update">Update Account</button>
                    </form>
                </div>

                <div class="buttons">
                    <div class="deletebtn">
                        <a href='delete.php?deleteid=<?php echo "$ID"?>'>
                            <button type="button">Delete Account</button>
                        </a>
                    </div>
               </div>
             </div>
        </div>
    </div>
</body>
</html>
