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
            <?php if (!empty($_SESSION)) { 
                if ($_SESSION['isStudent'] == 1) { ?>                      
                <div class="form-group">
                    <form action="<?php echo URL; ?>message/messageListerButton" method="POST" target="_blank">
                        <input type="hidden" name="rental_unit_id" value="<?php echo $rental_unit_id ?>" />
                        <input type="hidden" name="lister_id" value="<?php echo $lister_id ?>" />
                        <button class="listing-message-btn" name="message_button">Message Lister</button>
                    </form>
                </div>
            <?php }} else { ?>
                <a href="#signup" onclick="document.getElementById('popup-signup').style.display = 'block'"><button class="listing-message-btn">Message Lister</button></a>
            <?php } ?>
        </div>
        <div class="col-lg-8">
            <h2>About the Listing</h2>
            <p><?php if (isset($query->description)) echo htmlspecialchars($query->description, ENT_QUOTES, 'UTF-8'); ?></p>
            <h2>Amenities</h2>
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
<?php }
?>