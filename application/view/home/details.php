<?php
foreach ($query as $query) {
    $rental_unit_id = $query->rental_unit_id;
    $lister_id = $query->lister_id;
    ?>
    <div class="row">
        <div class="crop">
            <?php
            if (isset($query->thumbnail)) {
                echo "<img src='data:image/jpeg;base64," . base64_encode($query->thumbnail)
                . "' alt='Item image'>";
            }
            if (!isset($query->thumbnail)) {
                echo "<img src='" . URL . "img/default-thumbnail.jpg' title='default' width='330' height='230' class='thumbnail'>";
            }
            ?>       
        </div>
    </div>
    <div class="container" id="main-alt">
        <div class="col-lg-8">
            <h1><?php if (isset($query->title)) echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?></h1>
            <p><?php if (isset($query->city)) echo htmlspecialchars($query->city, ENT_QUOTES, 'UTF-8'); ?>, <?php if (isset($query->state)) echo htmlspecialchars($query->state, ENT_QUOTES, 'UTF-8'); ?> | 
                Posted on <?php if (isset($query->date_created)) echo htmlspecialchars(date("m-d-Y", strtotime($query->date_created)), ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="col-lg-4">
            <h1>$<?php if (isset($query->rent)) echo htmlspecialchars($query->rent, ENT_QUOTES, 'UTF-8'); ?> / month</h1>
            <?php if (empty($_SESSION) || (!isset($_SESSION['isStudent']))) { ?>
                <a href="#signup" onclick="document.getElementById('popup-signup').style.display = 'block'"><button class="listing-message-btn">Message Lister</button></a>
            <?php } ?>
            <?php if (!empty($_SESSION)) { ?>  
                <?php if (isset($_SESSION['isStudent']) && ($_SESSION['isStudent'] == 1)) { ?>
                    <div class="form-group">
                        <form action="<?php echo URL; ?>message/messageListerButton" method="POST" target="_blank">
                            <input type="hidden" name="rental_unit_id" value="<?php echo $rental_unit_id ?>" />
                            <input type="hidden" name="lister_id" value="<?php echo $lister_id ?>" />
                            <button class="listing-message-btn" name="message_button">Message Lister</button>
                        </form>
                    </div>
                <?php } ?>  
            <?php } ?>
        </div>
        <div class="col-lg-8">
            <hr>
            <h2>About the Listing</h2>
            <p><?php if (isset($query->description)) echo htmlspecialchars($query->description, ENT_QUOTES, 'UTF-8'); ?></p>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4 row">
                        <h4>Details</h4>
                    </div>
                    <div class="col-lg-4 row">
                        <p>Bedrooms: <strong><?php if (isset($query->beds)) echo htmlspecialchars($query->beds, ENT_QUOTES, 'UTF-8'); ?></strong></p>
                        <p>Bathrooms: <strong><?php if (isset($query->baths)) echo htmlspecialchars($query->baths, ENT_QUOTES, 'UTF-8'); ?></strong></p>
                        <p>Lease Length: 
                            <strong>
                                <?php
                                if (isset($query->lease_length)) {
                                    if ($query->lease_length == 1) {
                                        echo htmlspecialchars($query->lease_length, ENT_QUOTES, 'UTF-8');
                                        echo " month";
                                    } else {
                                        echo htmlspecialchars($query->lease_length, ENT_QUOTES, 'UTF-8');
                                        echo " months";
                                    }
                                }
                                ?>                            
                            </strong>
                        </p>
                    </div>
                    <div class="col-lg-4 row">
                        <p>Campus Proximity: 
                            <strong>
                                <?php
                                if (isset($query->dist_from_campus)) {
                                    if ($query->dist_from_campus == 1) {
                                        echo htmlspecialchars($query->dist_from_campus, ENT_QUOTES, 'UTF-8');
                                        echo " mile";
                                    } else {
                                        echo htmlspecialchars($query->dist_from_campus, ENT_QUOTES, 'UTF-8');
                                        echo " miles";
                                    }
                                }
                                ?>
                            </strong>
                        </p>
                        <p>Security Deposit: <strong>$<?php if (isset($query->deposit)) echo htmlspecialchars($query->deposit, ENT_QUOTES, 'UTF-8'); ?></strong></p>
                        <p>Date Availability: 
                            <strong>
                                <?php
                                if (isset($query->date_created)) {
                                    if ($query->date_created < time()) {
                                        echo "Available";
                                    } else {
                                        echo "Available on " . $query->date_created;
                                    }
                                }
                                ?>
                            </strong>
                        </p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4 row">
                        <h4>Amenities</h4>
                    </div>
                    <div class="col-lg-8 row">
                        <p><?php
                            if (isset($query->pets)) {
                                if ($query->pets == 1) {
                                    echo "<p><img src='" . URL . "img/Dog-50.png' title='pets' width='25' class='listing-icons'> Pets</p>";
                                }
                            }
                            if (isset($query->smoking)) {
                                if ($query->smoking == 1) {
                                    echo "<p><img src='" . URL . "img/Smoking-50.png' title='smoking' width='25' class='listing-icons'> Smoking</p>";
                                }
                            }
                            if (isset($query->laundry)) {
                                if ($query->laundry == 1) {
                                    echo "<p><img src='" . URL . "img/Washing Machine-50.png' title='laundry' width='25' class='listing-icons'> Washer & Dryer</p>";
                                }
                            }
                            if (isset($query->parking)) {
                                if ($query->parking == 1) {
                                    echo "<p><img src='" . URL . "img/Parking-50.png' title='parking' width='25' class='listing-icons'> Parking</p>";
                                }
                            }
                            if (isset($query->furnished)) {
                                if ($query->furnished == 1) {
                                    echo "<p><img src='" . URL . "img/Sofa-50.png' title='furnished' width='25' class='listing-icons'> Furnished</p>";
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4 row">
                        <h4>Location</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $apikey = "AIzaSyCJGn_0w9R8smdIVwV38G-qgZocCoIhE7o";
    $street = $query->street;
    $city = $query->city;
    $state = $query->state;
    $zipcode = $query->zipcode;
    $address = $street . ', ' . $city . ', ' . $state . ', ' . $zipcode
?>
    <div class="row">
        <div style='
             overflow:hidden;
             height:450px;
             width:100%;'>
            <div id='gmap' style='height:450px;width:100%;'></div>
            <style>#gmap img{max-width:none!important;background:none!important}</style>
        </div>
    <script>
        // init gmaps
        function initMap() {
            var map = new google.maps.Map(document.getElementById('gmap'), {
                zoom: 18,
                center: {lat: -34.397, lng: 150.644} //defaults to SFSU coordinates
            });
        
        var geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map);
          
        var modes = document.getElementById('mode-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(modes);

      }
      // function for the geolocation 
        function geocodeAddress(geocoder, resultsMap) {
            var address = "<?php echo $address; ?>"
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    
                    //creates the circle img
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
                } 
                else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey; ?>&libraries=places&callback=initMap">
    </script>
    </div>
<?php }
?>