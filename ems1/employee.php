<?php
// emp.php - Employee Panel

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
    header("Location: users.php");
    exit();
}


include 'config.php'; // Database connection

if (!isset($_SESSION['email'])) {
    echo "Session email is not set!";
    exit();
}

$email = $_SESSION['email']; // Get the email from session

// Prepare the SQL query to fetch the user's name based on email
$sql = "SELECT name FROM users WHERE email = '$email'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the user's name from the result
    $row = mysqli_fetch_assoc($result);
    $employeeName = $row['name']; // Get the user's name
} else {
    $employeeName = 'User not found'; // Default message if no result
}



$email = $_SESSION['email']; // Logged-in user's email
$sql = "SELECT * FROM employees WHERE email = '$email'";
$result = mysqli_query($conn, $sql);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <style>
        
        table {
    width: 70%;
    border-collapse: collapse;
    margin: 20px auto; /* Centers the table horizontally */
    text-align: center; /* Optional: Aligns text inside the table cells */
}


        th {
            border: 1px solidrgb(169, 163, 163);
            padding: 10px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
            
        }

        td {
            background-color: white; /* White for all odd rows */
        }   

        h2 {
            text-align: center;
            color: #333;
        }
        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: #e6e9ee;
        }

        header {
            background-color: #000;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            font-size: 18px;
        }

        header .logo {
            font-size: 20px;
            font-weight: bold;
        }

        header .subtext {
            font-size: 15px;
            font-weight: normal;
            margin: 0;
            color: #ccc;
        }

        header nav {
            display: flex;
            gap: 20px;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        footer {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
            color: white;
            padding: 15px 10px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            width: 100%;
            margin-top: auto;
        }

        footer p {
            margin: 0 10px;
            text-align: center;
        }

        footer p a {
            color: white;
            text-decoration: none;
        }

        footer p a:hover {
            text-decoration: underline;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .container h1 {
            font-size: 36px;
            color: #555;
        }

        .container p {
            font-size: 18px;
            color: #888;
        }

        .info-boxes {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 20px;
        }

        .info-box-wrapper {
            border: 1px solid #555;
            padding: 20px 50px;
        }

        .info-box {
            width: 300px;
            height: 100px;
            background-color: #4a4a78;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
       

        .article {
            border-radius: 6px;
            border-style: solid;
            border-color: rgba(0, 0, 0, 0.1);
            border-width: 1px;
            padding: 16px;
            display: flex;
            flex-direction: row;
            gap: 16px;
            align-items: flex-start;
            justify-content: center;
            height: 147px;
        }

    </style>
</head>
<body>

<header>
    <div class="logo">
        WorkFlow Pro
        <p class="subtext">Employee Dashboard</p>
    </div>
    <nav>
        <a href="Home.php">Home</a>
        
        <a href="Home.php">Logout</a>
        <a href="#">Contact </a>
    </nav>
</header>

<div class="container">
    <h1><b>Hey! <?php echo htmlspecialchars($employeeName); ?></b></h1>
    <p>Have a nice day</p>

    <div class="info-boxes">
        <div class="info-box-wrapper">
            <div class="info-box">
                <span id="currentTime"></span>
            </div>
        </div>
        <div class="info-box-wrapper">
            <div class="info-box">
                <span id="currentDate"></span>
            </div>
        </div>
    </div>
</div>


<h2>Employee Dashboard</h2>
<table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Job Position</th>
                <th>Department</th>
                <th>Task</th>
                <th>Description</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['job_position']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['task']; ?></td>
                <td><?= $row['description']; ?></td>
                <td><?= $row['deadline']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<script>
    function updateDateTime() {
        const now = new Date();
        const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        const date = now.toISOString().split('T')[0];

        document.getElementById('currentTime').innerText = time;
        document.getElementById('currentDate').innerText = date;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>

<footer>
    <p>WorkFlow Pro &copy; 2025. All rights reserved.</p>
    <p><a href="#">Terms of Service</a></p>
    <p><a href="#">Privacy Policy</a></p>
</footer>

</body>
</html>
