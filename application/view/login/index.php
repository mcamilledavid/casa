<div class="container-fluid" id="main-large">
    <div class="row">
        <div class="form-container">
            <form  action="<?php echo URL; ?>login/loginuser" method="POST" autocomplete="on">
                <div class="form-group text-center">
                    <h2 class="signup-login-header">Log In</h2>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-person-outline"></i>
                        <input type="text" name="username" class="form-control" placeholder="Username" maxlength="30" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-locked-outline"></i>
                        <input type="password" name="password" class="form-control" placeholder="Password" maxlength="255" />
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
                    <a href="#signup" onclick="document.getElementById('popup-signup').style.display = 'block'" class="signup-login-footer-btn">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>