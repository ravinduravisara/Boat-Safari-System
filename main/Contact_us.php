<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/contact_us.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous"> -->
<title>Contact us</title>
</head>


<body>


	<?php include("header.php"); ?>
		<div class="container">
		<div class="wrap">
			<?php
				include ("../admin/config.php");

				if(isset($_POST['submit']))
				{
					$Name = $_POST['Name'];
					$Email = $_POST['Email'];
					$Msg = $_POST['message'];

					$prefix = "IN";//ADMIN USER ID PREFIX
					$last_db_id = "SELECT inquiryId FROM inquiry_tb ORDER BY inquiryId DESC LIMIT 1";//check thee last id in the database
					$result3 = $conn->query($last_db_id);

					if($result3->num_rows > 0){
						$row = $result3->fetch_assoc();
						$lastID = $row['inquiryId'];//save last id in the database to a variable A001(EXAMPLE)
						$incNumber = intval(substr($lastID, 2));//First remove the A(prefix) from the last id and then convert it into a intereger 1 MEAN A001 WILL BECOME 001 IF WE USE 2 IT WILL BECOME 01
						$incNumber = $incNumber + 1;//inTval will convert string to int and substr will cut the string
					}else{
						$incNumber = 1;
					}

					$inquiryId = $prefix . sprintf("%03d", $incNumber);

					$sql = "INSERT INTO inquiry_tb (inquiryId, Name, Email, Message) VALUES ('$inquiryId','$Name', '$Email', '$Msg')";
					$result = $conn->query($sql);
					if($result == true)
					{
						echo "<script>alert('Your Inquiry has been sent successfully!');</script>";
					}
					else
					{
						echo "<script>alert('Your Inquiry has not been sent!');</script>";
					}

					$conn->close();
				}

				
			
			?>
			<Center>
			<div class="Container_2">
				<form id="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
				<h1 class="subheading">Contact Us</h1>
		
				<p>Welcome to our Boat Safari Management System! We are delighted to assist you. If you have any questions, feedback, or inquiries, please don't hesitate to reach out to our dedicated team. Your satisfaction is our top priority, and we are here to ensure your boat safari experience is unforgettable. Contact us today!</p>
				<h2>We value Your Feedbacks</h2>
				<label for="fname">Name:</label>
				<input type="text" id="Name" name="Name">
				<br>
				<br>
				<label for="Email">Email:</label>
				<input type="text" id="Email" name="Email">
				<br>
				<br>
				<p><center>Message:</center></p>
				<textarea name="message" id="Message" rows="10" cols="30" placeholder="Type here"></textarea>
				<br>
				<br>
				<input type="submit" name="submit" class="button" value="Submit">
				<nav>
					<div class="container_img">
					<img src ="images/icons/Facebook.ico" height="40" width="40">
					<img src ="images/icons/whatsapp.ico" height="40" width="40">
					<img src ="images/icons/Insta.ico" height="40" width="40">
					<img src ="images/icons/twitter.ico" height="40" width="40">
				
					</div>
				</nav>
			</form>

			</div>
			</Center>
	
			
		</div>

	</div>

	
	
</body>
</html>