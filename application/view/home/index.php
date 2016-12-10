<div class="row" id="home-header">
    <div class="home-title-container">
        <h1 class="top-title">Search for off-campus housing</h1>
        <h2 class="bottom-title">Rent student homes, apartments, and rooms near SF State.</h2>
        <div class="container">
            <form method="POST" action="<?php echo URL; ?>home/search" class="home-search-container">
                <div class="input-group">
                    <div class="inner-addon left-addon">
                        <i class="ionicons ion-ios-search ionicons-search-home"></i>
                        <input type="text" class="form-control home-search-form" name="search_value" value="" placeholder="Search by city, zipcode, rental type.">
                    </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default home-search-btn" name="submit_search">Search</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container" id="main-alt">
    <div class="col-lg-12 text-center">
        <div class="page-subtitle-container">
            <h2>Featured Listings</h2>
        </div>
        <?php
        $count = 0;
        foreach ($featured as $query) {
            $rental_unit_id = $query->rental_unit_id;
            $lister_id = $query->lister_id;
            ?>
            <div class="featured-listing-container">
                <div class="listing-image-container">
                    <div class="listing-price"><?php if (isset($query->rent)) echo '$' . htmlspecialchars($query->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                    <?php if (!empty($_SESSION)) { ?> 
                        <?php if (isset($_SESSION['isStudent']) && ($_SESSION['isStudent'] == 1)) { ?>
                            <form action="<?php echo URL; ?>favorites/addFavorite" method="POST" target="hiddenframe">
                                <button type="submit" value="<?php echo $query->rental_unit_id ?>" name="add_favorite" class="favorite-btn"><i class="ionicons ion-ios-heart"></i></button>
                            </form> 
                        <?php } ?>
                    <?php } ?>
                    <iframe name="hiddenframe" style="display:none;"></iframe>
                    <?php
                    if (isset($query->thumbnail)) {
                        echo "<img src='data:image/jpeg;base64," . base64_encode($query->thumbnail)
                        . "' alt='Item image' class='thumbnail' height='230'>";
                    }
                    if (!isset($query->thumbnail)) {
                        echo "<img src='" . URL . "img/default-thumbnail.jpg' title='default' width='330' height='230' class='thumbnail'>";
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
                                echo htmlspecialchars($query->beds, ENT_QUOTES, 'UTF-8') + "<p>Bedrooms</p>";
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
                        ?>
                    </p>
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
            </div>
            <?php
            $count++;
        }
        ?>
    </div>
</div>