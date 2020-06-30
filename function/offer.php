<?php

    require "connection.php";
    

    $stmt = $db->prepare("SELECT * FROM offer ORDER BY id ASC");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
?>

    <div class="ordercard">
        <form method="post"  action="/kolona/cart.php?action=add&code=<?php echo $data["code"]; ?>">
            <div><img src="<?php echo $data["image"]; ?>"></div>
            <h1><?php echo $data["name"]; ?></h1>
            <div class="price"><?php echo $data["price"] ."kn"; ?></div>
            <span><input type="number"  name="quantity" min="1"><button type="subbmit">Add to Cart</button></span>
        </form>
    </div>
            
<?php
}   
?>
