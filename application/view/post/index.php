<div class="container" id="main-alt">
    <div class="row">
        <div class="post-container">
            <form  action="<?php echo URL; ?>post/addRentalUnit" method="POST" autocomplete="off" enctype="multipart/form-data" onsubmit="if (document.getElementById('agree').checked) {

                        return true;
                    } else {
                        alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy');
                        return false;
                    }">
                <div class="form-group">
                    <h2 class="">Details</h2>
                </div>
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title" maxlength="75" required>
                </div>

                <div class="form-group">
                    <input type="text" name="street" class="form-control" placeholder="Street" maxlength="75" required>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" name="city" class="form-control" placeholder="City" maxlength="75" required>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="state" class="form-control" placeholder="State" maxlength="2" required>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="zipcode" class="form-control" placeholder="Zipcode" maxlength="5" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3>Unit Type</h3>
                            <select name="type" required>
                                <option value="Apartment">Apartment</option>
                                <option value="House">House</option>
                                <option value="Condo">Condo</option>
                                <option value="Studio">Studio</option>
                                <option value="Private Bedroom">Private Bedroom</option>
                                <option value="Shared Bedroom">Shared Bedroom</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <h3>Beds</h3>
                            <select name="beds">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <h3>Baths</h3>
                            <select name="baths">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>                        
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3>Rent</h3>
                            <input type="text" name="rent" class="form-control" placeholder="Rent per month (ex. 1000.00)" maxlength="75" required>
                        </div>
                        <div class="col-lg-4">
                            <h3>Deposit</h3>
                            <input type="text" name="deposit" class="form-control" placeholder="Deposit (ex. 1000.00)" maxlength="75">
                        </div>
                        <div class="col-lg-4">
                            <h3>Distance From Campus</h3>
                            <select name="distance_from_campus">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>  
                      </div>
                    </div>
                </div>

                <div class="form-group col-lg-4">
                    <h3>Date Availability</h3>
                    <input type="date" name="date_availability" class="form-control" placeholder="Rent per month (ex. 1000.00)" maxlength="75" required>
                </div>
                <div class="col-lg-4">
                    <h3>Lease Length</h3>
                    <select name="lease_length">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>  
                </div>
                
                <div class="form-group col-lg-12">
                    <h3>Photos</h3>
                    <input type="file" name="rental_unit_thumb"  multiple>
                </div>

                <div class="form-group col-lg-12">
                    <h3>Description</h3>
                    <textarea name="description" placeholder="Tell us about your rental unit."></textarea>
                </div>

                <div class="form-group col-lg-2">
                    <h4>Smoking<label class="switch">
                            <input type="checkbox" name="smoking" value="1">
                            <div class="slider round"></div>
                        </label></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Laundry<label class="switch">
                            <input type="checkbox" name="laundry" value="1">
                            <div class="slider round"></div>
                        </label></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Parking<label class="switch">
                            <input type="checkbox" name="parking" value="1">
                            <div class="slider round"></div>
                        </label></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Furnished<label class="switch">
                            <input type="checkbox" name="furnished" value="1">
                            <div class="slider round"></div>
                        </label></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Pets<label class="switch">
                            <input type="checkbox" name="pets" value="1">
                            <div class="slider round"></div>
                        </label></h4>
                </div>

                <div class="form-group post-disclaimer col-lg-12">
                    <input type="checkbox" value="check" id="agree">
                    By checking this box, I agree as follows: I am the 
                    owner of this property or have authority to transact
                    on behalf of this property; I will provide accurate 
                    and non discriminatory information; I will comply 
                    with the <a href="<?php echo URL; ?>terms">Terms & Privacy</a>; 
                    and I acknowledge that my private information, such
                    as address and email, will not be shared.
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block post-btn" name="submit_post_listing">Post</button>
                </div> 
            </form>
        </div>
    </div>
</div>