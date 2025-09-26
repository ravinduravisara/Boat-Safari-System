<?php
//Linking the configuration file
require 'config.php';

if(isset($_POST['submit']))
{
  $b_license_no = $_POST['b_license_no'];
  $b_name = $_POST['b_name'];
  $b_model = $_POST['b_model'];
  $b_capacity = $_POST['b_capacity'];
  $b_length = $_POST['b_length'];
  $b_weight = $_POST['b_weight'];

  $b_image = $_FILES['b_image']['name'];
  $b_image_tmp = $_FILES['b_image']['tmp_name'];
  $b_image_size = $_FILES['b_image']['size'];
  $_img_folder = "../Uploads/boats_img/".basename($b_image);
  $_img_extension = strtolower(pathinfo($_img_folder,PATHINFO_EXTENSION));

  $prefix = "B";
  $last_db_id = "SELECT b_id FROM boat ORDER BY b_id DESC LIMIT 1";
  $result3 = $conn->query($last_db_id);

  if($result3->num_rows > 0){
    $row = $result3->fetch_assoc();
    $lastID = $row['b_id'];
    $incNumber = intval(substr($lastID, 1));
    $incNumber = $incNumber + 1;
  }
  else
  {
    $incNumber = 1;
  }

  $bID = $prefix . sprintf("%03d", $incNumber);

  if(empty($b_license_no) || empty($b_name) || empty($b_model) || empty($b_capacity) || empty($b_length) || empty($b_weight))
  {
    echo "<script>alert('Please fill all the fields')</script>";
    header("Refresh: 0; URL = manageBoat.php");
  }else
  {
    $sql = "INSERT INTO boat(b_id, b_license_no,b_name,b_model,b_capacity,b_length,b_weight) 
          VALUES('$bID','$b_license_no','$b_name','$b_model','$b_capacity','$b_length','$b_weight')";

    if($conn->query($sql))
    {
      echo "<script>alert('Boat added successfully')</script>";
      header("Refresh: 0; URL = manageBoat.php");
    }
    else{
      echo "Error: ".$conn->error;
    }

  }

  

  if(!empty($b_image))
  {
    if($_img_extension == "jpg" || $_img_extension == "png" || $_img_extension == "jpeg")
    {
      if($b_image_size < 5000000)
      {
        if(move_uploaded_file($b_image_tmp, $_img_folder))
        {
          $sql = "UPDATE boat SET b_image = '$b_image' WHERE b_id = '$bID'";
          $result = $conn->query($sql);
          if($result)
          {
            echo "<script>alert('Image uploaded successfully')</script>";
          }
          else
          {
            echo "<script>alert('Image upload failed')</script>";
          }
        }
        else
        {
          echo "<script>alert('Image upload failed')</script>";
        }
      }
      else
      {
        echo "<script>alert('Image size must be less than 5MB')</script>";
      }
    }
    else
    {
      echo "<script>alert('Image format must be jpg, jpeg or png')</script>";
    }
  }
  else
  {
    echo "<script>alert('Please select an image')</script>";
  }

  
}

$conn->close();
?>
