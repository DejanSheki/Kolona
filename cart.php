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
	<div class="cartbox">
		<h1 class="carthead">Your Cart</h1>

<?php
session_start();

require "function/connection.php";

include('function/cart_option.php');

	if(isset($_SESSION["cart_item"])) {
		$total_quantity = 0;
		$total_price = 0;
		
		foreach ($_SESSION["cart_item"] as $item):
			$item_price = $item["quantity"]*$item["price"];
?>

		<div class="cart">
			<img src="<?php echo $item["image"]; ?>" />
			<h1><?php echo $item["name"]; ?></h1>
			<p>Quantity: &nbsp;<?php echo $item["quantity"]; ?></p>
			<p>Price: &nbsp;<?php echo $item["price"] ." kn"; ?></p>
			<p><b>Total: &nbsp;<?php echo  number_format($item_price,2) ." kn"; ?></b></p>
			<a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Remove Item</a>
		</div>


<?php
				
	$total_quantity += $item["quantity"];
	$total_price += ($item["price"]*$item["quantity"]);

		endforeach;

?>

		<div class="total">
			<p><strong>Total Quantity: &nbsp;<?php echo $total_quantity; ?></strong></p>
			<p><strong>Total Price: &nbsp; &nbsp;<?php echo number_format($total_price, 2) ." kn"; ?></strong></p>
		</div>
		<div class="empticart">
			<a href="orderonline.php"><i class="fas fa-arrow-circle-left"></i>&nbsp; Continue Shopping</a>
			<a href="cart.php?action=empty">Empty Cart &nbsp;<i class="fas fa-trash"></i></a>
		</div>

<?php

} else {
?>	

		<div class="empticart">
			<p>Your Cart is Empty</p>
			<a href="orderonline.php"><i class="fas fa-arrow-circle-left"></i>&nbsp; Continue Shopping</a>
		</div>

<?php 
}
?>
	</div>
</body>
</html>

