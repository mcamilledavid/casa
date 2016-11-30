<!-- Popup -->
<div id="popup-message" class="modal">
    <!-- Popup Content -->            
    <form  action="<?php echo URL; ?>home/messageLister" method="POST" autocomplete="on" class="modal-content" >
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

        <script type="text/javascript">
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                        sURLVariables = sPageURL.split('&'),
                        sParameterName,
                        i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            };
            
            var rental_unit_id = getUrlParameter('rental_unit_id');
            var lister_id = getUrlParameter('lister_id');
            
            document.getElementById('ruid').value = rental_unit_id;
            document.getElementById('lid').value = lister_id;

        </script>


        <input type="hidden" name="rental_unit_id" class="form-control" value="" id ="ruid"/>



        <input type="hidden" name="lister_id" class="form-control" value="" id="lid"/>


        <div class="form-group">
            <textarea name="message" class="form-control" placeholder="I am interested in the listing."></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block signup-login-btn" name="submit_message">Send</button>
        </div> 
    </form>
</div>