<?php
session_start();

if(isset($_POST['logoutSite'])){
	session_unset();
	session_destroy();		
}	 	
	
function openDB(){
    //$servername = "jasondpo.ipowermysql.com"; live host
	//$username = "jasontv"; live host
	//$password = "codetv"; live host
	$username = "root";
	$password = "root";
	$dbname = "Catering";
	$charset = 'utf8';	

	// $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); live host
    $db = new PDO("mysql:host=localhost;dbname=$dbname; charset=$charset", $username, $password);
	if ($db != true){
    die("Unable to open DB ");
    }
    return($db);             
}

function createTables(){
    $db=openDB();
    		
	    $sql ="DROP TABLE IF EXISTS user, client, billing, location, menu, theme, personnel";
	      $result = $db->query($sql);
            If ( $result != true){
            	die("Unable to drop media and/or user tables<br>");
            }
            else{
            	ECHO "<br>User and media tables dropped<br>";                
            }
	            
//////////////////////////////////// NEW TABLES //////////////////////////////////// 

 	            	          
		// USER TABLE
	    $sql="CREATE TABLE user ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."username VARCHAR(50) NOT NULL,"
	    ."password VARCHAR(50) NOT NULL);"
	    ."INSERT INTO user (username, password)"
	    ." VALUES"."('Guest','Guest');";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create user table<br>");
	   }
	   else{
	        ECHO "<br> User table created<br>";                
	    }
	
		// CLIENT TABLE
		 $sql="CREATE TABLE client ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."clientname VARCHAR(100) NOT NULL,"
	    ."date VARCHAR(100) NOT NULL,"
	    ."userid VARCHAR(50) NOT NULL,"
	    ."clientstatus VARCHAR(50) NOT NULL);";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Client table<br>");
	   }
	   else{
	        ECHO "<br> Client table created<br>";                
	    }
	    
	    // LOCATION TABLE
		$sql="CREATE TABLE location ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."address TEXT NOT NULL,"
	    ."city VARCHAR(100) NOT NULL,"
	    ."state VARCHAR(50) NOT NULL,"
	    ."lat VARCHAR(50) NOT NULL,"
	    ."lng VARCHAR(50) NOT NULL,"
	    ."description TEXT NOT NULL,"
	    ."userid TEXT NOT NULL,"
	    ."clientid VARCHAR(50) NOT NULL);";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Location table<br>");
	   }
	   else{
	        ECHO "<br> Location table created<br>";                
	    }

		// MENU TABLE
		$sql="CREATE TABLE menu ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."userid TEXT NOT NULL,"
	    ."maincourse TEXT NOT NULL,"
	    ."dessert TEXT NOT NULL,"
	    ."drinks TEXT NOT NULL,"
	    ."clientid VARCHAR(50) NOT NULL);";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Menu table<br>");
	   }
	   else{
	        ECHO "<br> Menu table created<br>";                
	    }
	    
	    // THEME TABLE
		$sql="CREATE TABLE theme ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."userid TEXT NOT NULL,"
	    ."theme TEXT NOT NULL,"
	    ."themedesc TEXT NOT NULL,"
	    ."clientid VARCHAR(50) NOT NULL);";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Theme table<br>");
	   }
	   else{
	        ECHO "<br>Theme table created<br>";                
	    }
	    
	    
	    // Personnel TABLE
		$sql="CREATE TABLE personnel ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."maincourse TEXT NOT NULL,"
	    ."dessert TEXT NOT NULL,"
	    ."drinks TEXT NOT NULL,"
	    ."clientid VARCHAR(50) NOT NULL);";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Personnel table<br>");
	   }
	   else{
	        ECHO "<br>Personnel table created<br>";                
	    }


	    // Billing TABLE
		$sql="CREATE TABLE billing ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."personnelcost TEXT NOT NULL,"
	    ."maincoursecost TEXT NOT NULL,"
	    ."drinkscost TEXT NOT NULL,"
	    ."dessertcost TEXT NOT NULL,"
	    ."themecost TEXT NOT NULL,"
	    ."billingdesc VARCHAR(50) NOT NULL);";
	   	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Billing table<br>");
	   }
	   else{
	        ECHO "<br>Billing table created<br>";                
	    }	    
}

/////////////// Register users and validate logon process ///////////////

//////// REGISTER USER  
function registerUser(){ 
    if(isset($_POST["register"])){
	// User clicked register button      
        if ($_POST["userPassword"] != $_POST["verifypassword"]){
            echo "<script>alert('Passwords do not match');</script>";
			echo"<script>window.open('signUp.php','_self');</script>";
            exit();
        }else{
	        echo "<script>alert('Password match');</script>";

        }
        
	// Both passwords match, see if user name already in use      
            $db = openDB();               
            $query = "SELECT password FROM user WHERE username= '".$_POST['userName']."' ;";
            $ds = $db->query($query);
            $cnt = $ds->rowCount();
            if ($cnt == 1){	            
            	echo "<script>alert('User name already registered, use different name');</script>";
				echo"<script>window.open('index.php','_self');</script>";
                exit();              
            }else{
	            echo "<script>alert('Username and password accepted');</script>";
            }
                        
            //Add to user table
            
            
			$sql ="INSERT INTO `user` (`password`,`username`)"
                ." VALUES " 
                ."( '"
                .$_POST['userPassword']."','"
                .$_POST['userName']."');"; 
            $result = $db->query($sql);

            if ( $result != true){
                //Log errors
               LogMsg("user  insert ", $sql);
            }else{
	            $last_id = $db->lastInsertId();
				session_start(); 
				$_SESSION["userpw"] = $_POST['userPassword'];
				$_SESSION["userName"] = $_POST['userName'];
				$_SESSION["userId"] = $last_id;
				echo"<script>window.open('clients.php','_self');</script>";
                exit();
            }        
    }
 }   
 
 	//////// RETURNING USER  
	if(isset($_POST["logIn"])){

		$db = openDB();               
		$query = "SELECT password, id FROM user WHERE username='".$_POST['userName']."' ;";
		$ds = $db->query($query);
		$cnt = $ds->rowCount();		
		if ($cnt == 1 ){
			
			$row = $ds->fetch(); // Get data row			
						
			if($row["password"]==$_POST['userPassword']){
				//echo"<script>alert('User is verified')</script>";
				session_start(); 
				$_SESSION["userpw"] = $_POST['userPassword'];
				$_SESSION["userName"] = $_POST['userName'];
				$_SESSION["userId"] = $row["id"];
				echo"<script>window.open('clients.php','_self');</script>";
				exit();
			}else{
				echo"<script>alert('User name or password is incorrect.')</script>";
				echo"<script>window.open('index.php','_self');</script>";
		        exit();
		    }
		}else{
			echo"<script>alert('User name or password is incorrect.')</script>";
			echo"<script>window.open('index.php','_self');</script>";
		    exit();
		}
	}
	

///////////////////////////////////////////////////////////////////////////////////////////////////////////


	//////// CREATE CLIENT
	
if(isset($_POST["submitClientBtn"])){
	date_default_timezone_set('america/new_york');
    $db = openDB();
        $sql ="INSERT INTO client (date, userid, clientname)"
                  ." VALUES " 
                ."( '"
                .date("n.j.y")."','"
                .$_SESSION["userId"]."','"
                .$_POST['clientName']."' );"; 
        $result = $db->query($sql);
        if ( $result != true){
            ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save activity data</h102></div></div>";
         //  LogMsg("contacts.php insert contacts", $sql);
         exit();
        }
        else{
          //  ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Activity saved</h102></div></div>";
        }
      // initSession();  
} 

	 
	//////// DISPLAY CLIENT LIST
 function displayClientList(){
    
    $db = openDB();               
    $query = "SELECT id, clientname, date FROM client WHERE userid='".$_SESSION["userId"]."' ORDER BY id DESC";
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No activities found </span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	
    foreach ($ds as $row){
        echo '<tr class="clientRow"><td width="40" class="radioBlock"> <input type="radio" value="'.$row["id"].'" name="theClientID"/></td> <td class="clientBlock" onclick="getName(this)" id="'.$row["id"].'"><h14>'.$row["clientname"].'</h14></td><td class="dateBlock" width="60">'.$row["date"].'</td>  </tr>';
    }
}  

/////////////////////////// Delete CLIENT ///////////////////////////

if (isset($_POST["deleteClientBtn"])){
    $db = openDB();
        $sql ="DELETE FROM `client` WHERE id = "."'".$_POST['theClientID']."'"; 
        $result = $db->query($sql);
      
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////////////////// MENU SECTION STARTS ////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////// 

// SUBMIT MENU
if(isset($_POST["submitMenuBtn"])){
    $db = openDB();
        $sql ="INSERT INTO menu (maincourse, dessert, drinks, clientid, userid)"
            ." VALUES " 
            ."(:themaincourse, :thedessert, :thedrinks,'".$_GET["cid"]."','".$_SESSION["userId"]."' );";

	       $ps=$db->prepare($sql);
		   $ps->bindParam(':themaincourse',$_POST['capMainCourse'],PDO::PARAM_STR);
		   $ps->bindParam(':thedessert',$_POST['capDessert'],PDO::PARAM_STR);
		   $ps->bindParam(':thedrinks',$_POST['capDrinks'],PDO::PARAM_STR);
		   $ps->execute();    
                    
        $result = $db->query($sql);
        if ( $result != true){
//             ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save Menu data</h102></div></div>";
        }
        else{
            //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Log data saved</h102></div></div>";
        }
		header("Location:menu.php".$_SESSION['theGlobal'],true,303);
        exit(); 
}

 // UPDATE MENU
 if (isset($_POST["updateMenuBtn"])){
	$db = openDB();
	    $sql ="UPDATE menu  SET maincourse = :themaincourse, dessert =  :thedessert, drinks =  :thedrinks  WHERE clientid ='".$_GET["cid"]."'";
	       
	       $ps=$db->prepare($sql);
		   $ps->bindParam(':themaincourse',$_POST['capMainCourse'],PDO::PARAM_STR);
		   $ps->bindParam(':thedessert',$_POST['capDessert'],PDO::PARAM_STR);
		   $ps->bindParam(':thedrinks',$_POST['capDrinks'],PDO::PARAM_STR);
		   $ps->execute();                    
	
	    $result = $db->query($sql);
	    if ( $result != true){         
        //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Could not update project info</h102></div></div>";
	    }
	    else{
	    //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Project updated</h102></div></div>";
	    }
    header("Location:menu.php".$_SESSION['theGlobal'],true,303);	     	  	     	  
 }


// DELETE MENU
if (isset($_POST["deleteMenuBtn"])){
    $db = openDB();
        $sql ="DELETE FROM `menu` WHERE clientid = "."'".$_GET["cid"]."'"; 
        $result = $db->query($sql);
        if ( $result != true){           
		//ECHO "<script>alert('Project could not be deleted');</script>";
        }
        else{
		//ECHO "<script>alert('Project deleted');</script>";
        }
    header("Location:menu.php".$_SESSION['theGlobal'],true,303);	     
}

         
//////////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////////////////// MENU SECTION ENDS //////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////// 


//////////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////////////////// THEME SECTION STARTS ///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////// 



// SUBMIT THEME
if(isset($_POST["submitThemeBtn"])){
    $db = openDB();
        $sql ="INSERT INTO theme (theme, themedesc, clientid, userid)"
            ." VALUES " 
            ."('".$_POST["capTheme"]."',:theCapThemeDesc,'".$_SESSION["cid"]."','".$_SESSION["userId"]."' );";

	       $ps=$db->prepare($sql);
		   $ps->bindParam(':theCapThemeDesc',$_POST['capThemeDesc'],PDO::PARAM_STR);
		   $ps->execute();    
                    
        $result = $db->query($sql);
        if ( $result != true){
//             ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save Menu data</h102></div></div>";
        }
        else{
            //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Log data saved</h102></div></div>";
        }
		header("Location:theme.php".$_SESSION['theGlobal'],true,303);
        exit(); 
}


 // UPDATE THEME
if ( isset($_POST["updateThemeBtn"])){
    $db = openDB();
        $sql ="UPDATE theme SET themedesc = :theCapThemeDesc, theme = '".$_POST["capTheme"]."' WHERE clientid = '".$_SESSION["cid"]."'"; 
                
			$ps=$db->prepare($sql);
		    $ps->bindParam(':theCapThemeDesc',$_POST["capThemeDesc"],PDO::PARAM_STR);
		    $ps->execute();                                            

        $result = $db->query($sql);
        if ( $result != true){
//           ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Could not update project info</h102></div></div>";
        }
        else{
//             ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Project updated</h102></div></div>";
        }
    header("Location:theme.php".$_SESSION['theGlobal'],true,303);	     	  	     	  

}


// DELETE THEME
if (isset($_POST["deleteThemeBtn"])){
    $db = openDB();
        $sql ="DELETE FROM `theme` WHERE clientid = "."'".$_SESSION["cid"]."'"; 
        $result = $db->query($sql);
        if ( $result != true){           
		//ECHO "<script>alert('Project could not be deleted');</script>";
        }
        else{
		//ECHO "<script>alert('Project deleted');</script>";
        }
    header("Location:theme.php".$_SESSION['theGlobal'],true,303);	     
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////////////////// THEME SECTION ENDS //////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////// 




/////////////////////////// Store Locations?? ///////////////////////////

if(isset($_POST["submitCoord"])){
        $db = openDB();
//             $sql ="INSERT INTO location (address, city, state, lat, lng, description, clientid, userid)"
            $sql ="INSERT INTO location (lat, lng, clientid)"
                      ." VALUES " 
                    ."( '"
/*
                    .$_POST['capAddress']."','"
                    .$_POST['capCity']."','"
                    .$_POST['capStateName']."','"
*/
                    .$_POST['capLat']."','"
                    .$_POST['capLng']."','"
//                     .$_POST['capDiscription']."','"
                    .$_POST["theclientid"]."' );";
//                     .$_SESSION["userId"]."' );"; 
            $result = $db->query($sql);
            if ( $result != true){
                ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save Coordinate data</h102></div></div>";
             //  LogMsg("contacts.php insert contacts", $sql);
             exit();
            }
            else{
                //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Log data saved</h102></div></div>";
            }
          // initSession();  
 
    }
/////////////////////////// DSIPLAY LOCATION ///////////////////////////
function displayProjects(){
    
    $db = openDB();               
    $query = "SELECT id, xxxxxxxxx, xxxxxxxxx, xxxxxxxxx FROM xxxxxxxxx order by id" ;
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No projects found </span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	$x=1;
    foreach ($ds as $row){
        echo '<li class="clearfix"> <div class="projectNo"><h11>',$row["id"],'<h/11></div><h10 onClick="javascript:window.open(\'http://',$row["link"],'\',\'_self\');"><span>',$row["header"],'</span>',$row['description'],'</h10>  <div id="videoBtn',$x++,'"class="videoBtn" title="',$row["youtube"],'"onClick="playVidExample(\'',$row["youtube"],'\')";> </div></li>';
    }

}
////////////// Get current URL //////////////////
	$url = $_SERVER['REQUEST_URI'];
	$url = substr($url, strrpos($url, '/') + 1);
	if(strstr($url,"?")){
		$url = explode("?", $url, 2);
		$url =$url[0];
// 	 	echo "<script>alert('".$url."')</script>";
	}
// 	 	echo "<script>alert('".$url."')</script>";
?>






