<?php
    include_once("config.php");

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $userIdentification = str_split($id);

        if($userIdentification[0] == 'A'){
            $sql = "DELETE FROM admin WHERE adminID = '$id'";
            $result = $conn->query($sql);
        }else if($userIdentification[0] == 'U'){
            $sql = "DELETE FROM user WHERE userID = '$id'";
            $result = $conn->query($sql);
        }
        

        if($result){
            echo "<script> alert('Deletion Successfull');</script>";
            header("Refresh: 0; URL = manageUsers.php");
        }else{
            echo "<script> alert('Deletion Failed');</script>";
            header("Refresh: 0; URL = manageUsers.php");
        }
    }

    mysqli_close($conn);
?>
