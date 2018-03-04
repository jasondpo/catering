<?php include 'include/header.php'; ?>

  <body id="index">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
            registerUser();
        }
    ?>  
	<div class="colored-bkg-home"></div>		
  <div class="container">	
	<div class="row">
		
        <div class="col-sm-6 col-sm-offset-3 logo">
        </div>
        
     </div>
  </div>
  
  <div class="container">	
	<div class="row ">
		
        <div class="col-sm-12">
	        
		    <form method="post" id="loginForm" autocomplete='off' action="index.php"> 
	       <input type="text" id="userName" class="registerfield" name="userName" value="User Name" onblur="if(this.value==''){ this.value='User Name'; }" onfocus="if(this.value=='User Name'){ this.value='';}"/>
	       
	       
	       <input type="text" id="userPassword" class="registerfield" name="userPassword" value="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password'){ this.value=''; this.type='password'}"/>
	       	
	<input type="submit" id="enter" class="login-btn" name="logIn" value="Login">       
	       
	       </form> 
	       
        </div>
        
     </div>
  </div>
	  

		
	<div class="signupBtn"><h11>Sign up</h11></div>

	  
	  

<?php include 'include/footer.php'; ?>