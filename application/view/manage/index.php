<div id="main-alt">
    <div class="col-lg-12">
        <div class="page-title-container">
            <h2>Manage Listings</h2>
            <p>Manage listings you posted or review your favorites.</p>
        </div>
        <div class="row" id="main-alt" style="background: #f8f8f8;height: auto!important;">
            <div class="container text-center">
                <div class="page-subtitle-container">
                    <h2>Your Listings</h2>
                </div>
                <?php
                $count = 0;
                foreach ($result as $result) {
                    ?>
                    <div class="manage-listing-container">
                        <div class="listing-price"><?php if (isset($result->rent)) echo '$' . htmlspecialchars($result->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php
                        if (isset($result->thumbnail)) {
                            echo "<img src='data:image/jpeg;base64," . base64_encode($result->thumbnail)
                            . "' alt='Item image' class='thumbnail' height='300px'>";
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
                                        echo htmlspecialchars($result->beds, ENT_QUOTES, 'UTF-8');
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
                                ?></p>
                            <a href="<?php echo URL; ?>">Edit</a> | <a href="<?php echo URL; ?>">Delete</a> | <a href="<?php echo URL; ?>">Mark As Rented</a> | <a href="<?php echo URL; ?>">Messages</a>
                        </div>
                    </div>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    ?>
                    <h4 class='text-center'>You have no listings yet!</h4>
                    <div class='manage-post-listing-btn-container'>
                        <a href="<?php echo URL; ?>post" class='manage-post-listing-btn'>Post a Listing</a>
                    </div>
                <?php }
                ?>
            </div>
        </div>
        <?php if (isset($_SESSION['isStudent']) == 1) { ?>
            <div class="row" id="main-alt">
                <div class="container text-center">
                    <div class="page-subtitle-container">
                        <h2>Your Favorites</h2>
                    </div>
                    <?php
                    $count = 0;
                    foreach ($result as $result) {
                        ?>
                        <div class="manage-listing-container">
                            <div class="listing-price"><?php if (isset($result->rent)) echo '$' . htmlspecialchars($result->rent, ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php
                            if (isset($result->thumbnail)) {
                                echo "<img src='data:image/jpeg;base64," . base64_encode($result->thumbnail)
                                . "' alt='Item image' class='thumbnail' height='300px'>";
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
                                            echo htmlspecialchars($result->beds, ENT_QUOTES, 'UTF-8');
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
                                    ?></p>
                                <div class="form-group">
                                    <a href="<?php echo URL; ?>message" target="_blank"><button type="submit" class="btn listing-message-btn" name="submit_contact_lister">Message Lister</button></a>
                                </div> 
                            </div>
                        </div>
                        <?php
                        $count++;
                    }
                    if ($count == 0) {
                        echo "<h4 class='text-center'>You have no favorites yet!</h4>";
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>