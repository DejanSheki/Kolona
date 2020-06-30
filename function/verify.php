<?php

if(isset($_POST['email']) && isset($_POST['password'])) {

require "connection.php";

$stmt = $db->prepare('SELECT * FROM `users` WHERE `email` = :email');
$stmt->bindParam(':email', $_POST['email']);
$exec = $stmt->execute();


	if($exec) {
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($_POST['email'] == 'dejan.sheki.lukic@gmail.com' && password_verify($_POST['password'], $result['password'])) {
			header('Location: dashboard.php');
			exit;
		}
		elseif(password_verify($_POST['password'], $result['password'])) {
			 session_start();
                $_SESSION['user'] = $result['first_name'] . " " . $result['last_name'];
			header('Location: /kolona/orderonline.php');
		}

		else {
			echo "<script>alert('Wrong password! Please try again.');
				  window.location = '/kolona/login.php';
				  </script>";
		}	
	}
}


?>