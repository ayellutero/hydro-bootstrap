@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js"></script>
  	<script src="{{ asset('dist/js/gmaps.js') }}"></script>

    @if(Session::has('status'))
    <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('status') }}
    </div>
    @endif 
    <div id="mymap" style="width:100%;border:1px solid red;height:565px"></div>
    
    <script type="text/javascript">
        var stations = <?php print_r(json_encode($stations)) ?>;

        var mymap = new GMaps({
            el: '#mymap',
            lat: 14.1648,
            lng: 121.2413,
            zoom: 10
        });

        $.each(stations, function(index, value ){
            mymap.addMarker({
                lat: value.lat,
                lng: value.lng,
	            title: value.location + ' ' + value.province,

                infoWindow:{
                    content: '<b>Device ID:</b>'
                },
                mouseover: function(e){
                    this['infowindow'].open(mymap, this); 
                }

                // click: function(e) {
                //     alert('Device ID: '+value.device_id+'sss');
                // }
            });
        });
    </script>
@endsection