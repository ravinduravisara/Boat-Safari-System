
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/deniedpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denies</title>
</head>
<body class= "Denied">
    <h1>403 Forbidden</h1>
    <p>Access Denied</p>
    <h6>Wait till you be Redirected to login page</h6>
   <?php
    header("Refresh: 2;URL = ../main/loging_selector_page.php");

   
   
   ?>
    
</body>
</html>
