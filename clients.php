<?php include 'include/header.php'; ?>

  <body>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
//             registerUser();
        }
    ?>
	  	
  		
	<div class="catering-section-header clients-bkg">
		<div class="container">
	
		    <div class="row row-width">	
						
				<div class="col-sm-12">
				  	<form action="clients.php" autocomplete='off' method="post">
		  									
				  		<input type="text" id="clientName" class="inputClassClient" name="clientName" value="Client Name" onblur="if(this.value==''){ this.value='Client Name'; }" onfocus="if(this.value=='Client Name'){ this.value='';}"/>
				  		<input type="submit" class="submitClientBtn" name="submitClientBtn" value="+" />
				  		
					</form> 
	
				</div> <!-- Col ends -->
				
			</div> <!-- Row ends -->
		</div>
		
		<div class="deleteBar">
			<div class="deleteBtnCleintWrapper">
				<div class="deleteBtnClient"><h21>—</h21></div>
			</div>
		</div>
		
		<!-- 	User name STARTS -->
		<?php include 'include/userName.php'; ?>
		<!-- 	User name ENDS -->
	</div>

	<div class="container spacer-top spacer-bottom">
		
		<div class="row row-width">	
					
			<div class="col-sm-12  clientList">
				<form method="post" autocomplete='off' action="clients.php">	
					<br/>
					<br/>
					<input type="submit" class="deleteClientBtn" name="deleteClientBtn" value="Delete" style="display: none">
						<br/>
						<br/>
						<table class="cleintsTable">
							<?php echo displayClientList(); ?>
						</table>
				</form>
				
			</div> <!-- Col ends -->
			
		</div> <!-- Row ends -->
		
		
	</div> <!-- Container ends -->
	  
	  

 <?php include 'include/footer.php'; ?>
 
 
 

