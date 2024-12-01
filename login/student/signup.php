<?php
session_start(); // Start the session to store session variables
include("../../conn.php");

$email = $_POST['email'];
$passwd = $_POST['passwd'];

try {
    $sql = "INSERT INTO masters_login values ('{$email}', '{$passwd}');";
    $result = $conn->query($sql);

    if($result == true) {
        // Store the email in session
        $_SESSION['email'] = $email;

        // Redirect to home page
       header("login.html");
    } else {
        // If insertion failed, redirect back to signup page
        header("signup.html");
    }
} catch (Exception $e) {
    // On error, redirect to the signup page
    header("http://localhost/dbms_project/student/signup.html");
    // echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>