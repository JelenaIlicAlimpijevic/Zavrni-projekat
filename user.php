
<?php session_start();

 include('Post.php');?>

<?php 

	$postNew = new Post();
	if($postNew->isRequestMethodPost()){

		if ($_POST['action'] == 'add') {
			$postNew->MakePost();	
		}
		

		if ($_POST['action'] == 'delete') {
			$postNew->DeletePost($_POST['post_id']);
			redirect('user.php');

			//redirect
		}

	}

		$allPosts=fetchAllQueryResults("SELECT * FROM posts WHERE created_by='{$_SESSION['current_user']}'");	

		var_dump($allPosts);//
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='stil.css'/>
	</head>

	<body>
		<?php include('header.php') ?>
			<main>
				<div class="tablica">
				<table>
             <tr>
               <th>Name</th>
               <th>Options</th>
             </tr>
             <?php foreach ($allPosts as $post) { ?>
             <tr>
               <td><a href="prikaz_singl_blok_posta.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></td>
               <td><a href="/editpost.php?post_id=<?php echo $post['id'] ?>"> Edit</a> 
            <form method='POST'>   	
            	<input type="hidden" name="action" value="delete"><br>
            	<input type="hidden" name="post_id" value="<?php echo($post['id']) ?>"><br>
                <button type="submit" value="DeletePost"> Delete </button>
            </form> </td>
               <?php } ?>
             </tr>
				</table>
				</div>
				<div class="PostavljanjePostova">
				<form method="POST">
					<h3> Add new post </h3>
					<label for="title">Post title </label><br>
					<input type="text" name="title"><br>
					<label for="conteiner">Post conteiner</label><br>
					<textarea name="conteiner" rows="10"></textarea> <br>

					<input type="hidden" name="action" value="add"><br>

					<button> Save </button>
				</form>	
				</div>

			</main>

		<footer>
			<div class="Copyright">	
					<p>Copyright 2017</p> <br>
			</div>
			
					
				<a class="LinkoviUFuteru" href="home.php"> Home </a>
				<a class="LinkoviUFuteru" href="about.php">About </a>
				<a class="LinkoviUFuteru" href="contact.php">Contact </a>
				
				
			
		</footer>
	</body>	

</html>