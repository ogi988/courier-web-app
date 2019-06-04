<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.0/mapbox-gl-directions.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.0/mapbox-gl-directions.css' type='text/css' />
<div id='map'></div>
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoib2dpOTgiLCJhIjoiY2p3aHQ2Nng4MDNmeDRjbjZoZGpicGJoYSJ9.LUeLGEx6A476wt_5w3QNxA';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v10',
        center: [20.459790,44.815525], // starting position
        zoom: 13

    });

    var canvas = map.getCanvasContainer();
    map.on('load', function() {
        getRoute();
    });
    function getRoute() {
        var start = [20.459872,44.815277];
        var end = [20.490145,44.795289];
        var directionsRequest = 'https://api.mapbox.com/optimized-trips/v1/mapbox/driving/'
            + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] +
            '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;
        //var adresa = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'+
           // ovde ide adresa format brulice ulica grad drzava +'.json?&access_token=' + mapboxgl.accessToken;

        $.ajax({
            method: 'GET',
            url: directionsRequest,
        }).done(function(data){
            var route = data.trips[0].geometry;
            map.addLayer({
                'id': 'route',
                'type': 'line',
                'source': {
                    'type': 'geojson',
                'data': {
                        'type': 'Feature',
                        'geometry': route
                    }
                }
            });
        });
    }






</script>
</body>
</html>