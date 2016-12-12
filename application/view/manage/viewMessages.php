<div class="row">
    <div class="col-lg-12">
        <div class="page-title-container">
            <h2>Messages</h2>
            <p>Messages from students interested in your listings.</p>
        </div>
        <div class="container-fluid" id="main-alt" style="background: #f8f8f8;height: auto!important;">
            <div class="container">
                <?php 
                $count = 0;
                foreach ($query as $query) { ?>
                    <div class="col-lg-4">
                        <div class="messages-container">
                        <p><strong>From:</strong><br>
                            <?php if (isset($query->firstname)) echo htmlspecialchars($query->firstname, ENT_QUOTES, 'UTF-8'); ?> 
                            <?php if (isset($query->lastname)) echo htmlspecialchars($query->lastname, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <p><strong>Date:</strong><br>
                            <?php if (isset($query->date_created)) echo htmlspecialchars(date("m-d-Y", strtotime($query->date_created)), ENT_QUOTES, 'UTF-8'); ?> 
                        </p>
                        <p>
                            <strong>Message:</strong><br>
                            <?php if (isset($query->message)) echo htmlspecialchars($query->message, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <button class="listing-message-btn" name="message_button"><a href="mailto:<?php if (isset($query->email)) echo htmlspecialchars($query->email, ENT_QUOTES, 'UTF-8'); ?>">Reply</a></button>
                    </div>
                    </div>
                <?php
                    $count++;
                }
                if ($count == 0) {
                    ?>
                    <h4 class='text-center'>You don't have any messages!</h4>
                <?php }
                ?>
            </div>
        </div>
    </div>