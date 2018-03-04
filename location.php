<?php include 'include/header.php'; ?>

  <body id="location">
	  
	<?php ?>  
	  	
  		
	<div class="catering-section-header location-bkg">
	    <div class="color-overlay"></div>
		<h12 class="v-centered"><span>Folder</span>LOCATION</h12>
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

				<form action="location.php" method="post">
					<br>
					<input type="text" id="address" class="inputClass" name="capAddress" placeholder="Address" onblur="if(this.placeholder==''){ this.placeholder='Address'; }" onfocus="if(this.placeholder=='Address'){ this.placeholder='';}"/>
					<br>
					<input type="text" id="city" class="inputClass" name="capCity" placeholder="City" onblur="if(this.placeholder==''){ this.placeholder='City'; }" onfocus="if(this.placeholder=='City'){ this.placeholder='';}"/>	
					<br>
					<input type="text" id="stateName" class="inputClass" name="capStateName" placeholder="State" onblur="if(this.placeholder==''){ this.placeholder='State'; }" onfocus="if(this.placeholder=='State'){ this.placeholder='';}"/>	
					<br>

					<textarea cols="40" name="capDiscription" rows="6" class="inputClass" placeholder="Please enter description..." onblur="if(this.placeholder==''){ this.placeholder='Please enter description...'; }" onfocus="if(this.placeholder=='Please enter description...'){ this.placeholder='';}"></textarea>
					<br>
					<br>
					<input type="submit" name="submitMenuBtn" class="button" value="submit" />
							
				</form>
				<br>
				<br>
				
				
				<!--This is where all the information is placed -->
				<button id="coordBtn">Show map</button> 
				<form method="post" action="location.php" style="display: block">
					<input type="text" name="capLat" id="lat">
					<br>
					<input type="text" name="capLng" id="lng">
					<br>
					<input type="text" name="theclientid" id="lng" value="<?php echo $_GET["cid"]; ?>">
					<br>
					<input type="submit" id="submitCoord" name="submitCoord" value="submit">
				</form>
				
				
				<br>
				<br>
				<div class="locatorMap"></div>
			</div>
			

		</div>
		
		
	</div>
	  	  

 <?php include 'include/footer.php'; ?>
 
 