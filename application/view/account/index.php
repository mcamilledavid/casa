<div class="container" id="main-alt">
    <div class="row">
        <div class="form-container">
            <form  action="<?php echo URL; ?>account/updateuserinfo" method="POST" autocomplete="off">
                <div class="form-group">
                    <h2 class="signup-login-header">Edit Account</h2>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="inner-addon right-addon">
                                <i class="ionicons ion-ios-person-outline"></i>
                                <input type="text" name="firstname" class="form-control" value="<?php echo htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inner-addon right-addon">
                                <i class="ionicons ion-ios-person-outline"></i>
                                <input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($user->lastname, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-person-outline"></i>
                        <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-email-outline"></i>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="inner-addon right-addon">
                        <i class="ionicons ion-ios-locked-outline"></i>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group text-center">
                    Are you currently an SF State student?
                    <label class="switch">
                        <input type="checkbox" name="isStudent" value="1">
                        <div class="slider round"></div>
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block signup-login-btn" name="submit__edit_user">Update</button>
                </div> 
            </form>
        </div>
    </div>
</div>