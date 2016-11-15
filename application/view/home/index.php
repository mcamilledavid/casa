<div class="row" id="home-header">
    <h1 class="home-title">Find a home<br>
        near SF State.<br>
    </h1>
</div>
<div class="container" id="main">
    <div class="container">
        <h2 class="text-center">Featured Listings</h2>
        <div class="col-lg-12">
            <?php
        $count = 0;
        foreach ($featured as $query) {
            ?>
            <div class="listing-container">
                <div class="listing-price"><?php if (isset($query->rent)) echo '$' . htmlspecialchars($query->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php
                if (isset($query->thumbnail)) {
                    echo "<img src='data:image/jpeg;base64," . base64_encode($query->thumbnail)
                    . "' alt='Item image' class='listing-thumbnails'>";
                }
                ?>
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
                                echo "<img src='../public/img/Dog-50.png' title='' width='25' class='listing-icons'>";
                            }
                        }
                        if (isset($query->smoking)) {
                            if ($query->pets == 1) {
                                echo "<img src='../public/img/Smoking-50.png' title='' width='25' class='listing-icons'>";
                            }
                        }
                        if (isset($query->laundry)) {
                            if ($query->pets == 1) {
                                echo "<img src='../public/img/Washing Machine-50.png' title='' width='25' class='listing-icons'>";
                            }
                        }
                        if (isset($query->parking)) {
                            if ($query->pets == 1) {
                                echo "<img src='../public/img/Parking-50.png' title='' width='25' class='listing-icons'>";
                            }
                        }
                        if (isset($query->furnished)) {
                            if ($query->pets == 1) {
                                echo "<img src='../public/img/Sofa-50.png' title='' width='25' class='listing-icons'>";
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
                    <div class="form-group">
                        <form action="" method="POST">
                            <button type="submit" class="btn listing-message-btn" name="submit_contact_lister">Message Lister</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            $count++;
        }
        ?>
        </div>
    </div>
</div>