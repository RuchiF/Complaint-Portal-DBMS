<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaint Portal - Add Complaint</title>
    <link rel="stylesheet" href="addComplaint.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="navbar-logo">
        <a href="/">ComplaintPortal</a>
      </div>
      <div class="navbar-links">
        <a href="../homepage.php">Home</a>
        <a href="../team/team.php">Team</a>
        <a href="../status_tracking/status_tracking.php">Status-Tracking</a>
        <a href="../feedback/feedback.php">Feedback</a>
        
        <a href="../leave/leave.php">Leave Form</a>
        <a href="../city/city.php">City Form</a>
        <a href="../noticeboard/noticeboard.php">Notice Board</a>
      </div>
      </div>
    </nav>

    <div class="form_fill">
      <h2>Add Complaint</h2>
      <form action="submitComplaint.php" method="POST">

        
        <div>
          <label for="rollNumber">Roll Number:</label>
          <input type="text" id="rollNumber" name="rollNumber" required />
        </div>


        <div class="staff">
          <label for="staff">Concerned Staff:</label>
          <select id="staff" name="staff">
            <option value="Plumber">Plumber</option>
            <option value="Electrician">Electrician</option>
            <option value="Carpenter">Carpenter</option>
            <option value="CC Staff">CC Staff</option>
            <option value="Others">Any Other</option>
          </select>
        </div>

        <div class="problem_description">
          <label for="description">Description:</label>
          <textarea
            id="description"
            name="description"
            rows="5"
            placeholder="Describe your issue here"
          ></textarea>
        </div>

        <div class="date">
          <label for="date">Date of Complaint:</label>
          <input type="date" id="date" name="date" value="" readonly />
        </div>

        <div class="submit_button">
          <button type="submit">Submit Complaint</button>
        </div>
      </form>
    </div>

    <script>
      // Set the current date automatically
      document.getElementById("date").valueAsDate = new Date();
    </script>
  </body>
</html>