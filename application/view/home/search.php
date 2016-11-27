<div class="container" id="main-large">
    <div class="col-lg-2">
        <div style="border: 1px solid #e7e7e7; width: 100%; height: 300px;"></div>
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
                      <form action="<?php echo URL; ?>favorites/addFavorite" method="POST">
                        <button type="submit" value="<?php $query->rental_unit_id ?>" name="add_favorite" class="favorite-btn"><i class="ionicons ion-ios-heart"></i></button>
                    </form> 
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
                            <a href="#message?rental_unit_id=<?= $rental_unit_id ?>,lister_id=<?= $lister_id ?>" onclick="document.getElementById('popup-message').style.display = 'block'"><button class="listing-message-btn">Message Lister</button></a>
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