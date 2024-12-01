<?php
// Include the database connection file
include("../conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $roll_number = $conn->real_escape_string($_POST['roll_number']);
    $program = $conn->real_escape_string($_POST['program']);
    $reason = $conn->real_escape_string($_POST['reason']);
    $duration = $conn->real_escape_string($_POST['duration']);
    $address = $conn->real_escape_string($_POST['address']);
    $contact_number = $conn->real_escape_string($_POST['contact']);
    $parent_contact_number = $conn->real_escape_string($_POST['parentContact']);
    $date_of_leaving = $conn->real_escape_string($_POST['dateOfLeaving']);

    // Insert data into the LeaveForm table
    $sql = "INSERT INTO LeaveForm (ROLL_NUMBER, PROGRAM, REASON, DURATION, ADDRESS, CONTACT_NUMBER, PARENT_CONTACT_NUMBER, DATE_OF_LEAVING)
            VALUES ('$roll_number', '$program', '$reason', '$duration', '$address', '$contact_number', '$parent_contact_number', '$date_of_leaving')";

    if ($conn->query($sql) === TRUE) {
        echo "Leave request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>