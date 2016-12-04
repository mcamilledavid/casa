<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
</head>
<body>
    <div class="row">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
        <div style='
             overflow:hidden;
             height:450px;
             width:100%;'>
            <div id='gmap_canvas' style='height:450px;width:100%;'></div>
            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
        </div>
        
        <script type='text/javascript'>
            function init_map(){
                var myOptions = {zoom:15, center:new google.maps.LatLng(37.7211776, - 122.47696229999997), mapTypeId: google.maps.MapTypeId.ROADMAP}; 
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions); 
                marker = new google.maps.Marker({
                    map: map, position: new google.maps.LatLng(37.7211776, - 122.47696229999997)
                }); 
                infowindow = new google.maps.InfoWindow({
                    content:'<strong>Casa</strong><br>1600 Holloway Ave. San Francisco, CA 94132<br>'
                }); 
                google.maps.event.addListener(marker, 'click', function(){infowindow.open(map, marker); }); 
                infowindow.open(map, marker); 
            }
                google.maps.event.addDomListener(window, 'load', init_map);
        </script>
        <!--
        <div id="gmap_canvas"></div>
            <script>
              function initMap() {
                var myLatLng = {lat: 37.7211776, lng: - 122.47696229999997};
                var map = new google.maps.Map(document.getElementById('gmap_canvas'), {
                  center: myLatLng,
                  zoom: 15
                });

                var infowindow = new google.maps.InfoWindow({
                        content:'<strong>Casa</strong><br>1600 Holloway Ave. San Francisco, CA 94132<br>'
                    });

                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                });

                google.maps.event.addListener(marker, 'click', function(){
                    infowindow.open(map, marker); 
                });  
              }
            </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJGn_0w9R8smdIVwV38G-qgZocCoIhE7o&callback=initMap">
        </script>-->
    </div>
     <div class="container" id="main-alt">
        <div class="col-lg-8">
            <h2>Contact Casa</h2>
            <br>
            <p>Please feel free to contact us if you have any questions or concerns.
                We would be happy to answer your questions over email, phone, or even in person.
                We are here to help you.</p>
            <div class="col-lg-4" style="padding: 0px!important;">
                <h3>Headquarters</h3>
                <p>1600 Holloway Ave.<br>
                    San Francisco, CA 94132</p>
            </div>
            <div class="col-lg-4" style="padding: 0px!important;">
                <h3>Customer Support</h3>
                <p>Email: <a href="#">support@casa.com</a><br>
                    Call: (888) 888-8888</p>
            </div>
        </div>
    </div>
</body