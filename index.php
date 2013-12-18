<html>

	<head>
		<title>Login</title>
		<link rel="stylesheet" href="css/style-login.css">
	</head>
	
	<body>
		<div id="logo-con">
			<div class="logo">
				<img src="assets/logo.svg" />
			</div>
			<div class="name">
				BENILDE<br>ORDERING SYSTEM
			</div>
		</div>
		<?php
		require('includes/utilities.inc.php');
		if($user){
		//clear the var
		$user = null;
		$_SESSION = array();
		//clear the cookie
		setcookie(session_name(), false, time()-3600);
		//destroy the session
		session_destroy();
		} //end usre
		?>
		<div id="login">
			<div class="arrow"></div>
			<div class="form">
                <form action="index.php" method="post">
                    <div class="username">
                        <div class="icon">
                            <img src="assets/logo-user.svg" width="25px">	
                        </div>
                        <div class="text">
                            <input type="text" name="username" id="txt-username" placeholder="Username">
                        </div>
                    </div>
                    <div class="password">
                        <div class="icon">
                            <img src="assets/logo-pass.svg" width="25px">	
                        </div>
                        <div class="text">
                            <input type="password" name="password" id="txt-password" placeholder="Password">
                        </div>
                    </div>
                    <input type="submit" value="LOGIN">
                </form>
				<?php  
								
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{ 
					$username=$_POST['username'];
					$password=$_POST['password'];
					
					$q = 'SELECT * FROM users WHERE username=:username AND password=:pass';
					$stmt = $pdo->prepare($q);
					$r = $stmt->execute(array(':username' => $username, ':pass' => $password));
					
					if ($r) {
						$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
						$user = $stmt->fetch();
					} //please add this code
					if ($user) {
						$_SESSION['user'] = $user;
						header("Location:home.php");
						exit;
					}
				}
                ?>
			</div>
		</div>	
	</body>
</html>