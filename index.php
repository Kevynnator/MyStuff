<?php
session_start();
include 'db_conn.php'; // Include the database connection file
include 'user_class.php'; // Include the User class file

// Create a new instance of the User class
$user = new User($conn);

// Check if the user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['user_id'])) {
    // Retrieve the user's first name from the database based on the user ID stored in the session
    $userId = $_SESSION['user_id'];
    $firstName = $user->retrieveFirstName($userId);
} else {
    $firstName = "EMPTY";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>Blue Horizon 3.0</title>
    <link rel="stylesheet" href="Style/style.css?v=2" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        #profile-box {
            position: fixed;
            top: 30%;
            left: 40%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            display: none;
        }
    </style>
</head>
<body>
    <div class="side_bar">
        <div class="title">
            <div class="logo">Blue Horizon 3.0</div>
        </div>
        <ul>
            <li>
            <a href="index.php?page=profile" id="profile-link"><i class="fas fa-user"></i>Profile</a>
            </li>
            <li>
                <a href="index.php?page=supporters"><i class="fas fa-qrcode"></i>Supporters</a>
            </li>
            <li>
                <a href="index.php?page=map"><i class="fas fa-globe"></i>Map</a>
            </li>
            <li>
                <a href="index.php?page=events"><i class="fas fa-calendar-week"></i>Events</a>
            </li>
            <li>
                <a href=index.php?page=about#"><i class="fas fa-question-circle"></i>About</a>
            </li>
            <li>
                <a href="index.php?page=donations"><i class="fas fa-sliders-h"></i>Donations</a>
            </li>
            <li>
                <a href="index.php?page=feedback"><i class="fas fa-comments"></i>Feedback</a>
            </li>
        </ul>
        <div class="media_icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div id="profile-box">
        <h2>Profile Text</h2>
            <li>
        <button id="logout-button">Logout</button>
            </li>
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $firstName = $user->retrieveFirstName($userId);
                echo "<p>Welcome, $firstName</p>";
                
            } else {
                echo "<p>Welcome, EMPTY</p>";
            }
        ?>
    </div>
    <script>
        document.getElementById('profile-link').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById('profile-box').style.display = 'block';
        });

        document.querySelectorAll('.nav_collapse').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault(); // Prevent the default link behavior
                const collapseId = event.target.getAttribute('href');
                const collapseElement = document.querySelector(collapseId);
                collapseElement.classList.toggle('collapsed');
            });
        });

        document.getElementById('logout-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button behavior
            // Clear the session data to log out the user
            session_destroy();
            session_start();
            // Redirect the user to the login page or any other desired page
            window.location.href = 'registration_page.php';
        });

        // Add the 'active' class to the navigation link based on the current page
        document.querySelector('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').classList.add('active');
    </script>
</body>
</html>
