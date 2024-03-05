<?php
include 'db_conn.php'; // Include database connection
include 'user_class.php'; // Include the User class
$user = new User($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="Style/style.css?v=1">

    <style>
    a.login-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        text-align: center; /* Center the text horizontally */
        width: 100%; 
    }
    a.login-button:hover {
        background-color: #0056b3;
    }
    </style>

</head>
<body class="registration">

    <div class="container">
        <h2>Registration</h2>
        <form method="post" action="registration_process.php">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="contact_number" placeholder="Contact Number" required>
            <button type="submit" name="Signup">Sign Up</button>
        </form>
        <br>

        <a href="login_page.php" class="login-button">Go to Login Page</a>

        <button id="toggleUsers">Show Users</button>
        <div id="userList" style="display: none;">

        <h3>Users</h3>
        <?php 
        $user->handleUserDeletion();
        include 'show_users.php';
        ?>
    </div>

    <script>
    document.getElementById("toggleUsers").addEventListener("click", function() {
        var userList = document.getElementById("userList");
        if (userList.style.display === "none") {
            userList.style.display = "block";
            this.textContent = "Hide Users";
        } else {
            userList.style.display = "none";
            this.textContent = "Show Users";
        }
    });
    </script>
</body>
</html>
