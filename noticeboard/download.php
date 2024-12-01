<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to fetch the PDF file based on the NOTICE_ID
    $sql = "SELECT pdf_file, TOPIC FROM notices WHERE NOTICE_ID = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Set headers to indicate a file download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $row['TOPIC'] . '.pdf"');
        header('Content-Length: ' . strlen($row['pdf_file']));

        // Output the PDF file content
        echo $row['pdf_file'];
    } else {
        echo "No file found.";
    }
} else {
    echo "No notice ID provided.";
}

$conn->close();
?>
