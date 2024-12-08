<?php
include('../conn.php');

// Fetch grouped parcels with count
$sql_parcel = "SELECT Roll_number, Room_number, Phone_number, COUNT(*) as Parcel_Count 
               FROM parcels 
               GROUP BY Roll_number";
$res_parcel = mysqli_query($conn, $sql_parcel);

$parcelList = [];
while ($result = mysqli_fetch_assoc($res_parcel)) {
    $parcelList[] = $result;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcel Status</title>
    <link rel="stylesheet" href="parcel.css">
    <!-- Add Font Awesome for the Plus Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body data-theme="light">
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/">ComplaintPortal</a>
        </div>
        <div class="theme-switcher">
            <div class="cloud" id="theme-toggle"></div>
        </div>
    </nav>

    <div class="parcel">
        <br>
        <br>
        <br>
        <br>
        <h2><center>Parcels</center></h2>

        <!-- Add Parcel Button with Plus Icon -->
        <a href="add_parcel.php" class="add-parcel-btn">
            <i class="fas fa-plus"></i> Add New Parcel
        </a>

        <div class="parcel-card">
            <table>
                <thead>
                    <tr>
                        <th>Roll Number</th>
                        <th>Room Number</th>
                        <th>Phone Number</th>
                        <th>Number of Parcels</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($parcelList)): ?>
                        <?php foreach ($parcelList as $parcel): ?>
                            <tr>
                                <td>
                                    <a href="view_parcels.php?roll_number=<?= urlencode($parcel['Roll_number']) ?>">
                                        <?= htmlspecialchars($parcel['Roll_number']) ?>
                                    </a>
                                </td>
                                <td><?= htmlspecialchars($parcel['Room_number']) ?></td>
                                <td><?= htmlspecialchars($parcel['Phone_number']) ?></td>
                                <td><?= htmlspecialchars($parcel['Parcel_Count']) ?></td>
                                <td>
                                    <form action="delete_parcel.php" method="POST" style="display: inline-block;">
                                        <input type="hidden" name="Roll_number" value="<?= htmlspecialchars($parcel['Roll_number']) ?>">
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No parcels available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
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
