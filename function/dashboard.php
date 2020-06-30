
<?php
	require "connection.php";
	
	$stmt = $db->prepare('SELECT * FROM `users` ORDER BY user_id');
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Dashboard</title>
		
		<link rel="stylesheet" href="/kolona/css/normalize.css">
		<link href="/kolona/css/style.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
	</head>

	<body>
		<div class="dashboard">
			<div>
				<a href="/kolona/login.php">Home</a>
			</div>
			<div style="overflow-x:auto;">
			<table>
				<caption>List of users</caption>
				<thead>
					<tr>
						<th>User Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Created on</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($results as $data) {
							echo "<tr>
								<td>$data[user_id]</td>
								<td>$data[first_name]</td>
								<td>$data[last_name]</td>
								<td>$data[email]</td>
								<td>$data[created_on]</td>
								<td><a href='delete.php?id=$data[user_id]' class='btn' role='button'>Delete</a></td>
							</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
			<h1>Product entry</h1>
			<form class="product_entry" action="dashboard.php" method="Post">
				<input type="text" name="code" placeholder="Code">
				<input type="text" name="name" placeholder="Name">
				<input type="text" name="image" placeholder="Image">
				<input type="text" name="price" placeholder="Price">
				<input type="submit" value="Submit" class="btn">
			</form>

		<?php
        if (isset($_POST['code']) && isset($_POST['name'])) {

            $sql = "INSERT INTO offer (code, name, image, price) VALUES (:code, :name, :image, :price)";
            $stmt = $db->prepare($sql);
                                                        
            $stmt->bindParam(':code', $_POST['code'], PDO::PARAM_STR);
            $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $_POST['image'], PDO::PARAM_STR);
            $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_STR);

                                                
            $stmt->execute();
        }
		?>
		<?php
	
			$stmt = $db->prepare('SELECT * FROM `offer` ORDER BY id');
			$stmt->execute();
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		?>
			<div style="overflow-x:auto;">
			<table>
				<caption>List of products</caption>
				<thead>
					<tr>
						<th>Id</th>
						<th>Code</th>
						<th>Name</th>
						<th>Image</th>
						<th>Price</th>
						<th>Created on</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($results as $data) {
							echo "<tr>
								<td>$data[id]</td>
								<td>$data[code]</td>
								<td>$data[name]</td>
								<td>$data[image]</td>
								<td>$data[price]</td>
								<td>$data[created_on]</td>
								<td><a href='delete.php?code=$data[code]' class='btn' role='button'>Delete</a></td>
							</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
			</div>
	</body>
</html>



