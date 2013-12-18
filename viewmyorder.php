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
		<div id="content">
        	<div id="allorders">
            	
            	<?php
					$q = "SELECT * FROM orders WHERE userid=:userid";
					$stmt = $pdo->prepare($q);
					$stmt->bindParam(':userid',$user->getUserid());
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					for ($r = 0; $r < count($result); $r++){
						?>
                        <div class="orderforms">
                        <?php
						
						$q = "SELECT * FROM item WHERE orderid=:orderid";
						$stmt = $pdo->prepare($q);
						$stmt->bindParam(':orderid',$result[$r][0]);
						$stmt->execute();
						$result1 = $stmt->fetchAll();
						?>
                        	<table>
                            <tr>
                            	<td>Name</td><td>Qty</td><td>Price</td><td>Total</td>
                            </tr>
                        <?php
						for ($r1 = 0; $r1 < count($result1); $r1++){
							echo  "<tr><td>" . $result1[$r1]['name'] . "</td><td>" . $result1[$r1]['quantity'] . "</td><td>" . $result1[$r1]['price'] . "</td><td>" . $result1[$r1]['total'] . "</td></tr>";
						}
						
						echo "Total: P" . $result[$r][3];
						?>
                        	</table>
                        </div>
                        <?php } ?>
            </div>
		<?php
        	}else{
			header("Location:index.php");
			exit;
			}
		?>
        </div>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{ 
				$userid = $user->getUserid();
			}
			
			 
		?>
		
	</body>
	
</html>