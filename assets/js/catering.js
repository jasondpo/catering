// Log out 
$(function(){ 
	$('.uName, .userNameCircleLetter, .homeBtn').click(function(){
		$('.overlay').fadeIn('fast');
		$('.logOutWrapper').fadeIn('fast');
	});
	$('.overlay').click(function(){
		$('.overlay').fadeOut('fast');
		$('.logOutWrapper').fadeOut('fast');
	});
});

// Delete Client from list
$(function(){ 
	$('.deleteBtnClient').click(function(){
		$('.deleteClientBtn').click();
	});
});

// login & signup 
$(function(){ 	
	$('.signupBtn').click(function(){
		window.location.href = "signup.php";
	});
	$('.cancelBtn').click(function(){
		window.location.href = "index.php";
	});
});

// Create Account Page Navigation
function getName(obj){ 
	clientName=obj.textContent;
// 	clientName=clientName.replace(/\s/g, ''); //Removes white space
	clientId=obj.id
	window.location.href = "singleAccountPage.php?client="+clientName+"&"+"cid="+clientId;
}


// Single Account Page Navigation
$(function(){ 	
	$('.billingPgBtn').click(function(){
		getGlobal();
		window.location.href = "billing.php"+theGlobal;
	});
	$('.locationPgBtn').click(function(){
		getGlobal();
		window.location.href = "location.php"+theGlobal;
	});
	$('.menuPgBtn').click(function(){
		getGlobal();
		window.location.href = "menu.php"+theGlobal;
	});
	$('.themePgBtn').click(function(){
		getGlobal();
		window.location.href = "theme.php"+theGlobal;
	});
	$('.personnelPgBtn').click(function(){
		getGlobal();
		window.location.href = "personnel.php"+theGlobal;
	});
});

function getGlobal(){
	getURLPath=window.location.href;
	theGlobal=getURLPath.split(".php").pop();
};


// Delete Client
$(function(){ 
	$('.deleteBtn').click(function(event){
    	event.stopPropagation();
    	var ans= $(this).attr("id");
    	alert(ans);
/*
    	$("#deleteLog").val(ans);
    	$("#deleteLogBtn").click();
*/
	});	
});