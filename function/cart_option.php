<?php

    if (!empty($_GET["action"]) && $_GET["action"] == "add") {
			
        if (!empty($_POST["quantity"])) {
                 
            $stmt = $db->prepare('SELECT * FROM offer WHERE `code` = :code');
            $stmt->bindParam(':code', $_GET['code']);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $itemArray = array($result[0]["code"]=>array('code'=>$result[0]["code"], 'name'=>$result[0]["name"], 'image'=>$result[0]["image"],'price'=>$result[0]["price"],  'quantity'=>$_POST["quantity"], ));
                
            if (!empty($_SESSION["cart_item"])) {

                if (in_array($result[0]["code"], array_keys($_SESSION["cart_item"]))) {
                    
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        
                        if ($result[0]["code"] == $k)                                                          
                            $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];                                                             
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            } 	header('Location: /kolona/orderonline.php');
	    }
		
		if(!empty($_GET['action'])) {

			switch($_GET['action']) {

                case "remove":
                    
					if(!empty($_SESSION['cart_item'])) {
						foreach($_SESSION['cart_item'] as $k => $v) {
							if($_GET['code'] == $k)
								unset($_SESSION['cart_item'][$k]);
							if(empty($_SESSION['cart_item']))
								unset($_SESSION['cart_item']);
						}
					}
				break;
				case "empty":
					unset($_SESSION['cart_item']);
				break;
			}
        }
        

