<?php
    include_once("config.php");
    include_once("sessionAdmin.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- This are icon for dash board -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- This are icon for dash board -->

    <!-- scroll reveal effect from scroll reveal js-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- scroll reveal effect from scroll reveal js-->
    <title>Admin</title>
</head>
<body>
    <div class="container">

        <?php include_once("leftPanel.php"); ?>

        <div class="right_panel">

            
            <div class="upper_panel">
                <div class="upper_panel_left">
                    <h6>Dashboard</h6>
                </div>

            <?php include_once("upperPanelRight.php") ?>

            </div>
            
            <div class="greeting">
                <p class="head">Welcome <?php echo $userName ?></p>
            </div>
            
            <div class="middle_panel">
                <div class="upper_box">
                    <?php
                        $date = date("Y-m-d");

                        

                        function totalUser($connection){// i have pass the connection variable to the function else $conn cannot be used insed the function
                            $sqlUser = "SELECT count(*) AS 'Total user Count' FROM user";
                            $resultUser = $connection->query($sqlUser);
                            $rowUser = $resultUser->fetch_assoc();
                            $totalUser = $rowUser['Total user Count'];
                            return $totalUser;
                        }
                        function totalAdmin($connection){
                            $sqlAdmin = "SELECT count(*) AS 'Total admin Count' FROM admin";
                            $resultAdmin = $connection->query($sqlAdmin);
                            $rowAdmin = $resultAdmin->fetch_assoc();
                            $totalAdmin = $rowAdmin['Total admin Count'];
                            return $totalAdmin;
                        }
                        
                        $systemUsers = totalUser($conn) + totalAdmin($conn);

                        function totalBoat($connection){
                            $sqlBoat = "SELECT count(*) AS 'Total boat Count' FROM boat";
                            $resultBoat = $connection->query($sqlBoat);
                            $rowBoat = $resultBoat->fetch_assoc();
                            $totalBoat = $rowBoat['Total boat Count'];
                            return $totalBoat;
                        }

                        function totalSafari($connection){
                            $sqlSafari = "SELECT count(*) AS 'Total safari Count' FROM msafari";
                            $resultSafari = $connection->query($sqlSafari);
                            $rowSafari = $resultSafari->fetch_assoc();
                            $totalSafari = $rowSafari['Total safari Count'];
                            return $totalSafari;
                        }
                        
                        function totalreservations($connection){
                            $sqlreseravtion = "SELECT count(*) AS 'Total reservation Count' FROM booking";
                            $resultreseravtion = $connection->query($sqlreseravtion);
                            $rowreseravtion = $resultreseravtion->fetch_assoc();
                            $totalreseravtion = $rowreseravtion['Total reservation Count'];
                            return $totalreseravtion;
                        }
                        
                        

                    ?>

                    <div class="box">
                        <h6>Total Bookings</h6>
                        <p class="val"><?php echo totalreservations($conn)?></p>
                        <p class="date"><?php echo $date?></p>
                    </div>
                    <div class="box">
                        
                        <h6>Total Users</h6>
                        <p class="val"><?php echo $systemUsers?></p>
                        <p class="date"><?php echo $date?></p>
                    </div>
                    <div class="box">
                        <h6>Safari Availables</h6>
                        <p class="val"><?php echo totalSafari($conn)?></p>
                        <p class="date"><?php echo $date?></p>
                    </div>
                    <div class="box">
                        <h6>Total Boats</h6>
                        <p class="val"><?php echo totalBoat($conn)?></p>
                        <p class="date"><?php echo $date?></p>
                    </div>
                </div>

                <div class="lower_boxes">
                    
                    <div class="left_box">
                        
                        <h6>Safari Bookings</h6>

                        <div class="grid">

                        
                            <table>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Trip</th>

                                </tr>

                            
                                <?php

                                    $sql = "SELECT  b.bookingID, b.date, u.fname, sf.Sname
                                    FROM booking b, user u, msafari sf
                                    WHERE b.userID = u.UserID AND b.Sid = sf.Sid
                                    order by b.bookingID";
                                                                
                                    $result = $conn->query($sql);


                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            $bID = $row["bookingID"];
                                            $date = $row["date"];
                                            $userName = $row["fname"];
                                            $safariName = $row["Sname"];
                                            

                                            echo '
                                            
                                                    <tr>
                                                        <td>' . $bID. '</td>
                                                        <td>' . $date. '</td>
                                                        <td>' . $userName. '</td>
                                                        <td>' . $safariName. '</td>
                                                        
                                                    </tr>';
                                                
                                        }
                                    }else{
                                        echo "<td>Empty rows!!</td>";
                                    }


                                ?>

                            </table>
                        </div>

                        
                        
                                                
                    </div>

                    <div class="right_box">
                        
                        <h6>Customer Feedback</h6>  
                        
                         <div class="feedBox">
                            <?php

                                $sqlFeed = "SELECT * FROM feedback";
                                $resultFeed = $conn->query($sqlFeed);
                                while($rowFeed = $resultFeed->fetch_assoc()){
                                    $feed = $rowFeed["description"];
                                    $feedUser = $rowFeed["userID"];
                                    $getUser = "SELECT fname FROM user WHERE userID = '$feedUser'";
                                    $resultUser = $conn->query($getUser);
                                    $rowUser = $resultUser->fetch_assoc();
                                    $userName = $rowUser["fname"];

                                    
                                    echo "<div class='feed'>
                                            <h3>$userName</h3>
                                            <p>$feed</p>
                                        </div>";
                                }

                            
                            ?>
                            
                         </div>
                                       
                    </div>


                </div>
                
            </div>
        </div>
        
    </div>
   <!-- scroll reveal effect from scroll reveal js-->
    <script>
        ScrollReveal({
            reset: true,//each and every time the page is refreshed the animation will be be triggered, by reseting true, it will go to its original position when it leave the viewpport
            distance: '60px',//how far the elements moved when the reveal animation is triggered
            duration: 2500,//time taken to complete the reveal animation
            delay: 400//delay before the animation start
        });

        ScrollReveal().reveal('.left_box', {delay: 200, origin: 'left'});// ScrollReveal() is function 
        ScrollReveal().reveal('.right_box', {delay: 200, origin: 'right'});
        ScrollReveal().reveal('.upper_box', {delay: 200, origin: 'top'});
        
    </script>
    <!-- scroll reveal effect from scroll reveal js-->
</body>
</html>