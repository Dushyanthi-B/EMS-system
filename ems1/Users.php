<!DOCTYPE html>
<html>
<head>
	<title>Sliding Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
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
		position: relative;
		width: 768px;
		max-width: 100%;
		min-height: 480px;
		background: #fff;
		border-radius: 10px;
		overflow: hidden;
		box-shadow: 0 14px 28px rgba(0,0,0,0.25),
					0 10px 10px rgba(0,0,0,0.22);
		margin-top: 35px;
        margin-bottom: 35px;
		padding-bottom: 60px;
	}
	.sign-up, .sign-in{
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		transition: all 0.6s ease-in-out;
	}
	.sign-up{
		width: 50%;
		opacity: 0;
		z-index: 1
	}
	.sign-in{
		width: 50%;
		z-index: 2;
	}
	form{
		background: #fff;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 50px;
		height: 100%;
		text-align: center;
	}
	h1{
		font-weight: bold;
		margin: 0;
	}
	p{
		font-size: 14px;
		font-weight: 100;
		line-height: 20px;
		letter-spacing: 0.5px;
		margin: 15px 0 20px;
	}
	input{
		background: #eee;
		padding: 12px 15px;
		margin: 8px 15px;
		width: 100%;
		border-radius: 5px;
		border: none;
		outline: none;
	}
	a{
		color: #333;
		font-size: 14px;
		text-decoration: none;
		margin: 15px 0;
	}
	button{
		color: #fff;
		background: #213555;
		font-size: 12px;
		font-weight: bold;
		padding: 12px 55px;
		margin: 20px;
		border-radius: 20px;
		border: 1px solid #213555;
		outline: none;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
		cursor: pointer;
	}
	button:active{
		transform: scale(0.90);
	}
	#signIn, #signUp{
		background-color: transparent;
		border: 2px solid #fff;
	}
	.container.right-panel-active .sign-in{
		transform: translateX(100%);
	}
	.container.right-panel-active .sign-up{
		transform: translateX(100%);
		opacity: 1;
		z-index: 5;
		animation: show 0.6s;
	}
	@keyframes show{
		0%, 49.99%{
			opacity: 0;
			z-index: 1;
		}
		50%, 100%{
			opacity: 1;
			z-index: 5;
		}
	}
	.overlay-container{
		position: absolute;
		top: 0;
		left: 50%;
		width: 50%;
		height: 100%;
		overflow: hidden;
		transition: transform 0.6s ease-in-out;
		z-index: 100;
	}
	.container.right-panel-active .overlay-container{
		transform: translateX(-100%);
	}
	.overlay{
		position: relative;
		color: #fff;
		background: #ff416c;
		left: -100%;
		height: 100%;
		width: 200%;
		background: linear-gradient(to right, #213555, #F5EFE7);
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}
	.container.right-panel-active .overlay{
		transform: translateX(50%);
	}
	.overlay-left, .overlay-right{
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 40px;
		text-align: center;
		top: 0;
		height: 100%;
		width: 50%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}
	.overlay-left{
		transform: translateX(-20%);
	}
	.overlay-right{
		right: 0;
		transform: translateX(0);
	}
	.container.right-panel-active .overlay-left{
		transform: translateX(0);
	}
	.container.right-panel-active .overlay-right{
		transform: translateX(20%);
	}
	.social-container{
		margin: 20px 0;
	}
	.social-container a{
		height: 40px;
		width: 40px;
		margin: 0 5px;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		border: 1px solid #ccc;
		border-radius: 50%;
	}



    /* Media Queries */
	@media (max-width: 768px) {
		.container {
			width: 90%;
			padding-bottom: 40px;
		}

		.sign-up, .sign-in {
			width: 100%;
		}

		form {
			padding: 0 30px;
		}

		header nav {
			flex-direction: column;
			align-items: center;
		}

		header nav a {
			margin: 10px 0;
		}

		footer p {
			font-size: 12px;
		}
	}

	@media (max-width: 480px) {
		.container {
			width: 100%;
			padding-bottom: 20px;
		}

		form {
			padding: 0 20px;
		}

		button {
			padding: 12px 30px;
			font-size: 10px;
		}
	}
</style>
<body>
    <header>
        <div class="logo">
            WorkFlow Pro
            <p class="subtext">Employee Dashboard</p>
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="users.php">Signup</a>
            <a href="users.php">Login</a>
			<a href="#">Contact</a>

        </nav>
    </header>
	<div class="container" id="main">
		<div class="sign-up">
		<form action="signup1.php" method="POST">
    <h1>Create Account</h1>
    <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>or use your email for registration</p>
    <input type="text" name="username" placeholder="Name" required="">
    <input type="email" name="email" placeholder="Email" required="">
    <input type="password" name="password" placeholder="Password" required="">
    
    <input type="text" name="role" placeholder="Role (admin or employee)" required="">
    <button type="submit">Sign Up</button>
</form>

		</div>
		<div class="sign-in">
            <form action="login1.php" method="POST">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<p>or use your account</p>
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="password" placeholder="Password" required="">
				<input type="text" name="role" placeholder="Role" required="">
				<a href="#">Forget your Password?</a>
				<button>Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button id="signIn">Sign In</button>
				</div>
				<div class="overlay-right">
					<h1>Hello, Friend</h1>
					<p>Enter your personal details and start journey with us</p>
					<button id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

    <footer>
        <p>WorkFlow Pro &copy; 2025. All rights reserved.</p>
        <p>Terms of Service</a></p>
        <p>Privacy Policy</p>
    </footer>
    
	<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const main = document.getElementById('main');

		signUpButton.addEventListener('click', () => {
			main.classList.add("right-panel-active");
		});
		signInButton.addEventListener('click', () => {
			main.classList.remove("right-panel-active");
		});
	</script>
</body>
</html>
