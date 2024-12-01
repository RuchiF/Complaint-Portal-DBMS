<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback Page</title>
  <link rel="stylesheet" href="FeedBack.css" />
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
        
        <a href="../addcomplaint/addComplaint.php">Add Complaint</a>
        <a href="../leave/leave.php">Leave Form</a>
        <a href="../city/city.php">City Form</a>
        <a href="../noticeboard/noticeboard.php">Notice Board</a>
      </div>
    <div class="theme-switcher">
      <div class="cloud" id="theme-toggle"></div>
    </div>
  </nav>

  <!-- Feedback Form -->
  <div class="app-container">
    <form class="form-container" action="submit_feedback.php" method="POST">
      <h2>Feedback</h2>

      <label for="rollNumber">Roll Number:</label>
      <input type="text" id="rollNumber" name="rollNumber" placeholder="Enter roll number" required />

      <label for="comment">Feedback:</label>
      <textarea id="comment" name="comment" placeholder="Enter your feedback" required></textarea>

      <label for="emoji">How do you feel?</label>
      <div class="emoji-slider">
        <label>
          <input type="radio" name="emoji" value="😃" required /> <span class="emoji">😃</span>
        </label>
        <label>
          <input type="radio" name="emoji" value="🙂" required /> <span class="emoji">🙂</span>
        </label>
        <label>
          <input type="radio" name="emoji" value="😐" required /> <span class="emoji">😐</span>
        </label>
        <label>
          <input type="radio" name="emoji" value="☹" required /> <span class="emoji">☹</span>
        </label>
        <label>
          <input type="radio" name="emoji" value="😡" required /> <span class="emoji">😡</span>
        </label>
      </div>

      <button type="submit" id="btn">Submit Feedback</button>
    </form>
  </div>

  <script>
    const cloud = document.getElementById('theme-toggle');
    const body = document.body;

    cloud.addEventListener('click', () => {
      const currentTheme = body.getAttribute('data-theme');
      body.setAttribute('data-theme', currentTheme === 'light' ? 'dark' : 'light');
    });
  </script>
</body>
</html>