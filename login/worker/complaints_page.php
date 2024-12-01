<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Information</title>
    <link rel="stylesheet" href="complaints.css" />
  </head>
  <body>
    
    <main>
      <section class="content">
        <center><h1>Complaints</h1></center>
        <table class="data-table">
          <thead>
            <tr>
              <th>Complaint id</th>
              <th>Status</th>
              <th>Description</th>
              <th>Hostel Name</th>
              <th>Room No.</th>
              <th>Name</th>
              <th>Roll No.</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody id="data-container">
            <?php
             include("complaints.php"); 
            ?>
          </tbody>
        </table>
      </section>
    </main>
    <footer class="footer">
      <p>&copy; 2024 Your Website</p>
    </footer>
  </body>
</html>
