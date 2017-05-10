$(document).ready(function(){
  var map = new google.maps.Map(document.getElementById('mymap'), {
    center: {lat: 14.1648, lng: 121.2413},
    zoom: 9
  });

  var request = {
    location: {lat: 14.1648, lng: 121.2413},
    radius: '15000',
    types: ['school']
  };

  service = new google.maps.places.PlacesService(mymap);
  service.nearbySearch(request, callback);

  function callback(request, status){
    if(status == google.maps.places.PlacesServiceStatus.OK) {
      for(var i = 0; i < results.length; i++) {
        var place = results[i];

        createMarker(results[i]);
      }
    }
  }
  
});