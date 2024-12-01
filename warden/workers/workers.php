<?php
// Include the database connection file
include ('../../conn.php');

// Query to fetch worker details
$sql = "SELECT WORKER_ID, NAME, RATING, TYPE, PHONE_NO, image_link FROM worker_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaint Portal - Our Workers</title>
    <link rel="stylesheet" href="workers.css" />
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/">ComplaintPortal</a>
        </div>
        <div class="navbar-links">
        <a href="homepage.php">Home</a>
        <a href="team/team.php">Team</a>
        <a href="status_tracking/status_tracking.php">Status-Tracking</a>
        <a href="feedback/feedback.php">Feedback</a>
        <a href="addcomplaint/addComplaint.php">Add Complaint</a>
        <a href="leave/leave.php">Leave Form</a>
        <a href="city/city.php">City Form</a>
        <a href="noticeboard/noticeboard.php">Notice Board</a>
      </div>
    </nav>

    <div class="form_fill workers-container">
        <h2>Our Workers</h2>
        <div class="cards">
            <?php
            if ($result->num_rows > 0) {
                // Loop through each worker
                while ($row = $result->fetch_assoc()) {
                    // Fetch the image link from the database
                    $imageUrl = !empty($row['image_link']) ? $row['image_link'] : 'default-image-url.jpg'; // Use a default image if none provided
                    
                    echo "
                    <div class='worker-card'>
                        <img src='$imageUrl' alt='{$row['NAME']}'>
                        <h3>{$row['NAME']}</h3>
                        <div class='stars'>";

                    // Generate stars based on the rating
                    for ($i = 0; $i < $row['RATING']; $i++) {
                        echo "&#9733;"; // Unicode for a filled star
                    }
                    for ($i = $row['RATING']; $i < 5; $i++) {
                        echo "&#9734;"; // Unicode for an empty star
                    }

                    echo "
                        </div>
                        <p><strong>Type:</strong> {$row['TYPE']}</p>
                        <p><strong>Phone:</strong> {$row['PHONE_NO']}</p>
                    </div>";
                }
            } else {
                echo "<p>No workers found!</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
