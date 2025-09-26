<?php
    include_once("config.php");
    
    if(isset($_POST['submit'])){
        $Sname = $_POST['Sname'];
        $Slocation = $_POST['Slocation'];
        $Sprice = $_POST['Sprice'];
        $Sdate = $_POST['Sdate'];
        $Sdescription = $_POST['Sdescription'];
        
        // Empty field validation
        if(empty($Sname) || empty($Slocation) || empty($Sprice) || empty($Sdate) || empty($Sdescription)){
            echo "<script> alert('All fields are required');</script>";
            header("Refresh: 0; URL = manageSafari.php");
            exit();
        }
       

        

        $prefix = "S";
        $last_db_id = "SELECT Sid FROM msafari ORDER BY Sid DESC LIMIT 1";
        $result3 = $conn->query($last_db_id);

        if($result3->num_rows > 0){
            $row = $result3->fetch_assoc();
            $lastID = $row['Sid'];
            $incNumber = intval(substr($lastID, 1));
            $incNumber = $incNumber + 1;
        }else{
            $incNumber = 1;
        }

        $Sid = $prefix . sprintf("%03d", $incNumber);

        $sql = "INSERT INTO msafari(Sid,Sname,Slocation,Sprice,Sdate,Sdescription) VALUES ('$Sid','$Sname', '$Slocation', '$Sprice', '$Sdate','$Sdescription')";
            
        $result = $conn->query($sql); 

        if($result){
            echo "<script> alert('Safari added successfully');</script>";
            header("Refresh: 0; URL = manageSafari.php");
                
        }else{
            echo "<script> alert('Safari Creation Failed');</script>";
            header("Refresh: 0; URL = manageUsers.php");
        }
        
    }else{
        echo "<script> alert('Please Click Submit Button');</script>";
        header("Refresh: 0; URL = manageUsers.php");
    }

    $conn->close();
?>