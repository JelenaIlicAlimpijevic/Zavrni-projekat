<?php

	include('db.php');
	

	class Post
	{

	function isRequestMethodPost() 
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}	

	public function MakePost(){


			$title=$_POST['title'];
			$content=$_POST['conteiner'];
			$created_by=$_SESSION['current_user'];
			$d=date("Y-m-d");

			if (empty($title) || empty($content)){

				$errorMessage="Sva polja moraju biti popunjena";
				echo $errorMessage;
			} else {

				$post="INSERT INTO posts VALUES (null, '$title', '$content','macke','$d', '$created_by')";
				executeQuery($post);
			}
		}


	

	public function MakeComment(){
		 $content=$_POST['comment'];
		 $d=date("Y-m-d");
		 $author=$_SESSION['current_user'];


		 if (empty($content) || empty($author)){

				$errorMessage="Ne mozete komentarisati";
				echo $errorMessage;
			} else {

				$comment="INSERT INTO comments VALUES (null, '$content', '$d', '$author')";
				executeQuery($comment);
			}

		}

	public function DeletePost($postId){
			$created_by=$_SESSION['current_user'];
			// $postId = $_POST['post_id'];
			$post= fetchSingleQueryResult("SELECT * FROM posts WHERE id='$postId'");

			if($created_by !== $post['created_by']){
				$errorMessage="Ne mozete obrisati";
				echo $errorMessage;

			} else{
				$postDelete="DELETE FROM posts WHERE id='$postId'";
				$tagDelete="DELETE FROM post_tags WHERE post_id='$postId'";
				executeQuery($tagDelete);
				executeQuery($postDelete);
				redirect('home.php');
			}	


	}

		public function EditPost(){
			$created_by=$_SESSION['current_user'];
			$postId = $_GET['post_id'];
			$title=$_POST['title'];
			$content=$_POST['content'];
			$post= fetchSingleQueryResult("SELECT * FROM posts WHERE id='$postId'");

			if($created_by !== $post['created_by']){
				$errorMessage="Ne mozete editovati";
				echo $errorMessage;

			} else{
				$postEdit="UPDATE posts SET title='$title', content='$content' WHERE id='$postId'";	
				executeQuery($postEdit);
				redirect('home.php');
			}	


	} 
}	
?>