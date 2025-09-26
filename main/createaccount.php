
<?php

      include_once("../admin/config.php");
      $fname=$_POST['fname']; 
      $lname=$_POST['lname']; 
      $email=$_POST['email'];
      $cnumber=$_POST['cnumber'];
      $Address=$_POST['Address'];
      $pwd=$_POST['pwd'];
      $gender=$_POST['Gender'];

      //user id generation

      $prefix = "U";//ADMIN USER ID PREFIX
      $last_db_id = "SELECT userID FROM user ORDER BY userID DESC LIMIT 1";//check thee last id in the database
      $result3 = $conn->query($last_db_id);

      if($result3->num_rows > 0){
        $row = $result3->fetch_assoc();
        $lastID = $row['userID'];//save last id in the database to a variable A001(EXAMPLE)
        $incNumber = intval(substr($lastID, 1));//First remove the A(prefix) from the last id and then convert it into a intereger 1 MEAN A001 WILL BECOME 001 IF WE USE 2 IT WILL BECOME 01
        $incNumber = $incNumber + 1;//inTval will convert string to int and substr will cut the string
      }else{
        $incNumber = 1;
      }

      $userID = $prefix . sprintf("%03d", $incNumber);

      //user id generation
      
      
      
      $sql = "INSERT INTO user(userID,fname,lname,email,pwd,cnumber,Address,gender)
              VALUES('$userID','$fname','$lname','$email','$pwd','$cnumber','$Address','$gender')";
              if($conn->query($sql)){
                echo"Inserted successfully";
                header("Location: loging_selector_page.php");
              }
              else{
               echo"Error:".$conn->error;
              }
     $conn->close();
      
  
?>