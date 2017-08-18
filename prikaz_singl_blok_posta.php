

<?php session_start();

 include('Post.php');
 ?>

<?php 

	$post = new Post();
	if($post->isRequestMethodPost()){

		
		$post->MakeComment();
		
		
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

                if (isset($_GET['post_id'])) {

                    $postId = $_GET['post_id'];
                    //var_dump($postId);
                    $singlePost=fetchPostById($postId);
                    //var_dump($singlePost);
                   
                    $commentsql = "SELECT  comments.content, comments.created_at, profiles.first_name, profiles.last_name FROM comments
                                INNER JOIN users ON  users.id=comments.author
                                 INNER JOIN profiles ON users.id = profiles.user_id ORDER BY comments.created_at DESC LIMIT 3 ";
                	$comments=getPreparedStatement($commentsql);


                   // var_dump($comments);
                  // $user=fetchRelatedRow('users','users.id',$comments[0]['author']);

                	$tagssgl = "SELECT tags.name, tags.id FROM tags 
                    INNER JOIN post_tags ON post_tags.tag_id=tags.id
                    INNER JOIN posts ON post_tags.post_id=posts.id WHERE posts.id={$postId}";
                    
                    $tags=getPreparedStatement($tagssgl);
                    
                    ?>
				<h1> <?php echo($singlePost['title']) ?></h1>
				
				<?php echo($singlePost['created_at']) ?> by <?php echo($singlePost['first_name'] .' '. $singlePost['last_name'] ) ?>
				<div class="post">
				<p><?php echo($singlePost['content']) ?></p>
				<?php } ?>
			</div>

			
            

            

			<div class="tagovanje">
				tags:
                	<?php if(!empty($tags)) {
                     foreach ($tags as $tag) { ?>

                      <?php echo ($tag['name']) ?> 
                    <?php } ?>
                <?php } ?>
			</div>
			<div class="make-comment" >
				<form method="POST">
				<label for="comment">Add comment</label><br>
					<textarea name="comment" rows="5" ></textarea><br>
					<button> Add comment </button>
				</form>	
			</div>

			<div class="comments">
				<h2>comments</h2>
				<?php

                foreach ($comments as $comment) { ?>
                

                    <div class="comments">
                    	<?php echo ($comment['created_at']) ?> by <?php echo ($comment['first_name']  .' '.  $comment['last_name']) ?>
                        
                        <div class="single-comment">
                    
                            
                            <div><?php echo ($comment['content']) ?></div><br>
                        </div>
                    </div>
                   
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