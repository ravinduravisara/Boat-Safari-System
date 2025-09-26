<?php
    include_once("../admin/config.php");

    $id = $_GET['safari_id'];
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
    <link rel="stylesheet" href="css/tourView.css">
    
    <title>Tours View</title>
</head>

<body>

    <?php include("header.php"); ?>
    
    <div class="container">

        <div class="wrap">
            <div class="tourwrap">
                <?php
                    $sql = "SELECT * FROM msafari WHERE Sid = '$id'";
                    $result = $conn->query($sql);
                    $row = $result -> fetch_assoc();
                    
                ?>
                <div class="images">
                   <img src="images/t1.jpeg" width ="800" height="400">
                   <img src="images/t2.jpeg" width ="400" height="200">
                   <!-- <img src="images/t3.jpeg" width ="400" height="200"> -->
                 </div>
                <div class="description">
                    <?php
                        echo '<p>'.$row['Sdescription'].'</p>';
                    ?>
                   
                </div>
                <div class="price">
                    <?php
                        echo '<p>Price: '.$row['Sprice'].'</p>';
                    ?>
                </div>

                <?php
                    echo '<a href="reservation.php?id='.$row['Sid'].'"> <button type="submit" value="Submit" >View </button></a><br>';
                ?>
              
            </div>
        </div>
    </div>
    
    
    <?php
    include_once("footer.php");
    ?>
</body>
</html>