<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leave Form</title>
  <link rel="stylesheet" href="leave.css" />
</head>
<body data-theme="light">
  <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-logo">
      <a href="/">ComplaintPortal</a>
    </div>
    <div class="navbar-links">
        <a href="../homepage.php">Home</a>
        <a href="../team/team.php">Team</a>
        <a href="../status_tracking/status_tracking.php">Status-Tracking</a>
        <a href="../feedback/feedback.php">Feedback</a>
        <a href="../addcomplaint/addComplaint.php">Add Complaint</a>
        
        <a href="../city/city.php">City Form</a>
        <a href="../noticeboard/noticeboard.php">Notice Board</a>
      </div>
    </div>
    <div class="theme-switcher">
      <div class="cloud" id="theme-toggle"></div>
    </div>
  </nav>

  <!-- Leave Form -->
  <div class="app-container">
    <form class="form-container" action="submit_leave.php" method="POST">
      <h2>Leave Form</h2>

      <label for="roll_number">Roll Number:</label>
      <input type="text" id="roll_number" name="roll_number" placeholder="Enter your Roll number" required />

      <label for="program">Program:</label>
      <input type="text" id="program" name="program" placeholder="Enter program" required />

      <label for="reason">Reason for Leave:</label>
      <textarea id="reason" name="reason" placeholder="Enter reason for leave" required></textarea>

      <label for="duration">Leave Duration:</label>
      <input type="text" id="duration" name="duration" placeholder="Enter leave duration" required />

      <label for="address">Residential Address:</label>
      <textarea id="address" name="address" placeholder="Enter address" required></textarea>

      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" placeholder="Enter contact number" required />

      <label for="parentContact">Contact Number of Parents:</label>
      <input type="text" id="parentContact" name="parentContact" placeholder="Enter parent's contact number" required />

      <label for="dateOfLeaving">Date of Leaving:</label>
      <input type="date" id="dateOfLeaving" name="dateOfLeaving" required />

      <button type="submit" id="btn">Submit Leave Form</button>
    </form>
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