<?php
    include_once("config.php");

    if(isset($_GET['deleteid'])){
      $id = $_GET['deleteid'];

      $sql = "DELETE FROM boat WHERE b_id = '$id'";
      $result = $conn->query($sql);
       
      if($result)
      {
        echo "<script> alert('Deletion Successfull');</script>";
        header("Refresh: 0; URL = manageBoat.php");
      }
      else
      {
        echo "<script> alert('Deletion Failed');</script>";
        header("Refresh: 0; URL = manageBoat.php");
      }
    }

    $conn->close();
?>