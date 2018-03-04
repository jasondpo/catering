$(function(){

	arrowNavInit();
	
	function arrowNavInit(){
		var bodyId = document.body.id;
		if(bodyId=="billing"){
			$('.arrowNavPrevText').html('Personnel');
			$('.arrowNavNextText').html('Location');
		}if(bodyId=="location"){
			$('.arrowNavPrevText').html('Billing');
			$('.arrowNavNextText').html('Menu');
		}if(bodyId=="menu"){
			$('.arrowNavPrevText').html('Location');
			$('.arrowNavNextText').html('Theme');
		}if(bodyId=="theme"){
			$('.arrowNavPrevText').html('Menu');
			$('.arrowNavNextText').html('Personnel');
		}if(bodyId=="personnel"){
			$('.arrowNavPrevText').html('Theme');
			$('.arrowNavNextText').html('Billing');
		}
	}
	

	$(".prevBtn").click(function(){
 		var bodyId = document.body.id;
 		getGlobalforArrowNav()
		if(bodyId=="billing"){
			window.location.href = "personnel.php"+globalForArrows;
		}if(bodyId=="location"){
			window.location.href = "billing.php"+globalForArrows;
		}if(bodyId=="menu"){
			window.location.href = "location.php"+globalForArrows;
		}if(bodyId=="theme"){
			window.location.href = "menu.php"+globalForArrows;
		}if(bodyId=="personnel"){
			window.location.href = "theme.php"+globalForArrows;
		}
	});
	
	
	$(".nextBtn").click(function(){
 		var bodyId = document.body.id;
 		getGlobalforArrowNav()
		if(bodyId=="billing"){
			window.location.href = "location.php"+globalForArrows;
		}if(bodyId=="location"){
			window.location.href = "menu.php"+globalForArrows;
		}if(bodyId=="menu"){
			window.location.href = "theme.php"+globalForArrows;
		}if(bodyId=="theme"){
			window.location.href = "personnel.php"+globalForArrows;
		}if(bodyId=="personnel"){
			window.location.href = "billing.php"+globalForArrows;
		}
	});
	
	function getGlobalforArrowNav(){
		var getURLPath=window.location.href;
		globalForArrows=getURLPath.split(".php").pop();
	};

	
})