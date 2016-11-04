<div class="container-fluid">
    <div class="row" id="main">
        <div class="signup-login-form-border signup-login-form-container" id="signup-login-popup">
            <form  action="" autocomplete="on"> 
                <div class="form-group">
                    <h2 class="signup-login-header">Sign Up</h2>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="inner-addon right-addon">
                                <i class="ionicons ion-ios-person-outline"></i>
                                <input type="text" name="firstname" class="form-control" placeholder="First Name" maxlength="45" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inner-addon right-addon">
                                <i class="ionicons ion-ios-person-outline"></i>
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" maxlength="45" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-person-outline"></i>
                        <input type="text" name="username" class="form-control" placeholder="Username" maxlength="30" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-email-outline"></i>
                        <input type="email" name="email" class="form-control" placeholder="Email" maxlength="60" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-locked-outline"></i>
                        <input type="password" name="password" class="form-control" placeholder="Password" maxlength="255" />
                    </div>
                </div>

                <div class="form-group text-center">
                    Are you currently an SF State student?
                    <label class="switch">
                        <input type="checkbox" class="switch-input" name="isStudent">
                        <span class="switch-label" data-on="Yes" data-off="No"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>

                <div class="form-group text-center">
                    <input type="checkbox" value=""> By signing up, I agree to Casa's <a href="">Terms of Service</a> and <a href="">Privacy Policy</a>.
                </div> 

                <div class="form-group">
                    <button type="submit" class="btn btn-block signup-login-btn" name="submit_add_user">Sign Up</button>
                </div> 

                <div class="signup-login-footer">
                    Already have a Casa account?
                    <a href="<?php echo URL; ?>login" class="signup-login-footer-btn">Log In</a>
                </div>
            </form>
        </div>
    </div>
</div>
