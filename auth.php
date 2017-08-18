
<?php 
 include('db.php');
 

		    
 class Auth {



	 	function isRequestMethodPost() 
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	function redirect($url) {
	    header("Location: http://localhost:1234/" . ltrim($url, '/'));
	    exit();
	}

	public function login()
	{ 

		$email = $_POST['email'];
        $password=$_POST['password'];

		//var_dump($_POST['email']);
		$user=fetchSingleQueryResult("SELECT * FROM users WHERE email='$email' AND password='$password'");
		//var_dump($user);
		
		if($user != false)
		{
			$_SESSION['current_user'] = $user['id'];
			redirect('user.php');
		} else {

	}
	}

	public function register()

	{
				$email = $_POST['email'];
            	$password=$_POST['password'];
            	$first_name=$_POST['first_name'];
            	$last_name=	$_POST['last_name'];
            
            	$country=$_POST['country'];
            	$profession=$_POST['profession'];
				$errorMessage = '';

		
		
			
			if(empty($_POST['first_name']) || empty($_POST['last_name'])  || empty($_POST['country']) || empty($_POST['profession']) ||empty($_POST['email']) || empty($_POST['password'])) 
			{
            $errorMessage = 'Sva polja su obavezna!';
            echo $errorMessage;
        	} else{

			$users=fetchSingleQueryResult("SELECT * FROM users WHERE email='$email'");
		//	var_dump($users);
// 
		// if (isRequestMethodPost())
		// {	
			 


			if (!empty($users))
			{
				$errorMessage = 'Korisnik sa unetim email vec postoji!';
				echo $errorMessage;
            }

            else {
            	
            	
            	$user= "INSERT INTO users VALUES (null, '$email', '$password', 'guest')";
           		
           		//var_dump($user);
            	executeQuery($user);


            	$userNew=fetchSingleQueryResult("SELECT * FROM users WHERE email='$email'");
            	//var_dump($userNew);
            	

            	$userNewID=$userNew['id'];

            $profil="INSERT INTO profiles VALUES (null, '$first_name','$last_name', '1980-04-21', '$country','$profession','$userNewID')";
            	executeQuery($profil);

            		redirect('sing_in.php');
            			 
            			}
        		
				}
		}
            // }
 	}