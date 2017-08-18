<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='stil.css'/>
	</head>

	<body>
		<?php include('header.php') ?>
			<main>
				<div class="Poruka">
				<form>
					<h1> Contact us </h1>
					<label for="your_email">Your email </label><br>
					<input type="text" name="your_email"><br>
					<label for="your_message">Your message</label><br>
					<textarea name="your_message" rows="10"></textarea><br>
					<button> Save </button>
				</form>	
				</div>

			</main>

		<footer>
			<footer>
			<div class="Copyright">	
					<p>Copyright 2017</p> <br>
			</div>
			
				<a class="LinkoviUFuteru" href="home.html"> Home </a>
				<a class="LinkoviUFuteru" href="about.html">About </a>
				<a class="LinkoviUFuteru" href="contact.html">Contact </a>
				<a class="LinkoviUFuteru" href="home.html"> Home </a>
			
		</footer>
	</body>	

</html>