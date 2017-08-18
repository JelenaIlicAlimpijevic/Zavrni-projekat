<?php include('db.php') ?>
<?php
	
	function fetchUserById($id){
		$sql = "SELECT profiles.first_name, profiles.last_name FROM posts
                       INNER JOIN users ON users.id = profiles.user_id
                       WHERE users.id={$id}";

                $user=fetchSingleQueryResult($sql); 
          		return  $user;       
	}


    

	function fetchUserWhoPosted($post){

			$user=fetchSingleQueryResult("SELECT * FROM users WHERE id='{$post['created_by']}'");
      $whoCreated=fetchSingleQueryResult("SELECT * FROM profiles WHERE user_id='{$user['id']}'");

			return $whoCreated;

	}



	function fetchCommentsOnPost($post){


        	$allcomments=fetchRowsRelatedToRow("comments","comments.post_id", $post['id']); 
        	return  $allcomments;                  
	}



	function fetchPostsByUser($user) {

			$allposts=fetchRowsRelatedToRow("posts","posts.created_by", $user['id']); 
        	return  $allposts; 				
	} 



   	function fetchAllFromTable($table){

   				$sql="SELECT * FROM $table";
   				$tablica=fetchAllQueryResults($sql);
   				return $tablica;
   			}

 	function fetchAllPosts() {
 		 $allposts=fetchAllFromTable("posts"); 
 		 return $allposts;
 	}


?>