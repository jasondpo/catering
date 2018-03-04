// FOOTER Navigation
$(function(){ 
	$('.clientsBtn').click(function(){
		var getURLPath=window.location.href;
		var theGlobal=getURLPath.split(".php").pop();	
		window.location.href = "clients.php"+theGlobal;
	});
	$('.folderBtn').click(function(){
		var getURLPath=window.location.href;
		var theGlobal=getURLPath.split(".php").pop();
		window.location.href = "singleAccountPage.php"+theGlobal;
	});
});



