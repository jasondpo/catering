<?php include 'include/header.php'; 
	
// RETRIEVE PERSONNEL
	$db = openDB();
    $sql = "SELECT cooks, waiters, description FROM personnel WHERE clientid = "."'".$_GET["cid"]."'"; 
    $ds = $db->query($sql);
    $cnt = $ds->rowCount();  
        
        $row = $ds->fetch(); // Get data row
		    
	if ($row != true){ 
        $_SESSION["personnelBtn"]="false";
        }
        else{
		$_SESSION["personnelBtn"]="true";
    } 	
	
?>

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
<!-- 				The number boxes should be side to side -->
					<form action="<?php echo $fullURL; ?>" autocomplete='off' method="post">
					Cooks:<br>
					<input type="number" class="inputClass" name="capCooks" placeholder="Number of cooks" value="<?php echo $row['cooks'];?>"/>
					<br>
					<br>
					Waiters:<br>
					<input type="number" class="inputClass" name="capWaiters" placeholder="Number of waiters" value="<?php echo $row['waiters'];?>"/>
					<br>
					<br>
					Description:<br>		
					<textarea cols="40" name="capPersonnelDesc" class="inputClass" rows="6" placeholder="Description..." onblur="if(this.placeholder==''){ this.placeholder='Description...'; }" onfocus="if(this.placeholder=='Description...'){ this.placeholder=''};"><?php echo $row['description'];?></textarea>
					<br>
					<br>
					<input type="submit" name="submitPersonnelBtn" class="button"  style="display: <?php if($_SESSION["personnelBtn"]=="false"){echo "block";}else{echo "none";} ?>" value="Submit" />
					<input type="submit" name="updatePersonnelBtn" class="button" style="display: <?php if($_SESSION["personnelBtn"]=="true"){echo "block";}else{echo "none";} ?>" value="Update" />
					<input type="submit" name="deletePersonnelBtn" class="button-left" style="display: <?php if($_SESSION["personnelBtn"]=="true"){echo "block";}else{echo "none";} ?>" value="Delete All" />
							
				</form>
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>