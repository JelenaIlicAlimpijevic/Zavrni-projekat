<?php session_start(); 
include('auth.php');?>
<?php 
	$auth = new Auth();
	if($auth->isRequestMethodPost()){

		$auth->login();
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='stil.css'/>
	</head>

	<body>
		<?php include('header.php') ?>
			<main>
				<div class="Prijavljivanje">

					<form method="POST">
						<label for="email">Email </label><br>
						<input type="text" name="email" ><br>
						<label for="password">Password</label><br>
						<input type="text" name="password" ><br>
						<button type="submit" value="login"> Sing in </button>	
					
				</div>	

			</main>

		<footer>
			<div class="Copyright">	
					<p>Copyright 2017</p> <br>
			</div>
			
			<a class="LinkoviUFuteru" href="about.php">About </a>
			<a class="LinkoviUFuteru" href="contact.php">Contact </a>
			<a class="LinkoviUFuteru" href="sing_in.php">Sing in</a>
			<a class="LinkoviUFuteru" href="register.php"> Sing up </a>
			
		</footer>
	</body>	

</html>