<?php
include 'db_conn.php';
class User {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    /// CREATE USER ///
    public function createUser($first_name, $last_name, $email, $password, $contact_number) {
        // Insert user if the Signup button is clicked
        if (isset($_POST['Signup'])) {
            $sql = "INSERT INTO users (first_name, last_name, email, password, contact_number) VALUES ('$first_name', '$last_name', '$email', '$password', '$contact_number')";
            if ($this->conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Location: login_page.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }
    }
    
    /// DELETE USER ///
    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE user_id = $userId";

        if ($this->conn->query($sql) === TRUE) {
            return true; // Return true if user deletion is successful
        } else {
            return false; // Return false if there's an error
        }
    }

    /// LOGIN USER ///
    public function login($first_name, $last_name, $email, $password) {
        // Validate login credentials
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and execute the SQL query to fetch user data
            $sql = "SELECT * FROM users WHERE first_name ='$first_name' AND last_name='$last_name' AND email='$email' AND password='$password'";
            $result = $this->conn->query($sql);
    
             // Debugging: Output the SQL query and the values of $email and $password
                var_dump($sql);
                var_dump($email);
                var_dump($password);

            if ($result->num_rows == 1) {
                // Fetch the user data
                $user = $result->fetch_assoc();
                
                // Start the session and set session variables
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];

                // Redirect to the home page after successful login
                header("Location: index.php");
                exit;
            } else {
                // Invalid credentials
                echo "<script>alert('Invalid email or password');</script>";
            }
        }
}

/// LOGOUT USER ///
    public function logout() {
        // Start the session
        session_start();

        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the login page after logout
        header("Location: registration_page.php");
        exit;
    }

    // RETRIEVE FIRST NAME FROM DATABASE
    public function retrieveFirstName($userId) {
        $sql = "SELECT first_name FROM users WHERE user_id = $userId";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            return $user['first_name'];
        } else {
            return 1;
        }
    }
    
    /// USER DELETION PROCESS
    public function handleUserDeletion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
            $userIdToDelete = $_POST['delete'];
            $userDeleted = $this->deleteUser($userIdToDelete);
            if ($userDeleted) {

                echo "User deleted successfully.";
            } else {
                echo "Error deleting user.";
            }
        }
    }
    
    
    
}

?>
