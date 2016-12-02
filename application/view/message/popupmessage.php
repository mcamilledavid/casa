<!-- Popup -->
<div id="popup-message" class="modal">  
    <!-- Popup Content -->            
    <form  action="<?php echo URL; ?>message/addMessage" method="POST" autocomplete="on" class="modal-content" >
        <span onclick="document.getElementById('popup-message').style.display = 'none'" 
              class="close" title="Close Modal">&times;</span>
        <div class="form-group">
            <h2 class="signup-login-header">Message Lister</h2>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6 left-input">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-person-outline"></i>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php if (isset($_SESSION["firstname"])) echo ($_SESSION["firstname"]); ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 right-input">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-person-outline"></i>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php if (isset($_SESSION["lastname"])) echo ($_SESSION["lastname"]); ?>" required>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="form-group">
            <div class="inner-addon right-addon">
                <i class="ionicons ion-ios-email-outline"></i>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (isset($_SESSION["email"])) echo ($_SESSION["email"]); ?>" required>
            </div>
        </div>
 
        <div class="form-group">
            <textarea name="message" class="form-control" placeholder="I am interested in the listing."></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block signup-login-btn" name="submit_message">Send</button>
        </div> 
    </form>
</div> 
