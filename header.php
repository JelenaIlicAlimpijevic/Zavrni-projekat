<header>

	<div class="logo">
			<p>Vivify <strong>Ideas</strong></p> 
	</div>
		
			<div class="LinkUNavu">	
				<nav>

					
					<a href="about.php">About</a>
					<a href="contact.php">Contact</a>
					
				
		<?php
				
				if(!empty($_SESSION['current_user'])){
				?>
					<a href="/logout.php" >Logout</a>
					
			<?php }  else {?>  

			<a href="/sing_in.php"> Login </a>
			<?php }?>
			
	 			</nav>
	</div>	
</header>