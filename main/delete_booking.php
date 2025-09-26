<?php
include_once("../admin/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bookingID'])) {
        $bookingID = $_POST['bookingID'];

        // Delete the booking
        $sqlDelete = "DELETE FROM booking WHERE bookingID = '$bookingID'";

        if ($conn->query($sqlDelete)) {
            echo "<script>alert('Booking deleted successfully');</script>";
            header("Location:user_profile.php"); // Redirect back to the profile page
        } else {
            echo "Error deleting booking: " . $conn->error;
        }
    }
} else {
    echo "Invalid request!";
}
?>
