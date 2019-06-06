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
        center: [20.459790,44.815525],
        zoom: 13

    });

    var canvas = map.getCanvasContainer();
    map.on('load', function() {
        getRoute();
    });
    function getRoute() {
        var start = [20.459872,44.815277];
        var end = [20.490145,44.795289];


        var i = 0;
        var adrese = {!! json_encode($adrese) !!};
        var duzina = adrese.length;
        var celaAdresa = [];
        var kordinate = [];
        for(i=0;i<duzina;i++){
            celaAdresa.push(adrese[i]['address']+' ' +adrese[i]['city'])
        }
        console.log(celaAdresa);
        for(i=0;i<duzina;i++) {

            var locationRequest = "https://us1.locationiq.com/v1/search.php?key=3faa509826caec&q="+celaAdresa[i]+"&format=json"
            var settings = {
                "async": true,
                "crossDomain": true,
                "dataType": "json",
                "url": locationRequest,
                "method": "GET"
            }

            $.ajax(settings).done(ajaxData);
        }
        function ajaxData(data) {
            //console.log(data[0]['lat']);
            //console.log(data[0]['lon']);
            kordinate.push(data[0]['lon']+','+data[0]['lat']);

            ku = kordinate;
            var str = "";
            ku.forEach(function(entry) {

                str += entry.toString() + ';' ;

            });
            var newStr = str.slice(0, -1);
            console.log(newStr);
            var directionsRequest = 'https://api.mapbox.com/optimized-trips/v1/mapbox/driving/'
                + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] + ';' + newStr+
                '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

            $.ajax({
                method: 'GET',
                url: directionsRequest,
            }).done(function(data){
                var route = data.trips[0].geometry;

                map.addLayer({
                    id: 'start',
                    type: 'circle',
                    source: {
                    type: 'geojson',
                    data: {
                        type: 'Feature',
                        geometry: {
                            type: 'Point',
                            coordinates: start
                        }
                    }
                },
                    paint: {
                        'circle-radius': 20,
                        'circle-color': 'white',
                        'circle-stroke-color': '#3887be',
                        'circle-stroke-width': 3
                    }
                });





                map.addLayer({
                    id: 'route',
                    type: 'line',
                    source: {
                        type: 'geojson',
                        data: {
                            type: 'Feature',
                            geometry: route
                        }
                    },
                    layout: {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    paint: {
                        'line-color': '#3887be',
                        'line-width': 5,
                        'line-opacity': 0.75
                    }
                });
                map.addLayer({
                    id: 'routearrows',
                    type: 'symbol',
                    source: 'route',
                    layout: {
                        'symbol-placement': 'line',
                        'text-field': '▶',
                        'text-size': [
                            "interpolate",
                            ["linear"],
                            ["zoom"],
                            12, 24,
                            22, 60
                        ],
                        'symbol-spacing': [
                            "interpolate",
                            ["linear"],
                            ["zoom"],
                            12, 30,
                            22, 160
                        ],
                        'text-keep-upright': false
                    },
                    paint: {
                        'text-color': '#3887be',
                        'text-halo-color': 'hsl(55, 11%, 96%)',
                        'text-halo-width': 3
                    }
                }, 'waterway-label');
            });

        }



    }




    // var geocodingRequest = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'+ +
    //     '.json?&access_token=' + mapboxgl.accessToken;
    // console.log(geocodingRequest);
    // $.ajax({
    //     method: 'GET',
    //     url: geocodingRequest,
    // }).done(function (data) {
    //     console.log(data.coordinate);
    // });
</script>
</body>
</html>