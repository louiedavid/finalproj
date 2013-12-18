<html>	

	<head>
		<link rel="stylesheet" href="css/style-home.css">
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
	</head>
	
	<body>
    	<?php
			require('includes/utilities.inc.php');
			if($user){				
		?>
		<div id="nav">
			<div class="logo">
				<img src="assets/logo.svg">
				<div class="name">
					Benilde
					Ordering
					System
				</div>
			</div>
			<div class="user">
            	<?php
				echo "{$user->getFirstname()} {$user->getLastname()} <br> <span>{$user->getUsertype()}</span>";
				?>
			 <p><a href="index.php">(LOGOUT)</a></p>
			</div>
			<div class="menu">
				<ul>
					<a href="home.php"><li><div class="icon"><img src="assets/logo-caf.svg" width="45px"></div><label>CAFETERIA</label></li></a>
					<a href="viewmyorder.php"><li><div class="icon"><img src="assets/logo-vieworder.svg" width="25px"></div><label>VIEW Orders</label></li></a>
				</ul>
			</div>
			</div>
		</div>
		<div id="content"><br><br><br><br>
        <div id="order-result">
       		<?php
			
			$stallname = $_POST['stallname'];
			$itemnames = $_POST['item-name'];
			$quantity = $_POST['quantity'];
			$price = array();
			$total = array();
			$totalall = 0;
			
			for ($p = 0; $p < count($quantity); $p++){
				$itemprice = 0;
				if($itemnames[$p] == "Fish Fillet"){
					$itemprice = 65.00;
				} else if($itemnames[$p] == "Chicken Lollipop"){
					$itemprice = 70.00;
				} else if($itemnames[$p] == "Beef Nilaga"){
					$itemprice = 95.00;
				} else if($itemnames[$p] == "Meaty Spaghetti"){
					$itemprice = 60.00;
				}else if($itemnames[$p] == "Asian Chicken"){
					$itemprice = 70.00;
				} else if($itemnames[$p] == "Spicy Fish"){
					$itemprice = 95.00;
				} else if($itemnames[$p] == "Laksa Soup"){
					$itemprice = 60.00;
				}				array_push($price, $itemprice);
			}	
			
			for ($t = 0; $t < count($quantity); $t++){
				array_push($total, $price[$t]*$quantity[$t]);
			}
			
			for ($a = 0; $a < count($total); $a++){
				$totalall += $total[$a];	
			}
			
			echo '<h1>Order Successful</h1><br>';
			echo '<p><i>Total Amount: P' . $totalall . '</i></p><br>';
			echo '<table>';
			echo '<tr><td>Name</td><td>Quantity</td><td>Price</td><td>Total Price</td></tr>';
			for ($dis = 0; $dis < count($itemnames); $dis++){
				echo '<tr>';
					echo '<td>' . $itemnames[$dis] . '</td>';
					echo '<td>' . $quantity[$dis] . '</td>';
					echo '<td>' . $price[$dis] . '</td>';
					echo '<td>' . $total[$dis] . '</td>';
				echo '</tr>';
			}
			echo '</table>';
			
			$q = 'INSERT INTO orders (userid, stallname, totalamount) VALUES (:userid, :stallname, :totalamount)';
			$stmt = $pdo->prepare($q);
			$stmt->bindParam(':userid',$uid);
			$stmt->bindParam(':stallname',$s);
			$stmt->bindParam(':totalamount',$ta);
			$userid = $user->getUserid();
			$uid = (int)$userid;
			$s = $stallname;
			$ta = (double)$totalall;
			$stmt->execute();
			
			$q = "SELECT MAX(orderid) AS highest FROM orders";
			$stmt = $pdo->prepare($q);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$orderid = $result[0]['highest'];
			
			
			for ($i = 0; $i < count($itemnames); $i++){
				$q = 'INSERT INTO item (orderid, name, quantity, price, total) VALUES (:orderid, :name, :quantity, :price, :total)';
				$stmt = $pdo->prepare($q);
				$stmt->bindParam(':orderid',$d);
				$stmt->bindParam(':name',$n);
				$stmt->bindParam(':quantity',$q);
				$stmt->bindParam(':price',$p);
				$stmt->bindParam(':total',$t);	
				$d = $orderid;
				$n = $itemnames[$i];
				$q = $quantity[$i];
				$p = $price[$i];
				$t = $total[$i];
				$stmt->execute();
			}
			
			?>
            </div>
        </div>
		<?php
			} else{
			header("Location:index.php");
			exit;
			}
		?>
		
	</body>
	
</html>