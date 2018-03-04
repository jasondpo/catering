<?php include 'include/header.php'; ?>

  <body id="billing">
	  
	<?php ?>  	  	
  		
	<div class="catering-section-header billing-bkg">
	    <div class="color-overlay"></div>
	    <h12 class="v-centered"><span>Folder</span>Billing</h12>
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
				Billing page
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>