<?php
include 'db_conn.php';
include 'user_class.php';
$user = new User($conn);
// Handle form submission
if (isset($_POST['Signup'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_number = $_POST['contact_number'];

    // Create the user
    if ($user->createUser($first_name, $last_name, $email, $password, $contact_number)) {
        // User created successfully
        echo "User created successfully";
        // Redirect to login page
        header("Location: login_page.php");
        exit;
    } else {
        // Error creating user
        echo "Error creating user";
    }
}
?>