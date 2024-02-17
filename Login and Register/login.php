<?php
    include_once 'header.php';

?>

    
	
	<form action="includes/login.inc.php" name="form" method="POST" class="form">
		
		<div class="container">
            <div class="rectangle"></div>
            <h1 class="h2" align="center"> Login </h1><br>
                
                
            <label>USER NAME: </label><br>
            <input type="text" placeholder=" Enter User Name / E-mail" class="username" name="username"><br><br>
                
            <label>PASSWORD: </label><br>
            <input type="password" placeholder="Enter Password" class="password" name="pwd"><br><br>
                
            <button name="submit" type="submit" class="login"> Login </button> 
                
            <label class="lable1">Don't have an account ?</label>
            <a href="signup.php" class="register">Register</a><br>
			
		</div>	
		
	</form>
	
<?php

?>


