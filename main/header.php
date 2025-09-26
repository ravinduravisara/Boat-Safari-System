<?php

    $isSessionActive = (session_status() == PHP_SESSION_ACTIVE);
    if(!$isSessionActive){
        session_start();
    } 
?>
<header class = "header">
    
    <img  src="./images/icons/img.jpg" class ="logo"  height="100px" width="250px"/>
    
    <nav class="nav-items">
        <a href="index.php" >Home</a>
        <a href="AboutUs.php">About Us </a>
        <a href="Contact_us.php">Contact</a>
        <a href="gallery.php">Gallery</a>
        <a href="tours.php">Tours</a>

        <?php

            if(isset($_SESSION["userID"])){
                echo "<a href='user_profile.php'>".$_SESSION["fname"]."</a>";
                echo "<a href='../admin/logout.php'>Logout</a>";
            }else{
                echo "<a href='loging_selector_page.php'>Login</a>";
                echo "<a href='signup.php'>Sign Up</a>";
            }
            
        ?>
        <!-- <a href="loging_selector_page.php">Login</a>
        <a href="signup.html">Sign Up</a> -->
    </nav>

</header>