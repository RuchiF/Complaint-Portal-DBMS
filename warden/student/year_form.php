<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Year of Admission Form</title>
  <link rel="stylesheet" href="year_form.css">
</head>
<body>
  <div class="form-card">
    <h2>Year of Admission</h2>
    <form action="student_info.php" method="POST">
      <div class="form-group">
        <label for="admission-year">Enter Year:</label>
        <input type="number" id="admission-year" name="admission_year" placeholder="e.g., 2023" required>
      </div>
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>
</body>
</html>
