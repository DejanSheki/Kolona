<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Konoba Kolona | Cavtat</title>

    <meta name="description" content="Restaurant, Cavtat, Seafood">
    <meta name="author" content="Dejan Lukic">
    <meta name="keywords" content="Restaurant, Cavtat, Fish, Food">
    <meta name="robots" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet"> 

    <script src="https://kit.fontawesome.com/ccf2869940.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<header class="head">
    <div class="module-border-wrap">  
        <div class="module">
            <h1>Konoba Kolona</h1>       
            <nav>
                <div class="nav">
                    <ul>
                        <li><a href="index.php">Welcome</a></li>
                        <li><a href="login.php">Log In</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                        <li><i class="fas fa-bars fa-2x"></i></li>
                    </ul>
                </div>
            </nav>
            <div class="mobile-nav">
                <div class="responsive-menu">
                    <ul>
                        <li><a href="index.php">Welcome</a></li>
                        <li><a href="login.php">Log In</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
    <div class="container">
        <div class="contwrap">
			<div class="contcontact">
				<div id="reservation">				  			
					<div class="reservation login">
						<div class="h2"><h2>Sign Up</h2></div>   					
														
						<form  class="form-class" action="function/registration.php" method="post">			
							<div class="form">
								<div class="input">
									<input type="text"  class="formcontrol" name="first_name"  placeholder="First Name" required>
								</div>
                            </div>
                            <div class="form">
								<div class="input">
									<input type="text"  class="formcontrol" name="last_name"  placeholder="Last Name" required>
								</div>
                            </div>
                            <div class="form">
								<div class="input">
									<input type="email"  class="formcontrol" name="email"  placeholder="Email address" required>
								</div>
							</div>
                            <div class="form">
								<div class="input">
									<input type="password"  class="formcontrol" name="password"  placeholder="Password" required>
								</div>
                            </div>
                            <div class="form">
								<div class="input">
									<input type="password"  class="formcontrol" name="confirm_password"  placeholder="Confirm Password" required="required">
								</div>
							</div>
							<div class="form">
								<button type="submit" class="btn">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
        </div>
        <?php include('templates/footer.php'); ?>
    </div>
    <script src="./script/main.js"></script>

</body>
</html>