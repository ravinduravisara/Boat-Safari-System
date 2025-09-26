<?php
include_once("../admin/config.php");
session_start();

if (isset($_POST['saveFeedback'])) {
    $feedbackId = $_POST['feedbackId'];
    $rate = $_POST['rate'];
    $description = $_POST['description'];

    // Update feedback in the database
    $sql_update = "UPDATE feedback SET rate='$rate', description='$description' WHERE feedbackId='$feedbackId'";

    if ($conn->query($sql_update)) {
        echo "<script>alert('Feedback updated successfully'); window.location.href = 'user_profile.php';</script>";
    } else {
        echo "Error updating feedback: " . $conn->error;
    }
}
?>
