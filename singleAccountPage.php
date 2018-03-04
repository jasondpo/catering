<?php include 'include/header.php'; ?>

  <body id="singleAccountPage">
	  
	<?php ?>  
	  	
  		
	<div class="catering-section-header singleAccount-bkg">
	    <h12 class="v-centered"><span>Client</span>	    
	    	<?php echo $_GET["client"]; ?>
	    </h12>
		<!-- 	User name STARTS -->
		<?php include 'include/userName.php'; ?>
		<!-- 	User name ENDS -->
	</div>

	<div class="container spacer-top spacer-bottom">
		<div class="row row-width">
			<div class="col-sm-12 folderContainer">
				<ul class="folderList">
					<li class="billingPgBtn menuPgBtnClass"><h17 class="v-centered">Billing</h17></li>
					<li class="locationPgBtn menuPgBtnClass"><h17 class="v-centered">Time & Place</h17></li>
					<li class="menuPgBtn menuPgBtnClass"><h17 class="v-centered">Menu</h17></li>
					<li class="themePgBtn menuPgBtnClass"><h17 class="v-centered">Theme/Decor</h17></li>
					<li class="personnelPgBtn menuPgBtnClass"><h17 class="v-centered">Personnel</h17></li>
				</ul>
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>