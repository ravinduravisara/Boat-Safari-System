<?php
include_once("../admin/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bookingID'])) {
        $bookingID = $_POST['bookingID'];
        
        // Fetch the current booking data
        $sql = "SELECT * FROM booking WHERE bookingID = '$bookingID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $booking = $result->fetch_assoc();
        } else {
            echo "Booking not found!";
            die();
        }
        
        // If the form has been submitted to update the booking
        if (isset($_POST['submitEdit'])) {
            $adults = $_POST['adults'];
            $childrens = $_POST['childrens'];
            $date = $_POST['date'];
            $breakfast = $_POST['breakfast'];
            $lunch = $_POST['lunch'];
            $cnumber = $_POST['cnumber'];

            // Update the booking
            $sqlUpdate = "UPDATE booking SET noOfAdults = '$adults', noOfChild = '$childrens', date = '$date', breakfast = '$breakfast', lunch = '$lunch', cnumber = '$cnumber' WHERE bookingID = '$bookingID'";

            if ($conn->query($sqlUpdate)) {
                echo "<script>alert('Booking updated successfully');</script>";
                header("Location: user_profile.php"); // Redirect back to the profile page
            } else {
                echo "Error updating booking: " . $conn->error;
            }
        }
    }
} else {
    echo "Invalid request!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/edit_booking.css">
</head>
<body>

    <?php include("header.php"); ?><br><br>

    <h2>Edit Your Booking</h2>

    <form action="edit_booking.php" method="post">
        <input type="hidden" name="bookingID" value="<?php echo $bookingID; ?>">

        <label for="date">Booking Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($booking['date']); ?>" required><br>

        <label for="adults">Number of Adults:</label>
        <input type="number" name="adults" value="<?php echo htmlspecialchars($booking['noOfAdults']); ?>" required><br>

        <label for="childrens">Number of Childrens:</label>
        <input type="number" name="childrens" value="<?php echo htmlspecialchars($booking['noOfChild']); ?>" required><br>

        <label for="breakfast">Breakfast:</label>
        <input type="int" name="breakfast" value="<?php echo htmlspecialchars($booking['breakfast']); ?>" required><br>

        <label for="lunch">Lunch:</label>
        <input type="text" name="lunch" value="<?php echo htmlspecialchars($booking['lunch']); ?>" required><br>

        <label for="cnumber">Contact Number:</label>
        <input type="text" name="cnumber" value="<?php echo htmlspecialchars($booking['cnumber']); ?>" required><br>

        <button type="submit" name="submitEdit">Update Booking</button>
    </form>

</body>
</html>
