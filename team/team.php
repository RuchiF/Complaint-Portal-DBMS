<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Team</title>
  <link rel="stylesheet" href="team.css">
</head>
<body data-theme="light">
  <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-logo">
      <a href="/">ComplaintPortal</a>
    </div>
    <div class="navbar-links">
        <a href="../homepage.php">Home</a>
        <a href="../status_tracking/status_tracking.php">Status-Tracking</a>
        <a href="../feedback/feedback.php">Feedback</a>
        <a href="../addcomplaint/addComplaint.php">Add Complaint</a>
        <a href="../leave/leave.php">Leave Form</a>
        <a href="../city/city.php">City Form</a>
        <a href="../noticeboard/noticeboard.php">Notice Board</a>
      </div>
    <div class="theme-switcher">
      <div class="cloud" id="theme-toggle"></div>
    </div>
  </nav>

  <!-- Team Section -->
  <div class="team-section">
    <h2 class="fancy-header">Meet Our Amazing Team</h2>
    <div class="team-grid">
      <div class="team-member-card">
        <div class="member-details">
          <h3>Ruchi Fatechandani</h3>
          <p>Contact: +123-456-7890</p>
          <div class="linkedin-circle">
            <a href="#" target="_blank" rel="noopener noreferrer">in</a>
          </div>
        </div>
      </div>
      <div class="team-member-card">
        <div class="member-details">
          <h3>Lakshmi Priya</h3>
          <p>Contact: +123-456-7891</p>
          <div class="linkedin-circle">
            <a href="#" target="_blank" rel="noopener noreferrer">in</a>
          </div>
        </div>
      </div>
      <div class="team-member-card">
        <div class="member-details">
          <h3>Snigdha Gupta</h3>
          <p>Contact: +123-456-7892</p>
          <div class="linkedin-circle">
            <a href="#" target="_blank" rel="noopener noreferrer">in</a>
          </div>
        </div>
      </div>
      <div class="team-member-card">
        <div class="member-details">
          <h3>Vanisha Garg</h3>
          <p>Contact: +123-456-7893</p>
          <div class="linkedin-circle">
            <a href="#" target="_blank" rel="noopener noreferrer">in</a>
          </div>
        </div>
      </div>
      <div class="team-member-card">
        <div class="member-details">
          <h3>Akshita Mishra</h3>
          <p>Contact: +123-456-7894</p>
          <div class="linkedin-circle">
            <a href="#" target="_blank" rel="noopener noreferrer">in</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
     // Select the cloud and body
const cloud = document.getElementById('theme-toggle');
const body = document.body;

// Add click event to toggle theme
cloud.addEventListener('click', () => {
  const currentTheme = body.getAttribute('data-theme');
  
  if (currentTheme === 'light') {
    body.setAttribute('data-theme', 'dark');
  } else {
    body.setAttribute('data-theme', 'light');
  }
});
  </script>
</body>
</html>