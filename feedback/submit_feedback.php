<?php
// Include the database connection file
include("../conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $roll_number = $conn->real_escape_string($_POST['rollNumber']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $emoji = $conn->real_escape_string($_POST['emoji']);

    // Insert data into the Feedback table
    $sql = "INSERT INTO feedback (rollNumber, feedbackText, emoji)
            VALUES ('$roll_number', '$comment', '$emoji')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Feedback submitted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// Close the connection
$conn->close();
?>