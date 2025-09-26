<?php
    include_once("../admin/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/tours.css">
</head>
<body>

    <?php include("header.php"); ?>
    <br><br><br><br>
    <br><br>
    
    <div class="container">

        <div class="product-grid">

            <?php
                $sql = "SELECT * FROM msafari";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result -> fetch_assoc()) {
                        echo '<div class="product-card">';
                        echo '<img src="images/tour1.jpg" class="product-image">';
                        echo '<h2 class="product-name">'.$row['Sname'].'</h2>';
                        echo '<p class="product-description">'.$row['Sdescription'].'</p>';
                        echo '<p class="product-price">$'.$row['Sprice'].'</p>';
                        echo '<a href="reservation.php?safari_id='.$row['Sid'] .'"> 
                        <button type="submit" value="Submit" >View </button></a>';
                        
                        
                        echo '</div>';
                    }
                }
            ?>
               
        </div>

    </div>
    
</body>
</html>
