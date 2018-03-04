<?php include 'include/header.php'; ?>

  <body>
	
  	<div class="colored-bkg-page"></div>	
  	
  		
	<div class="catering-section-header billing-bkg">
	    <div class="color-overlay"></div>
	    <h12 class="v-centered">BILLING</h12>
	</div>

	<div class="container spacer-top spacer-bottom">
		<div class="row row-width">
			<div class="col-sm-12">
				<form action="xxx.php" autocomplete='off' method="post">
													
					<input type="text" id="password" class="inputClass" name="mainPassword" value="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password'){ this.value=''; this.type='password'}"/>
					<br>
					<br>
				<input type="text" id="username" class="inputClass" name="mainUsername" value="User Name" onblur="if(this.value==''){ this.value='User Name'; }" onfocus="if(this.value=='User Name'){ this.value='';}"/>
					
					<br>
					<br>
					<label>Label goes here</label><br>
					<textarea cols="40" name="comments" rows="6">please enter your comments...</textarea>		
					<br>
					<br>
					<label>Label goes here</label><br>
					<input type="radio" name="title" value="mr" />Mr.<br />
					<input type="radio" name="title" value="ms" />Ms.<br />
					<input type="radio" name="title" value="decline" checked="checked" />decline<br />	
					<br>
					<br>
					<label>Label goes here</label><br>
					<input type="checkbox" name="checkbox1"  />Mail me more info<br />
					<input type="checkbox" name="checkbox2" checked="checked"  />E-Mail me more info<br />
					<br>
					<br>
					<label>Label goes here</label><br>
					<select class="" >
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15 ">15</option>
						<option value="20">20</option>
					</select>
					<br>
					<br>
					<label>Label goes here</label><br>
					<select class="" size=3>
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15 ">15</option>
						<option value="20">20</option>
					</select>
					<br>
					<br>
					<input type="image" align="left" name="_Next" src="submitbutton.gif" />
					<br>
					<br> 
					<button class="" type="submit">OK</button>
					<br>
					<br> 	
					<input type="reset" name="submitbutton" value="cancel" />
					<br>
					<br> 
					<input type="submit" name="submitbutton" value="submit" />
									
				</form> 
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>