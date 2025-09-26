<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="./css/signup.css">
    
    <title>Sign Up</title>
</head>

<body>

    <?php include("header.php"); ?><br><br>
    
   <div class="container">

      <div class="wrap">
 
        <form action="createaccount.php" method="post">
            <h1>Sign Up</h1>
            <div class="form">
               
                  <label for="firstname">First Name</label>
                  <input type="text" placeholder="Enter First name" id="firstname" name="fname" required>
               
                 <label for="lastname"> Last Name</label>
                  <input type="text" placeholder="Enter Last name" id="lastname" name="lname" required>
               
                 <label for="email">Email</label>
                 <input type="email" placeholder="Enter Email" id="email" name="email" required>
               
                 <label for="phonenumber">Phone number</label>
                 <input type="number" placeholder="Enter Phone number" id="phoneNum" name="cnumber" required>
               
                 <label for="address">Address</label>
                 <input type="text" placeholder="Enter Address" id="address" name="Address" required>
               
                 <input type="radio"  id="male" name="Gender" value="male">
                 <span id="male">Male</span>
                 
                 <input type="radio" id="female" name="Gender" value="female">
                  <span id="female">Female</span>

                 <label for="password">Password</label>
                 <input type="password" placeholder="Enter Password" id="psw" name="pwd" required>
              
                 <label for="confirm password">Confirm Password</label>
                 <input type="password" placeholder="Confirm Password" id="psw-confirm" name="confirmpsw" required>
              
            </div>
          
       
         <button type="submit" value="Submit">Submit</button><br>
         
         <hr>
         <p>Already have an account? <a href="login.php">Login here</a></p>
       </form> 
      </div>
   </div>
   <script>
document.querySelector('form').addEventListener('submit', function(e) {
    var password = document.getElementById('psw').value;
    var confirmPassword = document.getElementById('psw-confirm').value;
    if (password !== confirmPassword) {
        e.preventDefault(); // Prevent form submission
        alert("Passwords do not match.");
    }
});
</script>
         
    
   
</body>

</html>