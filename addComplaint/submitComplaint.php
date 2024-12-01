<?php
// Include the database connection
include('../conn.php'); // This will automatically define the $conn variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form submission
    $rollNumber = $_POST['rollNumber'];
    $staff = $_POST['staff'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = 'pending'; // Define status separately

    // Basic validation to check if all fields are filled
    if (empty($status) || empty($description) || empty($date) || empty($rollNumber) || empty($staff)) {
        die("Error: All fields are required and cannot be empty.");
    }

    // Prepare SQL insert statement
    $sql = "INSERT INTO complaints 
            (status, DESCRIPTION, DATE, roll_no, concerned_staff) 
            VALUES 
            (?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    try {
        // Bind parameters without references
        $stmt->bind_param("sssss", 
            $status, 
            $description, 
            $date, 
            $rollNumber, 
            $staff
        );

        // Execute the statement with error checking
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        // If successful
        echo "Complaint Submission Confirmed<br>";
        echo "Roll Number: $rollNumber<br>";
        echo "Concerned Staff: $staff<br>";
        echo "Description: $description<br>";
        echo "Date of Complaint: $date<br>";
        echo "Complaint successfully submitted!<br>";

    } catch (Exception $e) {
        // More detailed error handling
        echo "Submission Error: " . $e->getMessage() . "<br>";
        
        // Additional debug information
        echo "SQL Error Details: " . $stmt->error . "<br>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If someone tries to access the page directly without submitting the form
    echo "Error: No complaint submitted.<br>";
}
?>
