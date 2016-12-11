<?php
    $apikey = "AIzaSyCJGn_0w9R8smdIVwV38G-qgZocCoIhE7o";
    $street = "1600 Hollowway Ave";
    $city = "San Francisco";
    $state = "CA";
    $zip = "94132";
    $address = $street . ', ' . $city . ', ' . $state . ', ' . $zip
?>
<html>
  <head>
    <title>Test</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. Can alter the dimentions of the map
       with #map */

      #map {
        /* width: 300px;
        height: 400px;*/
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: {lat: -34.397, lng: 150.644} //defaults to SFSU coordinates
        });
    
        var geocoder = new google.maps.Geocoder();
          geocodeAddress(geocoder, map);
        
        var modes = document.getElementById('mode-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(modes);

      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = "<?php echo $address; ?>"
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
              resultsMap.setCenter(results[0].geometry.location);
        var cityCircle = new google.maps.Circle({
            strokeColor: '#0000ff',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#3333ff',
            fillOpacity: 0.35,
            map: resultsMap,
            center: results[0].geometry.location,
            radius: 50
        });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey; ?>&libraries=places&callback=initMap">
    </script>
  </body>
</html>