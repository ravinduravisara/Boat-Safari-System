<?php
 include_once("../admin/config.php");
 if (isset($_GET['deleteid']))
 {

    $userID = $_GET['deleteid'];

    $sql = "delete from user where userID = '$userID'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: loging_selector_page.php");
        echo"Data deleted successfully ";
        session_destroy();
        
    }
    else{
        die (mysqli_error($conn));
    }

}

$conn->close();

?>