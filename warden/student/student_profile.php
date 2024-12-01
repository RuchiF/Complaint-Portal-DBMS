<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hostel_management'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["roll_no"])) {
    $roll_no = $_GET["roll_no"];

    $student_query = "SELECT * FROM student_details WHERE ROLL_NO = ?";
    $stmt = $conn->prepare($student_query);
    $stmt->bind_param("s", $roll_no);
    $stmt->execute();
    $student_result = $stmt->get_result();

    if ($student_result->num_rows > 0) {
        $student = $student_result->fetch_assoc();

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Student Details</title>
          <link rel="stylesheet" href="student_profile.css">
        </head>
        <body>
          <div class="student-info-container">
            <div class="student-info-card">
              <h2>Student Details</h2>
              <div class="student-item">
                <div class="student-row">
                  <div class="student-detail">
                    <p><strong>Roll Number:</strong> ' . htmlspecialchars($student["ROLL_NO"]) . '</p>
                    <h3>' . htmlspecialchars($student["NAME"]) . '</h3>
                    <p><strong>Hostel:</strong> ' . htmlspecialchars($student["HOSTEL_NAME"]) . '</p>
                    <p><strong>Room:</strong> ' . htmlspecialchars($student["ROOM_NO"]) . '</p>
                    <p><strong>Email:</strong> ' . htmlspecialchars($student["EMAIL"]) . '</p>
                    <p><strong>Phone:</strong> ' . htmlspecialchars($student["PHONE_NO"]) . '</p>
                  </div>
                </div>
              </div>
            </div>
        ';

        $complaints_query = "SELECT * FROM complaints WHERE roll_no = ?";
        $complaints_stmt = $conn->prepare($complaints_query);
        $complaints_stmt->bind_param("s", $roll_no);
        $complaints_stmt->execute();
        $complaints_result = $complaints_stmt->get_result();

        if ($complaints_result->num_rows > 0) {
            echo '<div class="student-info-card">
                <h2>Complaints</h2>
                <div class="student-list">';
            while ($complaint = $complaints_result->fetch_assoc()) {
                echo '<div class="student-item">
                        <div class="student-row">
                          <div class="student-detail">
                            <p><strong>Status:</strong> ' . htmlspecialchars($complaint["status"]) . '</p>
                            <p><strong>Description:</strong> ' . htmlspecialchars($complaint["DESCRIPTION"]) . '</p>
                            <p><strong>Date:</strong> ' . htmlspecialchars($complaint["DATE"]) . '</p>
                            <p><strong>Concerned Staff:</strong> ' . htmlspecialchars($complaint["concerned_staff"]) . '</p>
                          </div>
                        </div>
                      </div>';
            }
            echo '    </div>
                  </div>';
        } else {
            echo '<div class="student-info-card">
              <h2>No Complaints Found</h2>
            </div>';
        }

        echo '</body>
        </html>';
    } else {
        echo '<p>No student found with this roll number.</p>';
    }

    $stmt->close();
    $complaints_stmt->close();
} else {
    echo '<p>Invalid access. Please go back and try again.</p>';
}

$conn->close();
?>
