<?php
include 'user_class.php';

$user = new User($conn);

/// Handle user login (NOT CREATION) ///
if (isset($_POST['login'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_number = $_POST['contact_number'];

    // Call the login method ///
    $user->login($first_name, $last_name, $email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Style/style.css?v=2">
</head>
<body class = "registration">

<div class="container">
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="contact_number" placeholder="Contact Number" required>
        <button type="submit" name="login">Login</button>
    </form>
    <br>

</div>

</body>
</html>
