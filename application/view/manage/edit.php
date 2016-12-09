<div id="main-alt">
    <div class="col-lg-12">
        <div class="page-title-container">
            <h2>Edit A Listing</h2>
            <p>Rent your apartment, house, or room to SF State students.</p>
        </div>
        <div class="row" id="main-alt" style="background: #f8f8f8;height: auto!important;">
            <div class="post-container">
                <form  action="<?php echo URL; ?>manage/editRentalUnit" method="POST" autocomplete="off" enctype="multipart/form-data" onsubmit="if (document.getElementById('agree').checked) {
                            return true;
                        } else {
                            alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy');
                            return false;
                        }">
                    <div class="form-group">
                        <h4>Details</h4>
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" maxlength="50" required>
                    </div>

                    <div class="form-group">
                        <h4>Address</h4>
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
                                <input type="text" name="state" class="form-control" value="CA" maxlength="2" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="zipcode" class="form-control" placeholder="Zipcode" maxlength="5" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Unit Type</h4>
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
                                <h4>Beds</h4>
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
                                <h4>Baths</h4>
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
                                <h4>Rent</h4>
                                <input type="text" name="rent" class="form-control" placeholder="e.g. 1000" maxlength="11" required>
                            </div>
                            <div class="col-lg-4">
                                <h4>Deposit</h4>
                                <input type="text" name="deposit" class="form-control" placeholder="e.g. 1000" maxlength="11">
                            </div>
                            <div class="col-lg-4">
                                <h4>Date Availability</h4>
                                <input type="date" name="date_availability" placeholder="MM/DD/YYYY" class="form-control" id="date" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Lease Length (Months)</h4>
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
                            <div class="col-lg-8">
                                <h4>Distance From Campus (Miles)</h4>
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

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Photos</h4>
                                <input type="file" name="rental_unit_thumb"  multiple>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Description</h4>
                                <textarea name="description" placeholder="Tell us about your rental unit."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-2">
                                <h5>Furnished</h5><label class="switch">
                                    <input type="checkbox" name="furnished" value="1">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Laundry</h5><label class="switch">
                                    <input type="checkbox" name="laundry" value="1">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Parking</h5><label class="switch">
                                    <input type="checkbox" name="parking" value="1">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Pets</h5><label class="switch">
                                    <input type="checkbox" name="pets" value="1">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Smoking</h5><label class="switch">
                                    <input type="checkbox" name="smoking" value="1">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="post-disclaimer">
                                    <input type="checkbox" value="check" id="agree">
                                    By checking this box, I agree as follows: I am the 
                                    owner of this property or have authority to transact
                                    on behalf of this property; I will provide accurate 
                                    and non discriminatory information; I will comply 
                                    with the <a href="<?php echo URL; ?>terms">Terms & Privacy</a>; 
                                    and I acknowledge that my private information, such
                                    as address and email, will not be shared.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block post-btn" name="submit_post_listing">Post</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>