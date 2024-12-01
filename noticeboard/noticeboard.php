<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notice Board</title>
  <link rel="stylesheet" href="noticeboard.css">
</head>
<body data-theme="light">
<nav class="navbar">
  <div class="navbar-logo">
    <a href="/">ComplaintPortal</a>
  </div>
  <div class="navbar-toggle" id="navbarToggle"></div>
  <div class="navbar-links">
        <a href="../homepage.php">Home</a>
        <a href="../team/team.php">Team</a>
        <a href="../status_tracking/status_tracking.php">Status-Tracking</a>
        <a href="../feedback/feedback.php">Feedback</a>
        <a href="../addcomplaint/addComplaint.php">Add Complaint</a>
        <a href="../leave/leave.php">Leave Form</a>
        <a href="../city/city.php">City Form</a>
      </div>
  <!-- Theme Toggle Button -->
  <button class="cloud" id="themeToggle"></button>
</nav>

<div class="noticeboard-container">
  <div class="notice-board">
    <h2>Notice Board</h2>
    <p>Welcome to the Notice Board. Here, you'll find all important updates and announcements.</p>

    <?php
    $conn = new mysqli("localhost", "root", "", "hostel_management");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT NOTICE_ID, DESCRIPTION, TOPIC, pdf_file 
              FROM notice_board 
              WHERE DATE BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $noticeId = htmlspecialchars($row['NOTICE_ID']);
            $description = htmlspecialchars($row['DESCRIPTION']);
            $topic = htmlspecialchars($row['TOPIC']);
            $pdfFile = "download.php?id=" . urlencode($noticeId);
    ?>
            <div class="notice-item">
              <h3><?php echo $topic; ?></h3>
              <p><?php echo $description; ?></p>
              <a href="<?php echo $pdfFile; ?>" download class="download-btn" id="btn">Download PDF</a>
            </div>
    <?php
        }
    } else {
        echo "<p>No notices found for the past week.</p>";
    }

    $conn->close();
    ?>
  </div>
</div>

<script>
  const themeToggle = document.getElementById('themeToggle'); // Correct ID here
const body = document.body;

// Load the theme from localStorage or default to light
const savedTheme = localStorage.getItem('theme') || 'light';
body.setAttribute('data-theme', savedTheme);

// Ensure the toggle button appearance reflects the current theme
if (savedTheme === 'dark') {
  themeToggle.classList.add('dark-mode');
} else {
  themeToggle.classList.remove('dark-mode');
}

// Add event listener to toggle theme
themeToggle.addEventListener('click', () => {
  const currentTheme = body.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
  body.setAttribute('data-theme', currentTheme);

  // Save the theme to localStorage
  localStorage.setItem('theme', currentTheme);

  // Update toggle button appearance
  themeToggle.classList.toggle('dark-mode');
});

</script>

</body>
</html>