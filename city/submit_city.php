<?php
// Include the database connection file
include("../conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $roll_number = $conn->real_escape_string($_POST['rollNumber']);
    $room_number = $conn->real_escape_string($_POST['roomNumber']);
    $purpose = $conn->real_escape_string($_POST['purpose']);
    $contact_number = $conn->real_escape_string($_POST['contact']);
    $date_of_visit = $conn->real_escape_string($_POST['date']);

    // Insert data into the CityForm table
    $sql = "INSERT INTO CityForm (ROLL_NUMBER, ROOM_NUMBER, PURPOSE, CONTACT_NUMBER, DATE_OF_VISIT)
            VALUES ('$roll_number', '$room_number', '$purpose', '$contact_number', '$date_of_visit')";

    if ($conn->query($sql) === TRUE) {
        echo "City form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>