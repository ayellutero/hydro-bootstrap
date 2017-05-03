var stations = <?php print_r(json_encode($stations)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: 14.1648,
      lng: 121.2413,
      zoom:10
    });

    $.each( stations, function( index, value ){
	    mymap.addMarker({
	      lat: value.lat,
	      lng: value.lng,
	      title: value.city,
	      click: function(e) {
	        alert('This is '+value.city+', gujarat from India.');
	      }
	    });
   });