<?php 

session_start();

 include('Post.php');

 

	$post = new Post();
	if($post->isRequestMethodPost()){

		$post->EditPost();
		redirect('user.php');
		
		
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

				<?php



				var_dump($_GET['post_id']);

                if (isset($_GET['post_id'])) {

                    $postId = $_GET['post_id'];

                   var_dump($postId);
                    $singlePost=fetchPostById($postId);
                    var_dump($singlePost);
                   
                   ?>
				
				<div class="EditovanjePostova">
				<form method="POST">
					<label for="title">Title </label><br>
					<input type="text" name="title" value="<?php echo $singlePost['title'] ?>"><br>
					<label for="content">Conteiner</label><br>
					<textarea name="content" rows="20" ><?php echo $singlePost['content'] ?></textarea> <br>

					<button type="submit" value="EditPost"> Save </button>
				</form>	

				<?php } ?>

				</div>

			</main>

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