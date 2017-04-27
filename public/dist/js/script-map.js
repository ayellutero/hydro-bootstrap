var map;
var myLatLng;

$(document).ready(function(){
	//myLatLng = new google.maps.LatLng(14.1648, 121.2413);

	myLatLng = new google.maps.LatLng(14.1648, 121.2413);

	geoLocationInit();

	function geoLocationInit(){
		if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(success, fail);
		}/**else{
			alert("Browser not supported.");
		}*/
		createMap(myLatLng);
	}

	function success(position){
		var latval = position.coords.latitude;
		var lngval = position.coords.longitude;

		myLatLng = new google.maps.LatLng(latval, lngval);

		nearbySearch(myLatLng, "school");
	}

	function fail(){
		//alert("Cannot locate current position.");
	}

	//creates map
	function createMap(myLatLng){
		map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			//scrollwheel: false,
			zoom: 10
		});

		var marker = new google.maps.Marker({
	    	position: myLatLng,
	    	map: map
	  	});
	}

	// marker, uses default icon for places
	function createMarker(latLng, icn, name){
		var marker = new google.maps.Marker({
	    	position: latLng,
	    	map: map,
	    	icon: icn,
	    	title: name
	  	});
	}

	// searches nearby locations
	function nearbySearch(myLatLng, type){
		var request = {
	    	location: myLatLng,
	    	radius: '2500',
	    	types: [type]
	  	};

	  	service = new google.maps.places.PlacesService(map);
	  	service.textSearch(request, callback);

	  	function callback(results, status) {

	  		console.log(results);
	  		if (status == google.maps.places.PlacesServiceStatus.OK) {
	    		for (var i = 0; i < results.length; i++) { //results are from the Object; result of service
	     			var place = results[i];
	     			latLng = place.geometry.location;
	     			name = place.name;
	     			icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

	      			createMarker(latLng, icn, name);
	    		}	
	  		}
		}
	}
  	
})