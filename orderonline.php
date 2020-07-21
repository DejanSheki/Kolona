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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ccf2869940.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<?php
session_start();

    $session_items = 0;
    if(!empty($_SESSION['cart_item'])) {
        $session_items = count($_SESSION['cart_item']);
    }
?>
<header class="head">
    <div class="module-border-wrap">  
        <div class="module">
            <h1>Konoba Kolona</h1>       
            <nav>
                <div class="nav">
                    <ul>
                        <li><a href="index.php">Welcome</a></li>
                        <li class="dropdown"><a><?php echo  $_SESSION['user']?></a>
                        <div class="dropdown-content">
                            <a href="cart.php">Your cart <?php echo $session_items; ?></a>
                            <a href="function/logout.php">Log Out</a>
                        </div></li>
                        <li><i class="fas fa-bars fa-2x"></i></li>
                    </ul>
                </div>
            </nav>
            <div class="mobile-nav">
                <div class="responsive-menu">
                    <ul>
                        <li><a href="index.php">Welcome</a></li>
                        <li class="dropdown"><a><?php echo  $_SESSION['user']?></a>
                        <div class="mobdropdown-content">
                            <a href="cart.php">Your cart<?php echo $session_items; ?></a>
                            <a href="function/logout.php">Log Out</a>
                        </div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
    <div class="container">
        <div class="orderbox">
        <?php include('function/offer.php'); ?>
        </div>
        <?php include('templates/footer.php'); ?>
    </div>
    <script src="./script/main.js"></script>
</body>
</html>