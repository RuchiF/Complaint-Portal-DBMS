<?php
session_start(); // Start the session to store session variables
include("../../conn.php");

$email = $_POST['email'];
$passwd = $_POST['passwd'];

try {
    $sql = "INSERT INTO worker_login (email, passwd) VALUES ('{$email}', '{$passwd}');";
    $result = $conn->query($sql);

    if($result == true) {
        // Store the email in session
        $_SESSION['email'] = $email;

        // Redirect to home page
        header("Location: complaints_page.php");
    } else {
        // If insertion failed, redirect back to signup page
        header("Location: signup.html");
    }
} catch (Exception $e) {
    // On error, redirect to the signup page
    header("Location: signup.html");
    // echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>
