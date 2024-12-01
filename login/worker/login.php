<?php
session_start(); // Start the session to store session variables
include("../../conn.php");

$email = $_POST['email'];
$passwd = $_POST['passwd'];

try {
    $sql = "SELECT * FROM worker_login WHERE email = '$email' AND passwd = '$passwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Store the email in session
        $_SESSION['email'] = $email;

        // Redirect to home page or the page where you want users to land after login
        header("Location:complaints_page.php");
        exit();  // It's a good practice to call exit() after a header redirect
    } else {
        // If login failed, redirect to the login page
        header("Location: login.html");
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>
