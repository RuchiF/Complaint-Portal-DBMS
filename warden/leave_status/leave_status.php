<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hostel_management';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verify column existence before querying
function columnExists($conn, $table, $column) {
    $query = "SHOW COLUMNS FROM $table LIKE '$column'";
    $result = $conn->query($query);
    return $result->num_rows > 0;
}

// Approve requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {
    $id = $_POST['id'];
    $type = $_POST['type']; // 'leave' or 'city'

    if ($type === 'leave') {
        // Verify column exists first
        if (!columnExists($conn, 'leaveform', 'status')) {
            die("Error: 'status' column does not exist in leaveform table");
        }
        $query = "UPDATE leaveform SET status = 'approved' WHERE LEAVE_ID = ?";
    } elseif ($type === 'city') {
        // Verify column exists first
        if (!columnExists($conn, 'cityform', 'status')) {
            // If column doesn't exist, create it
            $alter_query = "ALTER TABLE cityform ADD COLUMN status VARCHAR(20) DEFAULT 'unapproved'";
            if (!$conn->query($alter_query)) {
                die("Error creating status column: " . $conn->error);
            }
        }
        $query = "UPDATE cityform SET status = 'approved' WHERE CITY_FORM_ID = ?";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Fetch unapproved leave requests
// First, check if status column exists in leaveform
if (columnExists($conn, 'leaveform', 'status')) {
    $leave_query = "SELECT * FROM leaveform WHERE status = 'unapproved'";
    $leave_result = $conn->query($leave_query);
} else {
    // If column doesn't exist, add it
    $alter_leave_query = "ALTER TABLE leaveform ADD COLUMN status VARCHAR(20) DEFAULT 'unapproved'";
    if ($conn->query($alter_leave_query)) {
        $leave_query = "SELECT * FROM leaveform WHERE status = 'unapproved'";
        $leave_result = $conn->query($leave_query);
    } else {
        die("Error altering leaveform table: " . $conn->error);
    }
}

// Fetch unapproved city requests
$city_query = "SELECT * FROM cityform WHERE status = 'unapproved'";
$city_result = $conn->query($city_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Management</title>
    <link rel="stylesheet" href="leave_status.css">
</head>
<body>
    <!-- Previous Navbar code remains the same -->

    <div class="container">
        <h1>Manage Requests</h1>
        
        <!-- Leave Requests -->
        <h2>Unapproved Leave Requests</h2>
        <?php if (isset($leave_result) && $leave_result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Leave ID</th>
                        <th>Roll Number</th>
                        <th>Program</th>
                        <th>Reason</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $leave_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['LEAVE_ID'] ?></td>
                            <td><?= $row['ROLL_NUMBER'] ?></td>
                            <td><?= $row['PROGRAM'] ?></td>
                            <td><?= $row['REASON'] ?></td>
                            <td><?= $row['DURATION'] ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $row['LEAVE_ID'] ?>">
                                    <input type="hidden" name="type" value="leave">
                                    <button type="submit" name="approve">Approve</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No unapproved leave requests found.</p>
        <?php endif; ?>

        <!-- City Form Requests -->
        <h2>Unapproved City Form Requests</h2>
        <?php if ($city_result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>City Form ID</th>
                        <th>Roll Number</th>
                        <th>Room Number</th>
                        <th>Purpose</th>
                        <th>Date of Visit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $city_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['CITY_FORM_ID'] ?></td>
                            <td><?= $row['ROLL_NUMBER'] ?></td>
                            <td><?= $row['ROOM_NUMBER'] ?></td>
                            <td><?= $row['PURPOSE'] ?></td>
                            <td><?= $row['DATE_OF_VISIT'] ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $row['CITY_FORM_ID'] ?>">
                                    <input type="hidden" name="type" value="city">
                                    <button type="submit" name="approve">Approve</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No unapproved city form requests found.</p>
        <?php endif; ?>
    </div>
</body>
</html>