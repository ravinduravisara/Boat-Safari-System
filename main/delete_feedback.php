<?php
include_once("../admin/config.php");
session_start();

if (isset($_POST['deleteFeedback'])) {
    $feedbackId = $_POST['feedbackId'];

    // Delete feedback from the database
    $sql_delete = "DELETE FROM feedback WHERE feedbackId = '$feedbackId'";

    if ($conn->query($sql_delete)) {
        echo "<script>alert('Feedback deleted successfully'); window.location.href = 'user_profile.php';</script>";
    } else {
        echo "Error deleting feedback: " . $conn->error;
    }
    
}
?>
