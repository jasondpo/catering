<?php include 'include/header.php'; ?>

  <body id="personnel">
	  
	<?php ?>  
	  	
  		
	<div class="catering-section-header personnel-bkg">
	    <div class="color-overlay"></div>
	    <h12 class="v-centered"><span>Folder</span>Personnel </h12>
		<!-- 	User name STARTS -->
		<?php include 'include/userName.php'; ?>
		<!-- 	User name ENDS -->
	</div>
	
	<div class="clientBanner">
		<h15><span>client:</span> <?php echo $_GET["client"]; ?></h15>
		<div class="arrow-down"></div>
	</div>
	
<!-- 	Directional Arrow Navigation STARTS -->
	<?php include 'include/arrowNav.php'; ?>
<!-- 	Directional Arrow Navigation ENDS -->

	<div class="container spacer-top spacer-bottom">
		
		<div class="row row-width">
			<div class="col-sm-12">
					<form action="location.php" autocomplete='off' method="post">
					Cooks:<br>
					<input type="number" id="username" class="inputClass" name="mainUsername" value="User Name"/>
					<br>
					<br>
					Waiters:<br>
					<input type="number" id="username" class="inputClass" name="mainUsername" value="User Name"/>
					<br>
					<br>
					Description:<br>		
					<textarea cols="40" name="comments" class="inputClass" rows="6" placeholder="Description..." onblur="if(this.placeholder==''){ this.placeholder='Description...'; }" onfocus="if(this.placeholder=='Description...'){ this.placeholder=''};"></textarea>
					<br>
					
					<input type="submit" name="submitMenuBtn" class="button" value="submit" />
							
				</form>
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>