<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>หน้าแรก</title>
    <style type="text/css">
    html {
        height: 100%;
    }

    body {
        margin: 0px;
        height: 100%;
    }

    #map {
        height: 40%;
        width: 40%;
    }
    </style>
    <script src="https://api.longdo.com/map/?key=c6a189a4f8b88d7cee509691a363c224"></script>
    <!-- <script>
        var map;
        function init() {
            map = new longdo.Map({
                placeholder: document.getElementById('map')
            });
            var _lat = 7.162839933331753
            var _lon = 100.60416361802952
            map.location({ lon:_lon, lat:_lat }, true);
            var marker = new longdo.Marker({ lon: _lon, lat: _lat });
            map.Overlays.add(marker);
        }
    </script> -->
    <script>
    var map;
    var marker = new longdo.Marker({
        lon: 100.643005,
        lat: 14.525007
    });

    function init() {
        map = new longdo.Map({
            placeholder: document.getElementById('map')
        });
    }

    function dropMarker() {
        var result = map.location();
        console.log(result)
        alert(
            "lon: " + result.lon +
            "\nlat: " + result.lat
        )
        var _aa = new longdo.Marker({
            lon: result.lon,
            lat: result.lat
        });
        map.Overlays.drop(_aa);
    }
    </script>
</head>

<body onload="init();">
    <div id="map"></div>
    <div class = "mt-2">
        <button onclick="dropMarker()" class="btn btn-outline-info">ปักหมุด</button>
    </div>
</body>

</html>