$(document).ready(function(){	
 	
 	loadMap();

	$(function(){ // Press this btn
		$("#coordBtn").click(function(){
			getAddress();
			getLatLng();
		});
	})  
	function getAddress(){
		address = $("#address").val();
		address = address.replace(/\s+/g,'+');
		city = $("#city").val();
		state = $("#stateName").val();
		theAddress=address+",+"+city+",+"+state;  
	}
	
	
	function getLatLng(){
        $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+theAddress+"&key= AIzaSyD3YW8hDRZ3bIkHT_dKFHXmE-cD-mavhQQ", function(data){        
 			var status = data.status; 
	 			if(status=="ZERO_RESULTS"){
		 			alert("Address not found. Check spelling and numbers.")
	 			}                 
 			var lat = data.results[0].geometry.location.lat;
 			var lng = data.results[0].geometry.location.lng;
	        $("#lat").val(lat);
	        $("#lng").val(lng);
	        $("#submitCoord").click();
        });
    }
    
    function loadMap(){
	    $('.locatorMap').load("map.php");
    }   
});	  
