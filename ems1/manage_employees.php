<?php
// adm.php - Admin Panel

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: users.php");
    exit();
}

include 'config.php'; // Database connection



//add
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $job_position = mysqli_real_escape_string($conn, $_POST['job_position']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $task = mysqli_real_escape_string($conn, $_POST['task']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);

    // Check if user exists
    $user_id_query = "SELECT id FROM users WHERE email = '$email'";
    $user_id_result = mysqli_query($conn, $user_id_query);

    if (mysqli_num_rows($user_id_result) > 0) {
        $user = mysqli_fetch_assoc($user_id_result);
        $user_id = $user['id'];

        // Insert into employees table
        $sql = "INSERT INTO employees (email, name, job_position, department, task, description, deadline, user_id)
                VALUES ('$email', '$name', '$job_position', '$department', '$task', '$description', '$deadline', '$user_id')";

if (mysqli_query($conn, $sql)) {
    // Success: Show success message with pop-up
    echo "<script>
            alert('Employee details added successfully!');
            window.location.href = 'manage_employees.php'; // Redirect to manage employees page
          </script>";
} else {
    // Error: Show error message with pop-up
    echo "<script>
            alert('Error: " . mysqli_error($conn) . "');
            window.location.href = 'manage_employees.php'; // Redirect to manage employees page
          </script>";
}
} else {
// Error: Show user not found message with pop-up
echo "<script>
        alert('Error: User with email \"$email\" does not exist.');
        window.location.href = 'manage_employees.php'; // Redirect to manage employees page
      </script>";
}

}


//update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Ensure the user_id is passed correctly
    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']); // Ensure user_id is sanitized
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $job_position = mysqli_real_escape_string($conn, $_POST['job_position']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $task = mysqli_real_escape_string($conn, $_POST['task']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);

        // Check if the user exists in the employees table
        $check_user_query = "SELECT user_id FROM employees WHERE user_id = '$user_id'";
        $check_result = mysqli_query($conn, $check_user_query);

        if (mysqli_num_rows($check_result) > 0) {
            // Proceed with update if the user exists
            $query = "UPDATE employees 
                      SET email = '$email', name = '$name', job_position = '$job_position', department = '$department', 
                          task = '$task', description = '$description', deadline = '$deadline'
                      WHERE user_id = '$user_id'";

            if (mysqli_query($conn, $query)) {
                echo "<script>
                        alert('Employee updated successfully!');
                        window.location.href = 'manage_employees.php';
                      </script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Employee not found.');</script>";
        }
    } else {
        echo "<script>alert('No user ID provided.');</script>";
    }
}



//delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM employees WHERE id = $delete_id"; // Use the correct field
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Employee details deleted successfully!');
                window.location.href = 'manage_employees.php'; // Redirect after deletion
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// Display and filter employee details
$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';
$query = "SELECT * FROM employees WHERE name LIKE '%$search%' OR department LIKE '%$filter%' OR job_position LIKE '%$filter%'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkFlow Pro Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
	*{
		box-sizing: border-box;
	}
	body{
		align-items: center;
		display: flex;
		justify-content: center;
		flex-direction: column;
		background: #e6e9ee;
		font-family: 'monserrat', sans-serif;
		min-height: 100%;
		margin: 0;
	}



    body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh;
    margin: 0;
}



.selected {
    background-color: #B1C29E; 
    color: white; 
    font-weight: bold; 
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
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            background-color: black;
            color: white;
            padding: 15px 10px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-top: auto;
            width: 100%;
        }

        footer p {
            margin: 5px 20px;
            text-align: center;
            color: white;
        }

        footer p a {
            color: white;
            text-decoration: none;
        }

        footer p a:hover {
            text-decoration: underline;
        }



        .container {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: #000;
            color: #fff;
            padding: 15px 10px;
            text-align: center;
        }

        footer p {
            margin: 5px 15px;
            font-size: 14px;
        }

        footer p a {
            color: #fff;
            text-decoration: none;
        }

        footer p a:hover {
            text-decoration: underline;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #e6e9ee;
            padding: 20px;
            border-radius: 8px;
           
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

        .button-group button:hover {
            opacity: 0.9;
        }

        .search-container {
    position: absolute; /* Use absolute positioning */
    top: 80px;          /* Adjust top margin as needed */
    right: 20px;        /* Adjust right margin as needed */
    display: flex;
    align-items: center; /* Vertically align the content */
}

.search-container input {
    padding: 8px;
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 4px 0 0 4px;
}

.search-container button {
    padding: 8px 12px;
    border: none;
    background-color: #000;
    color: #fff;
    border-radius: 0 4px 4px 0;
}

.search-container button:hover {
    opacity: 0.8;
}



.selected {
        background-color: blue; /* Light blue for selection */
        font-weight: bold;
        color:black;
    }



table {
            width: 70%;
            border-collapse: collapse;
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

    </style>
</head>
<body>


    <script>
        // Display the pop-up for 3 seconds
        const popup = document.getElementById('notification');
        if (popup) {
            popup.classList.add('show');
            setTimeout(() => popup.classList.remove('show'), 3000);
        }
    </script>
<header>
        <div class="logo">
            WorkFlow Pro
            <p class="subtext">Employee Dashboard</p>
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="admin.php">Admin Dashboard</a>
            <a href="home.php">Logout</a>
        </nav>
    </header>
    <h2>Manage Employees</h2>
    <div>

<div class="container">
    <div class="search-container" >
        <form method="GET" action = "manage_employees.php">
            <input type="text" id="searchInput" name="search_term" placeholder="Search in site">
            <button type="submit" name="search"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

    <form method="POST" action = "manage_employees.php">
        <div class="form-container">
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter employee email" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter employee name" required>
            </div>
            <div class="form-group">
                <label for="position">Job Position</label>
                <input type="text" name="job_position" id="position" placeholder="Enter job position" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" id="department" placeholder="Enter department" required>
            </div>
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" name="task" id="task" placeholder="Enter task" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="Enter description" required>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" required>
            </div>
            <div class="button-group">
                <input type="hidden" name="action" value="add">

               <button type="submit" name="add">Add</button>
<button type="submit" name="update">Update</button>
<button type="submit" name="delete">Delete</button>

<button type="button" 
        onclick="location.reload()" 
        style="background-color: #e6e9ee; border: 1px solid black; color: black;">
    Cancel
</button>


            </div>
        </div>
    </form>
</div>



    
<h1>Employee Management</h1>
<table border="1">
        <thead>
            <tr>
                <th>Email</th>
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
        <tr class="employee-row" data-id="<?php echo $row['email']; ?>" data-name="<?php echo $row['name']; ?>"
            data-job_position="<?php echo $row['job_position']; ?>" data-department="<?php echo $row['department']; ?>"
            data-task="<?php echo $row['task']; ?>" data-description="<?php echo $row['description']; ?>"
            data-deadline="<?php echo $row['deadline']; ?>">
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['name']; ?></td>
        
            <td><?php echo $row['job_position']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['task']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['deadline']; ?></td>
            
        </tr>
        <?php } ?>

        </tbody>
    </table>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const rows = document.querySelectorAll('.employee-row');
        
        rows.forEach(row => {
            row.addEventListener('click', function() {
                // Remove the 'selected' class from all rows
                rows.forEach(r => r.classList.remove('selected'));

                // Add the 'selected' class to the clicked row
                this.classList.add('selected');

                const email = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const job_position = this.getAttribute('data-job_position');
                const department = this.getAttribute('data-department');
                const task = this.getAttribute('data-task');
                const description = this.getAttribute('data-description');
                const deadline = this.getAttribute('data-deadline');
                
                // Populate the form with the clicked row's data
                document.getElementById('email').value = email;
                document.getElementById('name').value = name;
                document.getElementById('position').value = job_position;
                document.getElementById('department').value = department;
                document.getElementById('task').value = task;
                document.getElementById('description').value = description;
                document.getElementById('deadline').value = deadline;
            });
        });
    });
</script>












<footer>
    <p>WorkFlow Pro &copy; 2025.All rights reserved.</p>
    <p><a href="#">Terms of Service</a></p>
    <p><a href="#">Privacy Policy</a></p>
</footer>

</body>
</html>
