<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkFlow Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <style>
      * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden; /* Prevent horizontal scrolling */
            font-family: Arial, sans-serif;
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
            position: relative;
            z-index: 1000;
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
            padding: 50px;
            width: 100%;
            box-sizing: border-box; /* Ensures padding doesn’t cause overflow */
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about {
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

  .cards {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* 2 columns */
        gap: 30px; /* Adjust gap between the cards */
        margin-top: 40px;
        justify-items: center;
        align-items: center;
    }

    .card {
        background-color: #423c6a;
        color: #fff;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 60%; /* Reduced card width */
        max-width: 300px; /* Maximum width for cards */
        margin: 0 auto;
        position: relative;
    }

        .card-inner {
            padding: 30px;
            border: 2px solid #fff; /* White border inside the card */
            border-radius: 6px;
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
        @media (max-width: 1024px) {
            header {
                padding: 12px 15px;
                font-size: 16px;
            }

            .container {
                padding: 30px;
            }

            h1 {
                font-size: 32px;
            }
			
			.cards {
            grid-template-columns: 1fr; /* Single column for medium screens */
        }

        .card {
            width: 80%; /* Adjusted width for medium screens */
        }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
                padding: 10px;
            }

            header nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            h1 {
                font-size: 28px;
            }

           .cards {
            gap: 20px; /* Reduce gap between cards */
        }

        .card {
            width: 90%; /* Adjust card width for smaller screens */
        }

            footer {
                flex-direction: column;
                text-align: center;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            header {
                font-size: 14px;
            }

           
			 .card {
            width: 100%; /* Full width for very small screens */
        }

            h1 {
                font-size: 24px;
            }

            header nav a {
                font-size: 13px;
            }

             footer {
                padding: 10px 5px;
                font-size: 12px;
            }

            footer p {
                margin: 5px 10px;
            }
        }
        .title,
        .title * {
            box-sizing: border-box;
        }

        .title {
            color: #444469;
            text-align: center;
            font-family: "Roboto-Thin", "Roboto-Light", sans-serif;
            font-size: 64px;
            line-height: 48px;
            font-weight: 100;
            position: relative;
        }

        
    </style>
</head>
<body>

<header>
    <div class="logo">WorkFlow Pro</div>
    <nav>
        <a href="home.php">Home</a>
        <a href="users.php">Signup</a>
        <a href="users.php">Login</a>
        <a href="#">Contact</a>
    </nav>
</header>

<div class="container">
    <div class="title">Workflow Pro!</div>
    <h1>About Us</h1>
    <div class="about">
        <p>Welcome to WorkFlow Pro, your trusted partner in employee management solutions. We specialize in streamlining workforce operations, enhancing productivity, and simplifying employee management processes for businesses of all sizes.</p>
        <p>Our mission is to empower companies with efficient tools to manage their teams effectively, optimize workflows, and drive organizational success. With a focus on innovation, reliability, and user-friendly solutions, we are committed to helping you build a better workplace.</p>
        <p>At WorkFlow Pro, we believe in creating systems that work for you, so you can focus on what truly matters—growing your business.</p>
    </div>

    <div class="cards">
        <div class="card">
            <div class="card-inner">
                <h3>Employee Management</h3>
                <p>Streamline employee onboarding, attendance tracking, leave management, and performance monitoring with our intuitive tools.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Task and Project Management</h3>
                <p>Assign tasks, track progress, and monitor deadlines to improve team collaboration and project efficiency.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Custom Solutions</h3>
                <p>Tailor-made features and integrations to meet the unique needs of your organization.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Workforce Insights</h3>
                <p>Gain actionable insights with real-time analytics and detailed reports, helping you make data-driven decisions to optimize team performance.</p>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>WorkFlow Pro 2025 &copy; All rights reserved.</p>
    <p>Terms of Service</p>
    <p>Privacy Policy</p>
</footer>

</body>
</html>
