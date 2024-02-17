<?php
    include_once 'signupheader.php';
?>

    
	
<form action="includes/signup.inc.php" name="form" method="POST" class="form">
	
    <div class="container">
    
        <div class="rectangle"></div>
    
        <h1 align="center" class="register">Register</h1><br>
    
        <label>ACCOUNT NUMBER:</label><br>
        <input type="text" placeholder="Enter Account Number" class="AccNumber" name="AccNumber"><br> 
    
        <label>NAME:</label><br>
        <input type="text" placeholder="Enter Name" class="AccNumber" name="name"><br> 
    
        <label>E-MAIL ADDRESS:</label><br>
        <input type="email" placeholder="Enter E-mail Address" class="Email" name="email"><br> 
    
        <label>Password:</label><br>
        <input type="password" placeholder="Enter password" class="AccNumber" name="Password"><br>
        
        <label>Re-Password:</label><br>
        <input type="password" placeholder="Enter re-password" class="AccNumber" name="rePassword"><br>
    
        <a href="HomePage.php"><button type="button" class="cancel" name="cancel"> Cancel </button></a>
        <a href="login.php"><button type="submit" class="registered" name="submit"> Register </button></a><br>
        
        <div class="rectangle1"></div>
        
        <pre class="line">
        Complete your online banking registration 
         effortlessly for convenient and secure 
                  financial management
        </pre>
    
    </div>

    

</form>
	
<?php

?>


