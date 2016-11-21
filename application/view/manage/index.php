<div id="main-alt">
    <div class="col-lg-12">
        <div class="page-title-container">
            <h2>Manage Listings</h2>
            <h5>Manage listings you posted or review your favorites.</h5>
        </div>
        <div class="row" id="main-alt" style="background: #f8f8f8;height: 750px;">
            <div class="container">
                <?php
                $count = 0;
                foreach ($result as $result) {
                    ?>
                    <div class="manage-listing-container">
                        <div class="listing-price"><?php if (isset($result->rent)) echo '$' . htmlspecialchars($result->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php
                        if (isset($result->thumbnail)) {
                            echo "<img src='data:image/jpeg;base64," . base64_encode($result->thumbnail)
                            . "' alt='Item image' class='manage-listing-thumbnails'>";
                        }
                        ?>
                        <div class="manage-listing-preview">
                            <h4><a href="#" target="_blank"><?php if (isset($result->title)) echo htmlspecialchars($result->title, ENT_QUOTES, 'UTF-8'); ?></a></h4>
                            <p><?php if (isset($result->type)) echo htmlspecialchars($result->type, ENT_QUOTES, 'UTF-8'); ?> -
                                <?php
                                if (isset($result->beds)) {
                                    if ($result->beds == 1) {
                                        echo htmlspecialchars($result->beds, ENT_QUOTES, 'UTF-8');
                                        echo " Bedroom";
                                    } else {
                                        echo htmlspecialchars($result->beds, ENT_QUOTES, 'UTF-8') + "<p>Bedrooms</p>";
                                        echo " Bedrooms";
                                    }
                                }
                                ?></p>
                            <p><?php if (isset($result->zipcode)) echo htmlspecialchars($result->zipcode, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p><?php
                                if (isset($result->date_created)) {
                                    echo "Posted on ";
                                    echo htmlspecialchars(date("m-d-Y", strtotime($result->date_created)), ENT_QUOTES, 'UTF-8');
                                }
                                ?>
                            </p>
                            <a href="<?php echo URL; ?>">Edit</a> | <a href="<?php echo URL; ?>">Delete</a> | <a href="<?php echo URL; ?>">Mark As Rented</a> | <a href="<?php echo URL; ?>">Messages</a>
                        </div>
                    </div>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<h4 class='text-center'>You have no listings yet!</h4>";
                }
                ?>
            </div>
        </div>
    </div>
</div>