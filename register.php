<?php include('auth.php');?>
<?php 
	$auth = new Auth();
	if($auth->isRequestMethodPost()){

		$auth->register();
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='stil.css'/>
	</head>

	<body>
		<header>
			<div class="logo">
	 		<p>Vivify <strong>Ideas</strong></p> 
	 		</div>
	
			<div class="LinkUNavu">	
			<nav>

				<a href="about.php">About</a>
				<a href="contact.php">Contact</a>
				<a href="sing_in.php">Sing in</a>
			</nav>
		</div>	
		</header>

		<main>
			<div class="NoviKorisnik">
			<form method="POST">
				<label for="first_name">First name </label><br>
				<input type="text" name="first_name"><br>
				<label for="last_name">Last name </label><br>
				<input type="text" name="last_name"><br>
				<label for="date_of_birth">Date of birth </label><br>
				<input type="date" name="date_of_birth"><br>
				<label for="country">Country </label><br>
				<input type="text" name="country"><br>
				<label for="profession">Profession </label><br>
				<input type="text" name="profession"><br>

				<label for="email">Email </label><br>
				<input type="text" name="email"><br>

				<label for="password">Password</label><br>
				<input type="text" name="password"><br>
				<button type="submit" value="register"> Sing up </button>
			</form>	

			</form>

			</main>

		<footer>
			<div class="Copyright">	
					<p>Copyright 2017</p> <br>
			</div>
			
				<a class="LinkoviUFuteru" href="about.html">About </a>
				<a class="LinkoviUFuteru" href="contact.html">Contact </a>
				<a class="LinkoviUFuteru" href="sing_in.html"> Sing in </a>
			
			
		</footer>
	</body>	

</html>