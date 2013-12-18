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
        <div id="chef-con-form">
            <div class="chef-add">
                <h1>CHEF'S STATION</h1>
                <br />
            	<form action="addorder.php" method="post">
                	<input type="hidden" value="Chef's Station" name="stallname">
                    <table>
                    	<tr>
                        	<td class="tbl-heading">NAME</td>
                            <td class="tbl-heading">PRICE</td>
                            <td class="tbl-heading">QTY</td>
                            <td class="tbl-heading">TOTAL</td>
                        </tr>
                    	<tr>
                        	<td><input type="checkbox" name="item-name[]" value="Fish Fillet"> <label>Fish fillet with Rice</label></td>
                            <td>65.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                        <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Chicken Lollipop"> <label>Chicken Lollipop (6pcs)</label></td>
                            <td>70.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                         <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Beef Nilaga"> <label>Beef Nilaga with Rice</label></td>
                            <td>95.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                         <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Meaty Spaghetti"> <label>Meaty Spaghetti Pasta</label></td>
                            <td>60.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>	
                    </table>
                    <div id="totalall">Total: P<span>0</span></div>
                    <input type="submit" value="Add Order">
                </form>
            </div>
            <div class="mask"></div>
        </div>
        
        <div id="paotsin-con-form">
            <div class="paotsin-add">
                <h1>PAOTSIN</h1>
                <br />
            	<form action="addorder.php" method="post">
                	<input type="hidden" value="Paotsin" name="stallname">
                    <table>
                    	<tr>
                        	<td class="tbl-heading">NAME</td>
                            <td class="tbl-heading">PRICE</td>
                            <td class="tbl-heading">QTY</td>
                            <td class="tbl-heading">TOTAL</td>
                        </tr>
                    	<tr>
                        	<td><input type="checkbox" name="item-name[]" value="Asian Chicken"> <label>Asian Chicken & Dumplings</label></td>
                            <td>85.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                        <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Spicy Fish"> <label>Spicy Fish Dumpling/Sharks fin</label></td>
                            <td>49.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                         <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Laksa Soup"> <label>Dumplings with Laksa Soup</label></td>
                            <td>75.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                    </table>
                    <div id="totalall">Total: P<span>0</span></div>
                    <input type="submit" value="Add Order" />
                </form>
            </div>
            <div class="mask"></div>
        </div>
        
         <div id="allround-con-form">
            <div class="allround-add">
                <h1>ALl ROUND</h1>
                <br />
            	<form action="addorder.php" method="post">
                	<input type="hidden" value="All Round" name="stallname">
                    <table>
                    	<tr>
                        	<td class="tbl-heading">NAME</td>
                            <td class="tbl-heading">PRICE</td>
                            <td class="tbl-heading">QTY</td>
                            <td class="tbl-heading">TOTAL</td>
                        </tr>
                    	<tr>
                        	<td><input type="checkbox" name="item-name[]" value="Food1"> <label>Food 1</label></td>
                            <td>49.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                        <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Food2"> <label>Food 2</label></td>
                            <td>49.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                         <tr>
                       		<td><input type="checkbox" name="item-name[]" value="Food3"> <label>Food 3</label></td>
                            <td>49.00</td>
                            <td class="tbl-qty"></td>
                            <td class="total"></td>
                   		</tr>
                    </table>
                    <div id="totalall">Total: P<span>0</span></div>
                    <input type="submit" value="Add Order" />
                </form>
            </div>
            <div class="mask"></div>
        </div>
        
		<div id="content">
        <?php
			if($user->getUsertype() == 'Student' || $user->getUsertype() == 'Professor'){
		?>	
        	<div class="main">
            	<h1>Main Campus</h1>
                <br>
            	<div class="chef"><img src="assets/chef.svg" width="250px"></div>
                <div class="paotsin"><img src="assets/paotsin.svg" width="250px"></div>
				<div class="all-round"><img src="assets/allround.svg" width="250px"></div>
            </div>
		<?php
        	}
		?>
        <?php
			if($user->getUsertype() == 'stall'){
		?>	
        	<div id="allorders">
            	
            	<?php
					$q = "SELECT * FROM orders WHERE stallname=:stallname";
					$stmt = $pdo->prepare($q);
					$stmt->bindParam(':stallname',$user->getFirstname());
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					for ($r = 0; $r < count($result); $r++){
						?>
                        <div class="orderforms">
                        <?php	
						$q = "SELECT * FROM users WHERE userid=:userid";
						$stmt = $pdo->prepare($q);
						$stmt->bindParam(':userid',$result[$r][1]);
						$stmt->execute();
						$result2 = $stmt->fetchAll();
						
						echo "<p>Order from: " . $result2[0][1] . " " . $result2[0][2] . "</p>";
						
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
                        <?php
					}
				?>
            </div>
		<?php
        	}
		?>
        </div>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{ 
				$userid = $user->getUserid();
			}
			
			} else{
			header("Location:index.php");
			exit;
			}
		?>
		
	</body>
	
</html>