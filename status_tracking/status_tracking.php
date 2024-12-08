<?php
// Include database connection with error handling
include('../conn.php');

try {
    // Fetch plumber complaints data with error handling
    $sql_plumber = "SELECT plumber.PLUMBER_ID, plumber.PCOMPLAINT_ID, complaints.status 
                    FROM plumber 
                    INNER JOIN complaints ON complaints.complaint_id = plumber.PCOMPLAINT_ID";
    $res_plumber = mysqli_query($conn, $sql_plumber);
    
    if ($res_plumber === false) {
        throw new Exception("Error executing plumber query: " . mysqli_error($conn));
    }
    
    $plumberComplaints = [];
    while ($result = mysqli_fetch_assoc($res_plumber)) {
        $plumberComplaints[] = $result;
    }

    // Fetch electrician complaints data
    $sql_electrician = "SELECT electrician.ELECTRICIAN_ID, electrician.ECOMPLAINT_ID, complaints.status 
                        FROM electrician 
                        INNER JOIN complaints ON complaints.complaint_id = electrician.ECOMPLAINT_ID";
    $res_electrician = mysqli_query($conn, $sql_electrician);
    
    if ($res_electrician === false) {
        throw new Exception("Error executing electrician query: " . mysqli_error($conn));
    }
    
    $electricianComplaints = [];
    while ($result = mysqli_fetch_assoc($res_electrician)) {
        $electricianComplaints[] = $result;
    }

    // Fetch carpenter complaints data
    $sql_carpenter = "SELECT carpenter.CARPENTER_ID, carpenter.CCOMPLAINT_ID, complaints.status 
                      FROM carpenter 
                      INNER JOIN complaints ON complaints.complaint_id = carpenter.CCOMPLAINT_ID";
    $res_carpenter = mysqli_query($conn, $sql_carpenter);
    
    if ($res_carpenter === false) {
        throw new Exception("Error executing carpenter query: " . mysqli_error($conn));
    }
    
    $carpenterComplaints = [];
    while ($result = mysqli_fetch_assoc($res_carpenter)) {
        $carpenterComplaints[] = $result;
    }
} catch (Exception $e) {
    // Log error or display user-friendly message
    error_log($e->getMessage());
    $plumberComplaints = $electricianComplaints = $carpenterComplaints = [];
} finally {
    // Always close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Tracking</title>
    <link rel="stylesheet" href="status.css">
</head>
<body data-theme="light">
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/">ComplaintPortal</a>
        </div>
        <div class="navbar-links">
        <a href="../homepage.php">Home</a>
        <a href="../team/team.php">Team</a>
        <a href="../feedback/feedback.php">Feedback</a>
        <a href="../addcomplaint/addComplaint.php">Add Complaint</a>
        <a href="../leave/leave.php">Leave Form</a>
        <a href="../city/city.php">City Form</a>
        <a href="../noticeboard/noticeboard.php">Notice Board</a>
      </div>
    </nav>

    <div class="status-tracking">
        <h2>Status Tracking</h2>

        <!-- Plumber Table -->
        <div class="status-card">
            <div class="card-header">
                <div class="icon-circle">🔧</div>
                <h3>Plumber Complaints</h3>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Plumber ID</th>
                        <th>Complaint ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($plumberComplaints)) {
                        foreach ($plumberComplaints as $complaint) {
                            echo "<tr>
                                <td>" . $complaint['PLUMBER_ID'] . "</td>
                                <td>" . $complaint['PCOMPLAINT_ID'] . "</td>
                                <td>" . $complaint['status'] . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No plumber complaints available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Electrician Table -->
        <div class="status-card">
            <div class="card-header">
                <div class="icon-circle">💡</div>
                <h3>Electrician Complaints</h3>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Electrician ID</th>
                        <th>Complaint ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($electricianComplaints)) {
                        foreach ($electricianComplaints as $complaint) {
                            echo "<tr>
                                <td>" . $complaint['ELECTRICIAN_ID'] . "</td>
                                <td>" . $complaint['ECOMPLAINT_ID'] . "</td>
                                <td>" . $complaint['status'] . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No electrician complaints available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Carpenter Table -->
        <div class="status-card">
            <div class="card-header">
                <div class="icon-circle">🛠</div>
                <h3>Carpenter Complaints</h3>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Carpenter ID</th>
                        <th>Complaint ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($carpenterComplaints)) {
                        foreach ($carpenterComplaints as $complaint) {
                            echo "<tr>
                                <td>" . $complaint['CARPENTER_ID'] . "</td>
                                <td>" . $complaint['CCOMPLAINT_ID'] . "</td>
                                <td>" . $complaint['status'] . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No carpenter complaints available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>