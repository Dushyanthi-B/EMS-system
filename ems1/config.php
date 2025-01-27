<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');     // Your MySQL username (default is root)
define('DB_PASSWORD', '');         // Your MySQL password (empty string if no password)
define('DB_NAME', 'eee'); // Database name we just created

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
