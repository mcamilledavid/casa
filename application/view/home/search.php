<html>
    <body>
        <div class="container" id="main-large">
            <div class="row col-lg-3">
                <form action="<?php echo URL; ?>home/filteredSearch" method="POST">
                    <?php $filterMap = $_SESSION["FILTER_MAP"]; ?>
                    <h3>Search Filters</h3>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 left-input">
                                <p>Rent</p>
                                <input type="text" name="min_rent" placeholder="min" title="whole number, no letters or symbols" value="<?php echo $filterMap['min_rent']; ?>">
                            </div>
                            <div class="col-lg-6 right-input">
                                <input type="text" name="max_rent" placeholder="max" title="whole number, no letters or symbols" value="<?php echo $filterMap['max_rent']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Type</p>
                                <select name="type">
                                    <option value="Any" <?php if ($filterMap['type'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="Apartment" <?php if ($filterMap['type'] == "Apartment") echo "selected"; ?> >Apartment</option>
                                    <option value="House" <?php if ($filterMap['type'] == "House") echo "selected"; ?> >House</option>
                                    <option value="Condo" <?php if ($filterMap['type'] == "Condo") echo "selected"; ?> >Condo</option>
                                    <option value="Studio" <?php if ($filterMap['type'] == "Studio") echo "selected"; ?> >Studio</option>
                                    <option value="Private Bedroom" <?php if ($filterMap['type'] == "Private Bedroom") echo "selected"; ?> >Private Bedroom</option>
                                    <option value="Shared Bedroom" <?php if ($filterMap['type'] == "Shared Bedroom") echo "selected"; ?> >Shared Bedroom</option>
                                </select>                            
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 left-input">
                                <p>Beds</p>
                                <select name="min_beds">
                                    <option value="Any" <?php if ($filterMap['min_beds'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="col-lg-6 right-input">
                                <p>Baths</p>
                                <select name="min_baths">
                                    <option value="Any" <?php if ($filterMap['min_baths'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>                       
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Proximity</p>
                                <select name="distance_from_campus">
                                    <option value="Any" <?php if ($filterMap['distance_from_campus'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>                          
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 left-input">
                                <p>Deposit</p>
                                <select name="deposit">
                                    <option value="Any" <?php if ($filterMap['deposit'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1" <?php if ($filterMap['deposit'] == "1") echo "selected"; ?> >Yes</option>
                                    <option value="0" <?php if ($filterMap['deposit'] == "0") echo "selected"; ?> >No</option>
                                </select>                            
                            </div>
                            <div class="col-lg-6 right-input">
                                <p>Lease Length</p>
                                <select name="max_lease_length">
                                    <option value="Any" <?php if ($filterMap['max_lease_length'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 left-input">
                                <p>Pets</p>
                                <select name="pets">
                                    <option value="Any" <?php if ($filterMap['pets'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1" <?php if ($filterMap['pets'] == "1") echo "selected"; ?> >Yes</option>
                                    <option value="0" <?php if ($filterMap['pets'] == "0") echo "selected"; ?> >No</option>
                                </select>                           
                            </div>
                            <div class="col-lg-6 right-input">
                                <p>Laundry</p>
                                <select name="laundry">
                                    <option value="Any" <?php if ($filterMap['laundry'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1" <?php if ($filterMap['laundry'] == "1") echo "selected"; ?> >Yes</option>
                                    <option value="0" <?php if ($filterMap['laundry'] == "0") echo "selected"; ?> >No</option>
                                </select>              
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 left-input">
                                <p>Smoking</p>
                                <select name="smoking">
                                    <option value="Any" <?php if ($filterMap['smoking'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1" <?php if ($filterMap['smoking'] == "1") echo "selected"; ?> >Yes</option>
                                    <option value="0" <?php if ($filterMap['smoking'] == "0") echo "selected"; ?> >No</option>
                                </select>                          
                            </div>
                            <div class="col-lg-6 right-input">
                                <p>Furnished</p>
                                <select name="furnished">
                                    <option value="Any" <?php if ($filterMap['furnished'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1" <?php if ($filterMap['furnished'] == "1") echo "selected"; ?> >Yes</option>
                                    <option value="0" <?php if ($filterMap['furnished'] == "0") echo "selected"; ?> >No</option>
                                </select>            
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 left-input">
                                <p>Parking</p>
                                <select name="parking">
                                    <option value="Any" <?php if ($filterMap['parking'] == "Any") echo "selected"; ?> >Any</option>
                                    <option value="1" <?php if ($filterMap['parking'] == "1") echo "selected"; ?> >Yes</option>
                                    <option value="0" <?php if ($filterMap['parking'] == "0") echo "selected"; ?> >No</option>
                                </select>                        
                            </div>
                            <div class="col-lg-6 right-input">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-block" name="apply_filters">Apply</button>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-block" name="clear_filters">Clear</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <?php
                $count = 0;
                foreach ($query as $query) {

                    $rental_unit_id = $query->rental_unit_id;
                    $lister_id = $query->lister_id;
                    ?>
                    <div class="listing-container">
                        <div class="listing-image-container">
                            <div class="listing-price"><?php if (isset($query->rent)) echo '$' . htmlspecialchars($query->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php if (!empty($_SESSION)) { ?>  
                                <?php if (isset($_SESSION['isStudent']) && ($_SESSION['isStudent'] == 1)) { ?>
                                    <form action="<?php echo URL; ?>favorites/addFavorite" method="POST" target="hiddenframe">
                                        <button type="submit" value="<?php echo $rental_unit_id ?>" name="add_favorite" class="favorite-btn"><i class="ionicons ion-ios-heart"></i></button>
                                    </form> 
                                <?php } ?>
                            <?php } ?>
                            <iframe name="hiddenframe" style="display:none;"></iframe>
                            <?php
                            if (isset($query->thumbnail)) {
                                echo "<img src='data:image/jpeg;base64," . base64_encode($query->thumbnail)
                                . "' alt='Item image' class='thumbnail' height='280'>";
                            }
                            if (!isset($query->thumbnail)) {
                                echo "<img src='" . URL . "img/default-thumbnail-lrg.jpg' title='default' width='380' height='280' class='thumbnail'>";
                            }
                            ?>
                        </div>
                        <div class="listing-preview">
                            <h4><a href="<?php echo URL; ?>home/showSelectedListing?rental_unit_id=<?php echo $rental_unit_id ?>" target="_blank"><?php if (isset($query->title)) echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?></a></h4>
                            <p><?php if (isset($query->type)) echo htmlspecialchars($query->type, ENT_QUOTES, 'UTF-8'); ?> -
                                <?php
                                if (isset($query->beds)) {
                                    if ($query->beds == 1) {
                                        echo htmlspecialchars($query->beds, ENT_QUOTES, 'UTF-8');
                                        echo " Bedroom";
                                    } else {
                                        echo htmlspecialchars($query->beds, ENT_QUOTES, 'UTF-8');
                                        echo " Bedrooms";
                                    }
                                }
                                ?></p>
                            <p><?php if (isset($query->zipcode)) echo htmlspecialchars($query->zipcode, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p style="font-size: 16px; color: #333!important;"><?php
                                if (isset($query->date_created)) {
                                    if ($query->date_created < time()) {
                                        echo "Available Now";
                                    } else {
                                        echo "Available on " . $query->date_created;
                                    }
                                }
                                ?></p>
                            <p><?php
                                if (isset($query->pets)) {
                                    if ($query->pets == 1) {
                                        echo "<img src='" . URL . "img/Dog-50.png' title='pets' width='25' class='listing-icons'>";
                                    }
                                }
                                if (isset($query->smoking)) {
                                    if ($query->smoking == 1) {
                                        echo "<img src='" . URL . "img/Smoking-50.png' title='smoking' width='25' class='listing-icons'>";
                                    }
                                }
                                if (isset($query->laundry)) {
                                    if ($query->laundry == 1) {
                                        echo "<img src='" . URL . "img/Washing Machine-50.png' title='laundry' width='25' class='listing-icons'>";
                                    }
                                }
                                if (isset($query->parking)) {
                                    if ($query->parking == 1) {
                                        echo "<img src='" . URL . "img/Parking-50.png' title='parking' width='25' class='listing-icons'>";
                                    }
                                }
                                if (isset($query->furnished)) {
                                    if ($query->furnished == 1) {
                                        echo "<img src='" . URL . "img/Sofa-50.png' title='furnished' width='25' class='listing-icons'>";
                                    }
                                }
                                ?>
                            </p>
                            <p><?php
                                if (isset($query->date_created)) {
                                    echo "Posted on ";
                                    echo htmlspecialchars(date("m-d-Y", strtotime($query->date_created)), ENT_QUOTES, 'UTF-8');
                                }
                                ?></p>

                            <?php if (empty($_SESSION)) { ?>
                                <a href="#signup" onclick="document.getElementById('popup-signup').style.display = 'block'"><button class="listing-message-btn">Message Lister</button></a>
                            <?php } ?>
                            <?php if (!isset($_SESSION) && ($_SESSION['isStudent'] == 1)) { ?>                      
                                <div class="form-group">

                                    <form action="<?php echo URL; ?>message/messageListerButton" method="POST" target="_blank">
                                        <input type="hidden" name="rental_unit_id" value="<?php echo $rental_unit_id ?>" />
                                        <input type="hidden" name="lister_id" value="<?php echo $lister_id ?>" />
                                        <button class="listing-message-btn" name="message_button">Message Lister</button>
                                    </form>


                                </div>


                            <?php } ?>  
                        </div>
                    </div>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<h2>Sorry, no results found. Please try searching again.</h2>";
                }
                ?>
            </div>
        </div>   
    </body>
</html>
