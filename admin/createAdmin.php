<?php
    include_once("config.php");
    
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $cnumber = $_POST['cNo'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];

        if(empty($fname) || empty($lname) || empty($email) || empty($cnumber) || empty($pwd) || empty($cpwd)){
            echo "<script> alert('Please fill all the fields');</script>";
            header("Refresh: 0; URL = manageUsers.php");
        }else{
            //to check if the email and password exist in the data base
            $existSql = "SELECT * FROM admin WHERE email = '$email' and pwd = '$pwd'"; 
            $result2 = $conn->query($existSql);

            if($result3->num_rows > 0){
                echo "<script> alert('Admin Already Exists');</script>";
                header("Refresh: 0; URL = manageUsers.php");

            }else if($pwd == $cpwd){

                $prefix = "A";//ADMIN USER ID PREFIX
                $last_db_id = "SELECT adminID FROM admin ORDER BY adminID DESC LIMIT 1";//check thee last id in the database
                $result3 = $conn->query($last_db_id);

                if($result3->num_rows > 0){
                    $row = $result3->fetch_assoc();
                    $lastID = $row['adminID'];//save last id in the database to a variable A001(EXAMPLE)
                    $incNumber = intval(substr($lastID, 1));//First remove the A(prefix) from the last id and then convert it into a intereger 1 MEAN A001 WILL BECOME 001 IF WE USE 2 IT WILL BECOME 01
                    $incNumber = $incNumber + 1;//inTval will convert string to int and substr will cut the string
                }else{
                    $incNumber = 1;
                }

                $adminID = $prefix . sprintf("%03d", $incNumber);

                
                $sql = "INSERT INTO admin(adminID, fname, lname, email, pwd, cnumber, img, status) VALUES ('$adminID','$fname', '$lname', '$email', '$pwd', '$cnumber', '', 'Activated')";
                //$result = mysqli_query($conn, $sql); //procedual method
                $result = $conn->query($sql); //oop method

                if($result){
                    echo "<script> alert('Admin Created Successfully');</script>";
                    header("Refresh: 0; URL = manageUsers.php");
                    
                }else{
                    echo "<script> alert('Admin Creation Failed');</script>";
                    header("Refresh: 0; URL = manageUsers.php");
                }
            }else{
                echo "<script> alert('Password Not Matched');</script>";
                header("Refresh: 0; URL = manageUsers.php");
            }

        }
        
        
    }else{
        echo "<script> alert('Please Click Submit Button');</script>";
        header("Refresh: 0; URL = manageUsers.php");
    }

    $conn->close();
?>
