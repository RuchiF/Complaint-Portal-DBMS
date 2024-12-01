<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>City Form</title>
  <link rel="stylesheet" href="city.css" />
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
        <a href="../leave/leave.php">Leave Form</a>
        
        <a href="../noticeboard/noticeboard.php">Notice Board</a>
      </div>
    </div>
    <div class="theme-switcher">
      <div class="cloud" id="theme-toggle"></div>
    </div>
  </nav>

  <!-- City Form -->
  <div class="app-container">
    <form class="form-container" action="submit_city.php" method="POST">
      <h2>City Form</h2>

      <label for="rollNumber">Roll Number:</label>
      <input type="text" id="rollNumber" name="rollNumber" placeholder="Enter roll number" required />

      <label for="roomNumber">Room Number:</label>
      <input type="text" id="roomNumber" name="roomNumber" placeholder="Enter room number" required />

      <label for="purpose">Purpose of Going to City:</label>
      <textarea id="purpose" name="purpose" placeholder="Enter purpose" required></textarea>

      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" placeholder="Enter contact number" required />

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required />

      <button type="submit" id="btn">Submit City Form</button>
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