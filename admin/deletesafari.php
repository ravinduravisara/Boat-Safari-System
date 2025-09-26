<?php
    include_once("config.php");

    if(isset($_GET['deleteid'])){
      $id = $_GET['deleteid'];

      $sql = "DELETE FROM msafari WHERE Sid = '$id'";
      $result = $conn->query($sql);
       
      if($result)
      {
        echo "<script> alert('Deletion Successfull');</script>";
        header("Refresh: 0; URL = manageSafari.php");
      }
      else
      {
        echo "<script> alert('Deletion Failed');</script>";
        header("Refresh: 0; URL = manageSafari.php");
      }
    }

    $conn->close();
?>