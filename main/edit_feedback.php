<?php
include_once("../admin/config.php");
session_start();

if (isset($_POST['editFeedback'])) {
    $feedbackId = $_POST['feedbackId'];

    // Fetch the feedback details
    $query = "SELECT * FROM feedback WHERE feedbackId = '$feedbackId'";
    $result = $conn->query($query);
    $feedback = $result->fetch_assoc();

    if ($feedback) {
        echo "<form method='post' action='save_feedback.php'>";
        echo "<input type='hidden' name='feedbackId' value='" . $feedback['feedbackId'] . "'>";
        echo "<label>Rate:</label>";
        echo "<input type='number' name='rate' value='" . $feedback['rate'] . "'>";
        echo "<label>Description:</label>";
        echo "<textarea name='description'>" . $feedback['description'] . "</textarea>";
        echo "<button type='submit' name='saveFeedback'>Save Changes</button>";
        echo "</form>";
    } else {
        echo "Feedback not found.";
    }
}
?>
