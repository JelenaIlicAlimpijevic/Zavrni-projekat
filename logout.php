<?php session_start();

 include('Post.php');
 ?>

<?php 

session_destroy();
redirect("sing_in.php");

 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='stil.css'/>
	</head>

	<body>
	Logout
	</body>
	</html>
