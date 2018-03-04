<?php include 'include/header.php'; 
	
// RETRIEVE MENU
	$db = openDB();
    $sql = "SELECT maincourse, dessert, drinks FROM menu WHERE clientid = "."'".$_GET["cid"]."'"; 
    $ds = $db->query($sql);
    $cnt = $ds->rowCount();  
        
        $row = $ds->fetch(); // Get data row
		    
	if ($row != true){ 
        $_SESSION["menuBtn"]="false";
        }
        else{
		$_SESSION["menuBtn"]="true";
    } 	
?>

  <body id="menu">
	  	
	<div class="catering-section-header menu-bkg">
	    <div class="color-overlay"></div>
	    <h12 class="v-centered"><span>Folder</span>Menu</h12>
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
				
				 <form action="<?php echo $fullURL; ?>" autocomplete='off' method="post">
					Main course:<br>
					<textarea cols="40" name="capMainCourse" class="inputClass" rows="6" placeholder="Main course description..." onblur="if(this.placeholder==''){ this.placeholder='Main course description...'; }" onfocus="if(this.placeholder=='Main course description...'){ this.placeholder='';}"><?php echo $row['maincourse'];?></textarea>
					<br>
					<br>
					Dessert:<br>		
					<textarea cols="40" name="capDessert" class="inputClass" rows="6" placeholder="Dessert description..." onblur="if(this.placeholder==''){ this.placeholder='Dessert description...'; }" onfocus="if(this.placeholder=='Dessert description...'){ this.placeholder='';}"><?php echo $row['dessert'];?></textarea>
					<br>
					<br>
					Drinks:<br>		
					<textarea cols="40" name="capDrinks" class="inputClass" rows="6" placeholder="Beverage description..." onblur="if(this.placeholder==''){ this.placeholder='Beverage description...'; }" onfocus="if(this.placeholder=='Beverage description...'){ this.placeholder='';}"><?php echo $row['drinks'];?></textarea>
					<br>
					<br>
					<input type="submit" name="submitMenuBtn" class="button"  style="display: <?php if($_SESSION["menuBtn"]=="false"){echo "block";}else{echo "none";} ?>" value="Submit" />
					<input type="submit" name="updateMenuBtn" class="button" style="display: <?php if($_SESSION["menuBtn"]=="true"){echo "block";}else{echo "none";} ?>" value="Update" />
					<input type="submit" name="deleteMenuBtn" class="button-left" style="display: <?php if($_SESSION["menuBtn"]=="true"){echo "block";}else{echo "none";} ?>" value="Delete All" />
		
				</form>
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>
 
 