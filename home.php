
<?php session_start();
	
	include('blogic.php') ?>

<!DOCTYPE html>
<html>
	<head>
	<link rel='stylesheet' href='stil.css'/>
	</head>

	<body>
		<?php include('header.php') ?>

		<div class="container">
		<main>

			
			<?php

                 $posts=fetchAllPosts();

                 foreach ($posts as $post) { ?>
                       
			<h1><a href="prikaz_singl_blok_posta.php?post_id=<?php echo($post['id']) ?>"> <?php echo $post['title']?></a></h1>
			<div class="post">
				
			
				<date><?php echo $post['created_at']?></date> by <?php echo fetchUserWhoPosted($post)['first_name']. ' '.fetchUserWhoPosted($post)['last_name']?>
				<p><?php echo $post['content']?> </p>
				
			</div>
			<?php } ?>
							
			<div class="OandN">    
	        		<button>Older </button>
	        		<button>Newer</button>
	        </div>		
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