<?php
session_start(); // Start the session to access session variables
include("../../conn.php");

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];  // Access the email from the session

    try {
        // Query to fetch user data from the database
        $query = $conn->prepare("SELECT type FROM worker_details WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            // Fetch the worker type
            $row = $result->fetch_assoc();
            $type = strtolower($row['type']); // Ensure it's lowercase for easier comparison

            // Initialize variables based on worker type
            if ($type == "carpenter") {
                $worker_id = "carpenter_id";
                $table = "carpenter";
                $complaint_id = "ccomplaint_id";
            } elseif ($type == "electrician") {
                $worker_id = "electrician_id";
                $table = "electrician";
                $complaint_id = "ecomplaint_id";
            } elseif ($type == "plumber") {
                $worker_id = "plumber_id";
                $table = "plumber";
                $complaint_id = "pcomplaint_id";
            } else {
                throw new Exception("Invalid worker type");
            }

            $id = strtoupper(explode('@', $email)[0]);

            // Prepare and execute the complaint query with proper parameter binding
            $complaint_query = $conn->prepare("SELECT complaint_id, complaints.status, complaints.description, hostel_name, room_no, student_details.name as name, student_details.roll_no, complaints.date FROM complaints JOIN student_details ON complaints.roll_no = student_details.roll_no WHERE complaint_id IN 
                                               (SELECT $complaint_id FROM $table WHERE $worker_id = ?)");
            $complaint_query->bind_param("s", $id);
            $complaint_query->execute();
            $complaint_result = $complaint_query->get_result();

            // Output rows in HTML
            if ($complaint_result->num_rows > 0) {
                while ($row = $complaint_result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['complaint_id']}</td>
                            <td>{$row['status']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['hostel_name']}</td>
                            <td>{$row['room_no']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['roll_no']}</td>
                            <td>{$row['date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No complaints found</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No worker found with the provided email</td></tr>";
        }
    } catch (Exception $e) {
        echo "<tr><td colspan='5'>Error: " . $e->getMessage() . "</td></tr>";
    }

} else {
    // If the session 'email' is not set, redirect to login page
    header("Location: login.html");
    exit();
}

$conn->close();
?>
