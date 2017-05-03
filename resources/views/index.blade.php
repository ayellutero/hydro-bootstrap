@extends('layouts.app')

@section('content')
	<script src="http://maps.google.com/maps/api/js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

    <div id="mymap" style="width:100%;height:565px"></div>
    
    <script type="text/javascript">
        var stations = <?php print_r(json_encode($stations)) ?>;

        var mymap = new GMaps({
            el: '#mymap',
            lat: 14.1648,
            lng: 121.2413,
            zoom: 10
        });

        $.each( stations, function( index, value ){
            mymap.addMarker({
                lat: value.lat,
                lng: value.lng,
                title: value.location,

                click: function(e) {
                    alert('This is '+value.location);
                }
            });
        });
    </script>
@endsection