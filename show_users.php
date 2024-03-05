<?php
include 'db_conn.php';

// Show all users if clicked
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>ID: " . $row["user_id"] . " - First Name: " . $row["first_name"] ." - Last Name: " . $row["last_name"] ." - Email: " . $row["email"] . " - Contact: " . $row["contact_number"] . "
                <form method='post' action='registration_page.php'>
                    <button type='submit' name='login' value=''" . $row["user_id"] . "'>Delete</button>
                </form>
                </li>";
            }
            echo "</ul>";
        }
?>