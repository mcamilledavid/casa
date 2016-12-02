<div class="container" id="main-large">
    <div class="col-lg-2">
        <div style="border: 1px solid #e7e7e7; width: 100%; height: 300px;">
            <form action="<?php echo URL; ?>home/filteredSearch" method="POST">
                <h3> FILTERS </h3>                
                <div style="margin:5xp; padding: 12px;">     
                    <span style="width: 100%;">Rent</span> </br>
                    <input style="width: 48%;" type="tel" name="min_rent" placeholder="min" title="whole number, no letters or symbols" value="">
                    <input style="width: 48%;" type="tel" name="max_rent" placeholder="max" title="whole number, no letters or symbols" value="">
                </div>            
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Type</span>
                    <select style="float: right; width: 50%;" name="type">
                        <option value="Any">Any</option>
                        <option value="Apartment">Apartment</option>
                        <option value="House">House</option>
                        <option value="Condo">Condo</option>
                        <option value="Studio">Studio</option>
                        <option value="Private Bedroom">Private Bedroom</option>
                        <option value="Shared Bedroom">Shared Bedroom</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Beds</span>
                    <select style="float: right; width: 50%;" name="min_beds">
                        <option value="Any">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Baths</span>
                    <select style="float: right; width: 50%;" name="min_baths">
                        <option value="Any">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Campus Proximity</span>
                    <select style="float: right; width: 50%;" name="distance_from_campus">
                        <option value="Any">Any</option>
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
                </div><br/>

                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Lease Length</span>
                    <select style="float: right; width: 50%;" name="max_lease_length">
                        <option value="Any">Any</option>
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
                </div></br>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Pets</span>
                    <select style="float: right; width: 50%;" name="pets">
                        <option value="Any">Any</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Laundry</span>
                    <select style="float: right; width: 50%;" name="laundry">
                        <option value="Any">Any</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Smoking</span>
                    <select style="float: right; width: 50%;" name="smoking">
                        <option value="Any">Any</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Furnished</span>
                    <select style="float: right; width: 50%;" name="furnished">
                        <option value="Any">Any</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Parking</span>
                    <select style="float: right; width: 50%;" name="parking">
                        <option value="Any">Any</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div style="margin:5xp; padding: 12px;">
                    <span style=" float: left; width: 50%;">Deposit</span>
                    <select style="float: right; width: 50%;" name="deposit">
                        <option value="Any">Any</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-block post-btn" name="apply_filters">APPLY</button>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-block post-btn" name="clear_filters">CLEAR</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-10">
        <?php
        $count = 0;
        foreach ($query as $query) {
            $rental_unit_id=$query->rental_unit_id;
            $lister_id=$query->lister_id;
            ?>
            <div class="listing-container">
                <div class="listing-image-container">
                    <div class="listing-price"><?php if (isset($query->rent)) echo '$' . htmlspecialchars($query->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                      <form action="<?php echo URL; ?>favorites/addFavorite" method="POST" target="hiddenframe">
                        <button type="submit" value="<?php echo $rental_unit_id ?>" name="add_favorite" class="favorite-btn"><i class="ionicons ion-ios-heart"></i></button>
                    </form> 
                    <iframe name="hiddenframe" style="display:none;"></iframe>
                    <?php
                    if (isset($query->thumbnail)) {
                        echo "<img src='data:image/jpeg;base64," . base64_encode($query->thumbnail)
                        . "' alt='Item image' class='thumbnail' height='auto'>";
                    }
                    ?>
                </div>
                <div class="listing-preview">
                    <h4><a href="#" target="_blank"><?php if (isset($query->title)) echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?></a></h4>
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
                    <?php if (!empty($_SESSION)) { ?>

                        <div class="form-group">
                            <a href="#message?rental_unit_id=<?php echo $rental_unit_id ?>,lister_id=<?php echo $lister_id ?>" onclick="document.getElementById('popup-message').style.display = 'block'"><button class="listing-message-btn">Message Lister</button></a>
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