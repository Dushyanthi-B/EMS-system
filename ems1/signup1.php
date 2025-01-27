<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve values from the form
    $name = $_POST['username']; // Use 'username' as 'name'
    $email = $_POST['email']; // Capture email
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $role = $_POST['role']; // Capture the role

    // Create a connection to the database
    $conn = new mysqli('localhost', 'root', '', 'eee');
    
    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role); // Bind parameters

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href = 'Users.php';</script>";  // Redirect to login1.php
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
