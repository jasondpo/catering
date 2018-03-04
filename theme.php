<?php include 'include/header.php'; 

// RETRIEVE Theme
	$db = openDB();
    $sql = "SELECT theme, themedesc, clientid, userid FROM theme WHERE clientid = "."'".$_SESSION["cid"]."'"; 
    $ds = $db->query($sql);
    $cnt = $ds->rowCount();  
        
    $row = $ds->fetch(); // Get data row
		    
	if ($row != true){ 
        $_SESSION["themeBtn"]="false";
        }
        else{
		$_SESSION["themeBtn"]="true";
    } 
?>
  <body id="theme">
	  
	<?php ?>  
	  	
  		
	<div class="catering-section-header theme-bkg">
	    <div class="color-overlay"></div>
	    <h12 class="v-centered"><span>Folder</span>Theme/Decor</h12>
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
					Theme:<br>
				 	<select name="capTheme" class="">
				 		<option value="Empty">- Select -</option>
				 		<option value="Religous" <?php if($row['theme']=="Religous"){echo "selected";}?> >Religous</option>
				 		<option value="Wedding" <?php if($row['theme']=="Wedding"){echo "selected";}?>>Wedding</option>
				 		<option value="Graduation" <?php if($row['theme']=="Graduation"){echo "selected";}?>>Graduation</option>
				 	</select>
					<br>
					<br>
					Description:<br>		
					<textarea cols="40" name="capThemeDesc" class="inputClass" rows="6" placeholder="Theme description..." onblur="if(this.placeholder==''){ this.placeholder='Theme description...'; }" onfocus="if(this.placeholder=='Theme description...'){ this.placeholder=''};"><?php echo $row['themedesc'];?></textarea>
					<br>
					<br>
					<input type="submit" name="submitThemeBtn" class="button" value="Submit" style="display: <?php if($_SESSION["themeBtn"]=="false"){echo "block";}else{echo "none";} ?>" />
					<input type="submit" name="updateThemeBtn" class="button" style="display: <?php if($_SESSION["themeBtn"]=="true"){echo "block";}else{echo "none";} ?>" value="Update" />
					<input type="submit" name="deleteThemeBtn" class="button-left" value="Delete All" style="display: <?php if($_SESSION["themeBtn"]=="true"){echo "block";}else{echo "none";} ?>"/>
							
				</form>
				
			</div>
		</div>
		
	</div>
	  
	  

 <?php include 'include/footer.php'; ?>