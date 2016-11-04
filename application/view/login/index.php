<div class="container-fluid">
    <div class="row" id="main">
        <div class="signup-login-form-border signup-login-form-container" id="signup-login-popup">
            <form  action="" autocomplete="on"> 
                <div class="form-group text-center">
                    <h2 class="signup-login-header">Log In</h2>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-person-outline ionicons-login"></i>
                        <input type="text" name="username" class="form-control input-login" placeholder="Username" maxlength="30" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-locked-outline ionicons-login"></i>
                        <input type="password" name="password" class="form-control input-login" placeholder="Password" maxlength="255" />
                    </div>
                </div>

                <div class="form-group" align="right">
                    <a href="">Forgot Password?</a>
                </div> 

                <div class="form-group">
                    <button type="submit" class="btn btn-block signup-login-btn" name="btn-login">Log In</button>
                </div> 

                <div class="signup-login-footer">
                    Don't have an account?
                    <a href="<?php echo URL; ?>signup" class="signup-login-footer-btn">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>
