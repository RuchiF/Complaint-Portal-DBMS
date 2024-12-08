<?php
include('../conn.php');

// Check if roll_number is provided in the query string
if (isset($_GET['roll_number'])) {
    $roll_number = $_GET['roll_number'];

    // Fetch all parcels for the specific roll number
    $sql = "SELECT * FROM parcels WHERE Roll_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $roll_number);
    $stmt->execute();
    $result = $stmt->get_result();

    $parcelDetails = [];
    while ($row = $result->fetch_assoc()) {
        $parcelDetails[] = $row;
    }

    $stmt->close();
    $conn->close();
} else {
    die("Roll number not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcel Details</title>
    <link rel="stylesheet" href="parcel.css">
</head>

<body data-theme="light">
    <nav class="navbar">
        <h1><center>Complaint Portal</center></h1>
        
        <div class="theme-switcher">
            <div class="cloud" id="theme-toggle"></div>
        </div>
    </nav>

    <div class="parcel">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h2><center>Details for Roll Number: <?= htmlspecialchars($roll_number) ?></center></h2>

        <div class="parcel-card">
            <table>
                <thead>
                    <tr>
                        <th>Parcel ID</th>
                        <th>Room Number</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($parcelDetails)): ?>
                        <?php foreach ($parcelDetails as $parcel): ?>
                            <tr>
                                <td><?= htmlspecialchars($parcel['PARCEL_ID']) ?></td>
                                <td><?= htmlspecialchars($parcel['Room_number']) ?></td>
                                <td><?= htmlspecialchars($parcel['Phone_number']) ?></td>
                                <td>
                                    <form action="delete_parcel.php" method="POST" style="display: inline-block;">
                                        <input type="hidden" name="parcel_id" value="<?= htmlspecialchars($parcel['PARCEL_ID']) ?>">
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No parcels found for this roll number.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="parcels.php">Back to Parcels</a>
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
