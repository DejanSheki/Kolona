<?php
	require "connection.php";


	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


	$stmt = $db->prepare("SELECT * FROM `users` WHERE `email` =:email");
	$stmt->bindParam(':email', $_POST['email']);
	$exec = $stmt->execute();
	
		if($exec) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($_POST['email'] == $result['email']) {
				echo "<script>alert('Email already in use! Please try different with one.');
					window.location = '../signup.php';
					</script>";
			}
		
			elseif($_POST['password'] !== $_POST['confirm_password']) {
				echo "<script>alert('Wrong password confirmation! Please try again.');
						window.location = '../signup.php';
						</script>";		
				}
			
			else {
			$stmt = $db->prepare('INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (:first_name, :last_name, :email, :password)');
			$stmt->bindParam(':first_name', $first_name);
			$stmt->bindParam(':last_name', $last_name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$exec = $stmt->execute();

	

			if($exec) {
				session_start();
				$_SESSION['user'] = $_POST['first_name'] . " " . $_POST['last_name'];
				header('Location: /kolona/orderonline.php');
			}
			else {
				echo "<br>Insert statement has failed";
			}
		}
	}
	
	
?>	
	