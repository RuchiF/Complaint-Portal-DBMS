<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Cards</title>
  <link rel="stylesheet" href="home.css">
</head>
<body data-theme="dark">
  <div class="container">
    <h1 class="floating-heading">Who are you?</h1>
    <div class="card-container">
      <a href="warden/warden_login.html"><div class="card">Warden</div></a>
      <a href="login/student/login.html">
        <div class="card">Student</div>
      </a>
      <a href="login/worker/login.html">
        <div class="card">Worker</div>
      </a>
      <a href="guard/parcels.php"><div class="card">Guard</div></a>
    </div>
  </div>
  <script>
    // JavaScript to handle card selection
    document.querySelectorAll('.card').forEach((card) => {
      card.addEventListener('click', () => {
        // Remove the 'selected' class from all cards
        document.querySelectorAll('.card').forEach((c) => c.classList.remove('selected'));
        
        // Add the 'selected' class to the clicked card
        card.classList.add('selected');
      });
    });
  </script>
</body>
</html>
