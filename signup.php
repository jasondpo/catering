<?php include 'include/header.php'; ?>

  <body id="signUp">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
            registerUser();
        }
    ?>
	
  	<div class="colored-bkg-page"></div>	
  	
  		
	<div class="catering-section-header">
	    <div class="color-overlay"></div>
	</div>

	<div class="container spacer-top spacer-bottom">
		<div class="row row-width">
			<div class="col-sm-12">
				<form method="post" name="registerForm" onsubmit="return checkRegistration();" autocomplete='off' action="signup.php" ng-controller="myPW">
			
			<div class="reg-form1">	
				
				<h80>Create a new account.</h80>
				<br>							
				<input type="text" class="inputStyle" id="registername" name="userName" value="Username" onblur="if(this.value==''){ this.value='Username';}" onfocus="if(this.value=='Username'){this.value=''}"/ >
				<br>
				<br>
				<input type="text" ng-change="runAll()" ng-model="myValue" class="inputStyle testInput" id="userPassword" name="userPassword" placeholder="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password' || this.placeholder=='Password'){ this.value=''; this.placeholder='';this.type='password';}"/> <br/><span class="pwStrength"><h81>Use at least 6 characters (letters and numbers)</h81></span>
				<br>
				<br>
				<input type="text" ng-change="runAll()" ng-model="myValue2" class="inputStyle testInput2" id="verifypassword" name="verifypassword" placeholder="Confirm Password" onblur="if(this.value==''){ this.value='Confirm Password'; this.type='text'}" onfocus="if(this.value=='Confirm Password' || this.placeholder=='Confirm Password'){ this.value=''; this.placeholder=''; this.type='password';}"/><span class="confirmPassword"><h81>No match</h81></span>
				<br>
				<input type="submit" name="register" id="submitbutton" value="Register" />				
&nbsp;&nbsp;<button type="button" id="cancelBtn" class="cancelBtn">Cancel</button>
				</form> 
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>