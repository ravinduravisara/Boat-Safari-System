<?php
include_once("../admin/config.php");
session_start();

// Redirect to denied page if user is not logged in
if (!isset($_SESSION['userID']) || empty($_SESSION['userID'])) {
    header("LOCATION: ../main/deniedpage.php");
    echo "<script> alert('Please Login');</script>";
    die();
} else {
    $userID = $_SESSION['userID'];
    $ufname = $_SESSION['fname'];
    $ulname = $_SESSION['lname'];
    $uemail = $_SESSION['email'];
    $ucnumber = $_SESSION['cnumber'];
}

// Handle feedback submission
if (isset($_POST['submitfeed'])) {
    // Sanitizing user input
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // Generate a new feedback ID
    $prefix = "F";
    $last_db_id = "SELECT feedbackId FROM feedback ORDER BY feedbackId DESC LIMIT 1";
    $result3 = $conn->query($last_db_id);

    if ($result3->num_rows > 0) {
        $row = $result3->fetch_assoc();
        $lastID = $row['feedbackId'];
        $incNumber = intval(substr($lastID, 1));
        $incNumber++;
    } else {
        $incNumber = 1;
    }

    $feedbackId = $prefix . sprintf("%03d", $incNumber);

    // Insert the new feedback into the database
    $sql = "INSERT INTO feedback(feedbackId, userID, rate, description)
            VALUES('$feedbackId', '$userID', '$rate', '$feedback')";

    if ($conn->query($sql)) {
        echo "<script>alert('Feedback submitted successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
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
    <link rel="stylesheet" href="css/user_profile.css">
    <title>User Profile</title>
</head>

<body>

    <?php include("header.php"); ?><br><br>

    <div class="container">

        <!-- Sidebar with Profile Info -->
        <div class="sidebar">
            <div class="profile-header">
                <h1>User Profile</h1>
            <div class="profilepic">
                <img src="images/userprofilepic.jpg" alt="User Profile Picture">
            </div>
            <div class="profile-info">
                <h2><?php echo $ufname . " " . $ulname; ?></h2>
                <p><?php echo $uemail; ?></p>
            </div>
            <!-- Section: Action Buttons -->
            <div class="buttons">
                    <div class="updatebtn">
                        <a href='update.php?updateid=<?php echo "$userID" ?>'>
                            <button type="button">Update Account</button>
                        </a>
                    </div>
                    <br>
                    <div class="deletebtn">
                        <a href='delete.php?deleteid=<?php echo "$userID" ?>'>
                            <button type="button">Delete Account</button>
                        </a>
                    </div>
                </div>

            <!-- Social Links -->
            <div class="social-links">
                <ul>
                    <li><a href="#">Website</a></li>
                    <li><a href="#">Github</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                </ul>
            </div>
        </div>
</div>

        <!-- Main Content Section -->
        <div class="main-content">
            <div class="details">
                <h3>Full Name</h3>
                <p><?php echo $ufname . " " . $ulname; ?></p>

                <h3>Email</h3>
                <p><?php echo $uemail; ?></p>

                <h3>Phone Number</h3>
                <p><?php echo $ucnumber; ?></p>

                <h3>Address</h3>
                <p>Bay Area, San Francisco, CA</p>
            </div>

            <!-- Booking Section -->
            <div class="booking-section">
                <h2>Your Bookings</h2>
                <?php
                $booking_query = "SELECT * FROM booking WHERE userID = '$userID'";
                $booking_result = $conn->query($booking_query);

                if ($booking_result->num_rows > 0) {
                    while ($booking = $booking_result->fetch_assoc()) {
                        echo "<div class='booking-item'>";
                        echo "<p><strong>Booking Date:</strong> " . htmlspecialchars($booking['date']) . "</p>";
                        echo "<p><strong>Adults:</strong> " . htmlspecialchars($booking['noOfAdults']) . "</p>";
                        echo "<p><strong>Child:</strong> " . htmlspecialchars($booking['noOfChild']) . "</p>";
                        echo "<p><strong>Breakfast:</strong> " . htmlspecialchars($booking['breakfast']) . "</p>";
                        echo "<p><strong>Lunch:</strong> " . htmlspecialchars($booking['lunch']) . "</p>";
                        echo "<p><strong>Number:</strong> " . htmlspecialchars($booking['cnumber']) . "</p>";

                        echo "<form method='post' action='edit_booking.php'>";
                        echo "<input type='hidden' name='bookingID' value='" . htmlspecialchars($booking['bookingID']) . "'>";
                        echo "<button type='submit' name='editBooking'>Edit Booking</button>";
                        echo "</form>";

                        echo "<form method='post' action='delete_booking.php'>";
                        echo "<input type='hidden' name='bookingID' value='" . htmlspecialchars($booking['bookingID']) . "'>";
                        echo "<button type='submit' name='deleteBooking' onclick=\"return confirm('Are you sure you want to delete this booking?')\">Delete Booking</button>";
                        echo "</div><hr>";
                    }
                } else {
                    echo "<p>No bookings made yet.</p>";
                }
                ?>
            </div>

            <!-- Feedback Section -->
            <div class="feedback-section">
                <h2>Your Feedback</h2>
                <?php
                $feedback_query = "SELECT * FROM feedback WHERE userID = '$userID'";
                $feedback_result = $conn->query($feedback_query);

                if ($feedback_result->num_rows > 0) {
                    while ($feedback = $feedback_result->fetch_assoc()) {
                        echo "<div class='feedback-item'>";
                        echo "<p><strong>Rate:</strong> " . htmlspecialchars($feedback['rate']) . "</p>";
                        echo "<p><strong>Feedback:</strong> " . htmlspecialchars($feedback['description']) . "</p>";
                        echo "<form method='post' action='edit_feedback.php'>";
                        echo "<input type='hidden' name='feedbackId' value='" . htmlspecialchars($feedback['feedbackId']) . "'>";
                        echo "<button type='submit' name='editFeedback'>Edit Feedback</button>";
                        echo "</form>";
                        echo "<form method='post' action='delete_feedback.php'>";
                        echo "<input type='hidden' name='feedbackId' value='" . htmlspecialchars($feedback['feedbackId']) . "'>";
                        echo "<button type='submit' name='deleteFeedback' onclick=\"return confirm('Are you sure you want to delete this feedback?')\">Delete Feedback</button>";
                        echo "</div><hr>";
                        echo "</form>";
                    }
                } else {
                    echo "<p>No feedback submitted yet.</p>";
                }
                ?>
            </div>

            <!-- Feedback Submission Form -->
            <div class="feedback-form">
                <h3>Submit Your Feedback</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <textarea name="feedback" placeholder="Give us your feedback" required></textarea><br><br>
                    <input type="number" name="rate" placeholder="Rate (1-5)" min="1" max="5" required><br><br>
                    <input type="submit" value="Submit Feedback" name="submitfeed">
                </form>
            </div>
        </div>

    </div>

</body>
</html>
