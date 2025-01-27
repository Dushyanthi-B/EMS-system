<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure the form values are set
    if (isset($_POST['email'], $_POST['password'], $_POST['role'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];  // Use plain password (not hashed)
        $role = $_POST['role'];

        // Create a connection to the database
        $conn = new mysqli('localhost', 'root', '', 'eee');

        // Check the connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Prepare the SQL query to fetch password and role by email
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);  // Bind email to the query
        $stmt->execute();
        $stmt->bind_result($hashed_password, $db_role);
        $stmt->fetch();

        // Check if the email exists, if password matches, and role is correct
        if ($hashed_password && password_verify($password, $hashed_password)) {
            // Start session and store the email and role in the session
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $db_role;

            // Redirect based on role
            if ($role == 'admin' && $db_role == 'admin') {
                header('Location: admin.php');
                exit();  // Make sure to exit after the redirect
            } elseif ($role == 'employee' && $db_role == 'employee') {
                header('Location: employee.php');
                exit();  // Make sure to exit after the redirect
            } else {
                // If the role entered does not match the database role
                echo "<script>alert('Access denied: Invalid role'); window.location.href = 'Users.php';</script>";
            }
        } else {
            // If credentials do not match, show an error
            echo "<script>alert('Invalid credentials!'); window.location.href = 'Users.php';</script>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // If form fields are missing
        echo "<script>alert('Please fill in all fields!'); window.location.href = 'Users.php';</script>";
    }
}
?>
