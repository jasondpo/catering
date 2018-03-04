<?php include 'functions.php';?>
<?php if($_SESSION["userName"]=="" && $url!="index.php" && $url!="signup.php"){echo "<script>window.location.href = 'index.php';</script>";}?>
<?php
	$_SESSION["fullURL"]=$_SERVER['REQUEST_URI']; // This is for the form action on the 'folder' pages. Probably don't need since it's using the 'header' function
	$theGlobal=$_SERVER['REQUEST_URI'];
	$theGlobal= explode(".php", $theGlobal); 
	$_SESSION["theGlobal"]=$theGlobal[1]; //This is for the 'header' function in the functions.php
	$_SESSION["cid"]=$_GET["cid"]
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Catering</title>
   <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/style/catering.css">	

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
	<!-- Fonts START -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  
</head>