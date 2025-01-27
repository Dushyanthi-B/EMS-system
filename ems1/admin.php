<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkFlow Pro Dashboard</title>
    <style>
	html, body {
    height: 100%; /* Set full height for the HTML and body */
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
    display: flex;
    flex-direction: column; /* Set flex direction to column */
    overflow-x: hidden; /* Prevent horizontal scrolling */
    box-sizing: border-box; /* Include padding and borders in element's width/height */
}

* {
    box-sizing: inherit; /* Apply box-sizing to all elements */
}
body {
    flex: 1; /* Ensure body takes up remaining space */
}
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6e9ee;
            color: #333;
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

        header nav {
            display: flex;
            gap: 20px;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .container {
            text-align: center;
            padding: 20px;
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
    margin-top: auto; /* Push footer to the bottom */
    width: 100%; /* Ensure the footer spans full width */
}

        footer p {
            margin: 5px 20px; /* Adjust space between paragraphs */
            text-align: center;
            text-decoration: none;
            color: white;
        }

        footer p a {
            color: white;
            text-decoration: none;
        }

        footer p a:hover {
            text-decoration: underline;
        }
/* Media Queries */

        /* Medium screens: Tablet devices */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            header .logo {
                margin-bottom: 10px;
            }

            header nav {
                flex-direction: column;
                gap: 10px;
            }

            .container {
                padding: 15px;
            }

            .container img {
                max-width: 90%;
            }

            footer {
                flex-direction: column;
                text-align: center;
                font-size: 13px;
            }
        }

        /* Small screens: Mobile devices */
        @media (max-width: 480px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            header .logo {
                margin-bottom: 10px;
                font-size: 18px;
            }

            header nav {
                flex-direction: column;
                gap: 5px;
            }

            header nav a {
                font-size: 14px;
            }

            .container {
                padding: 10px;
            }

            footer {
                padding: 10px 5px;
                font-size: 12px;
            }

            footer p {
                margin: 5px 10px;
            }
        }
		
		
		.logo .subtext {
    font-size: 15px; /* Smaller size for "Admin Dashboard" */
    font-weight: normal;
    margin: 0;
    color: #ccc; /* Optional: Subtle color for "Admin Dashboard" */
}

    </style>
</head>
<body>

<header>
   <div class="logo">
    WorkFlow Pro
    <p class="subtext">Admin Dashboard</p>
</div>

    <nav>
        <a href="home.php">Home</a>
        <a href="manage_employees.php">Manage Workforce</a>
        <a href="home.php">Logout</a>
    </nav>
</header>

<div class="container">
    
    <div >
        <img src="container.png" alt="Dashboard Graphs">
    </div>
    
    <h1>Web Traffic</h1>
    <div >
        <img src="row.png" alt="Dashboard Graphs">
    </div>
</div>

<footer>
    <p>WorkFlow Pro &copy; 2025. All rights reserved.</p>
    <p><a href="#">Terms of Service</a></p>
    <p><a href="#">Privacy Policy</a></p>
</footer>

</body>
</html>
