<?php
include('../conn.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['parcel_id'])) {
        $parcel_id = intval($_POST['parcel_id']); // Securely get the parcel ID

        // Delete the specific parcel by ID
        $sql = "DELETE FROM parcels WHERE PARCEL_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $parcel_id);

        if ($stmt->execute()) {
            // Redirect back to the appropriate page
            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                header("Location: parcels.php");
            }
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Parcel ID not provided.";
    }

    $conn->close();
} else {
    header("Location: parcels.php");
    exit();
}
?>
