<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'hostel_management'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["admission_year"])) {
    $year = $_POST["admission_year"];
    $roll_prefix = substr($year, 2, 2);

    $query = "SELECT ROLL_NO, NAME, ROOM_NO, HOSTEL_NAME FROM student_details WHERE ROLL_NO LIKE '$roll_prefix%'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Student Info</title>
          <link rel="stylesheet" href="student_info.css">
        </head>
        <body>
          <div class="student-info-container">
            <div class="student-info-card">
              <h2>Student Information</h2>
              <div class="student-list">';

        while ($row = $result->fetch_assoc()) {
            echo '<div class="student-item">
                    <div class="student-row">
                      <div class="student-detail">
                        <p class="roll-number"><strong>Roll Number:</strong> ' . htmlspecialchars($row["ROLL_NO"]) . '</p>
                        <h3>' . htmlspecialchars($row["NAME"]) . '</h3>
                        <p class="hostel-name"><strong>Hostel:</strong> ' . htmlspecialchars($row["HOSTEL_NAME"]) . '</p>
                        <p class="room-number"><strong>Room:</strong> ' . htmlspecialchars($row["ROOM_NO"]) . '</p>
                      </div>
                      <a href="student_profile.php?roll_no=' . urlencode($row["ROLL_NO"]) . '" class="btn">View Details</a>
                    </div>
                  </div>';
        }

        echo '    </div>
              </div>
            </div>
          </body>
          </html>';
    } else {
        echo '<p>No students found for the selected year.</p>';
    }
} else {
    echo '<p>Invalid access. Please submit the form correctly.</p>';
}

$conn->close();
?>
