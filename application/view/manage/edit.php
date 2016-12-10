<div id="main-alt">
    <div class="col-lg-12">
        <div class="page-title-container">
            <h2>Edit A Listing</h2>
            <p>Rent your apartment, house, or room to SF State students.</p>
        </div>
        <div class="row" id="main-alt" style="background: #f8f8f8;height: auto!important;">
            <div class="post-container">
                <form  action="<?php echo URL; ?>manage/updateRentalUnit" method="POST" autocomplete="off" enctype="multipart/form-data" onsubmit="if (document.getElementById('agree').checked) {
                            return true;
                        } else {
                            alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy');
                            return false;
                        }">
                    <input type="hidden" name="rental_unit_id" class="form-control" value="<?php echo $ru->rental_unit_id ?>" >
                    <div class="form-group">
                        <h4>Title</h4>
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" maxlength="50"value="<?php echo $ru->title ?>" required>
                    </div>

                    <div class="form-group">
                        <h4>Address</h4>
                    </div>
                    <div class="form-group">
                        <input type="text" name="street" class="form-control" placeholder="Street" maxlength="75" value="<?php echo $ru->street ?>" required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" name="city" class="form-control" placeholder="City" maxlength="75" value="<?php echo $ru->city ?>" required>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="state" class="form-control" maxlength="2" value="<?php echo $ru->state ?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="zipcode" class="form-control" placeholder="Zipcode" maxlength="5" value="<?php echo $ru->zipcode ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Unit Type</h4>
                                <select name="type" required>
                                    <option value="Apartment" <?php if ($ru->type == "Apartment") echo "selected";?> >Apartment</option>
                                    <option value="House" <?php if ($ru->type == "House") echo "selected";?> >House</option>
                                    <option value="Condo" <?php if ($ru->type == "Condo") echo "selected";?> >Condo</option>
                                    <option value="Studio" <?php if ($ru->type == "Studio") echo "selected";?> >Studio</option>
                                    <option value="Private Bedroom" <?php if ($ru->type == "Private Bedroom") echo "selected";?> >Private Bedroom</option>
                                    <option value="Shared Bedroom" <?php if ($ru->type == "Shared Bedroom") echo "selected";?> >Shared Bedroom</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <h4>Beds</h4>
                                <select name="beds">
                                    <option value="1" <?php if ($ru->beds == "1") echo "selected";?> >1</option>
                                    <option value="2" <?php if ($ru->beds == "2") echo "selected";?> >2</option>
                                    <option value="3" <?php if ($ru->beds == "3") echo "selected";?> >3</option>
                                    <option value="4" <?php if ($ru->beds == "4") echo "selected";?> >4</option>
                                    <option value="5" <?php if ($ru->beds == "5") echo "selected";?> >5</option>
                                    <option value="6" <?php if ($ru->beds == "6") echo "selected";?> >6</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <h4>Baths</h4>
                                <select name="baths">
                                    <option value="1" <?php if ($ru->baths == "1") echo "selected";?> >1</option>
                                    <option value="2" <?php if ($ru->baths == "2") echo "selected";?> >2</option>
                                    <option value="3" <?php if ($ru->baths == "3") echo "selected";?> >3</option>
                                    <option value="4" <?php if ($ru->baths == "4") echo "selected";?> >4</option>
                                    <option value="5" <?php if ($ru->baths == "5") echo "selected";?> >5</option>
                                    <option value="6" <?php if ($ru->baths == "6") echo "selected";?> >6</option>
                                </select>                        
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Rent</h4>
                                <input type="text" name="rent" class="form-control" placeholder="e.g. 1000" maxlength="11" value="<?php echo $ru->rent ?>" required>
                            </div>
                            <div class="col-lg-4">
                                <h4>Deposit</h4>
                                <input type="text" name="deposit" class="form-control" placeholder="e.g. 1000" maxlength="11" value="<?php echo $ru->deposit ?>" >
                            </div>
                            <div class="col-lg-4">
                                <h4>Date Availability</h4>
                                <input type="date" name="date_availability" placeholder="MM/DD/YYYY" class="form-control" id="date"  value="<?php echo $ru->date_availability; ?>"  required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Lease Length (Months)</h4>
                                <select name="lease_length">
                                    <option value="1" <?php if ($ru->lease_length == "1") echo "selected";?> >1</option>
                                    <option value="2" <?php if ($ru->lease_length == "2") echo "selected";?> >2</option>
                                    <option value="3" <?php if ($ru->lease_length == "3") echo "selected";?> >3</option>
                                    <option value="4" <?php if ($ru->lease_length == "4") echo "selected";?> >4</option>
                                    <option value="5" <?php if ($ru->lease_length == "5") echo "selected";?> >5</option>
                                    <option value="6" <?php if ($ru->lease_length == "6") echo "selected";?> >6</option>
                                    <option value="7" <?php if ($ru->lease_length == "7") echo "selected";?> >7</option>
                                    <option value="8" <?php if ($ru->lease_length == "8") echo "selected";?> >8</option>
                                    <option value="9" <?php if ($ru->lease_length == "9") echo "selected";?> >9</option>
                                    <option value="10 <?php if ($ru->lease_length == "10") echo "selected";?> ">10</option>
                                    <option value="11" <?php if ($ru->lease_length == "11") echo "selected";?> >11</option>
                                    <option value="12" <?php if ($ru->lease_length == "12") echo "selected";?> >12</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <h4>Distance From Campus (Miles)</h4>
                                <select name="distance_from_campus">
                                    <option value="1" <?php if ($ru->dist_from_campus == "1") echo "selected";?> >1</option>
                                    <option value="2" <?php if ($ru->dist_from_campus == "2") echo "selected";?> >2</option>
                                    <option value="3" <?php if ($ru->dist_from_campus == "3") echo "selected";?> >3</option>
                                    <option value="4" <?php if ($ru->dist_from_campus == "4") echo "selected";?> >4</option>
                                    <option value="5" <?php if ($ru->dist_from_campus == "5") echo "selected";?> >5</option>
                                    <option value="6" <?php if ($ru->dist_from_campus == "6") echo "selected";?> >6</option>
                                    <option value="7" <?php if ($ru->dist_from_campus == "7") echo "selected";?> >7</option>
                                    <option value="8" <?php if ($ru->dist_from_campus == "8") echo "selected";?> >8</option>
                                    <option value="9" <?php if ($ru->dist_from_campus == "9") echo "selected";?> >9</option>
                                    <option value="10" <?php if ($ru->dist_from_campus == "10") echo "selected";?> >10</option>
                                    <option value="11" <?php if ($ru->dist_from_campus == "11") echo "selected";?> >11</option>
                                    <option value="12" <?php if ($ru->dist_from_campus == "12") echo "selected";?> >12</option>
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
                                <textarea name="description"  placeholder="Tell us about your rental unit."><?php echo $ru->description ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <h5>Furnished</h5><label class="switch">
                                    <input type="checkbox" name="furnished" value="1" <?php if ($ru->furnished == "1") echo "checked";?> >
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Laundry</h5><label class="switch">
                                    <input type="checkbox" name="laundry" value="1" <?php if ($ru->laundry == "1") echo "checked";?> >
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Parking</h5><label class="switch">
                                    <input type="checkbox" name="parking" value="1" <?php if ($ru->parking == "1") echo "checked";?> >
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Pets</h5><label class="switch">
                                    <input type="checkbox" name="pets" value="1" <?php if ($ru->pets == "1") echo "checked";?> >
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Smoking</h5><label class="switch">
                                    <input type="checkbox" name="smoking" value="1" <?php if ($ru->smoking == "1") echo "checked";?> >
                                    <div class="slider round"></div>
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <h5>Is Rented</h5><label class="switch">
                                    <input type="checkbox" name="is_rented" value="1" <?php if ($ru->is_rented == "1") echo "checked";?> >
                                    <div class="slider round"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="post-disclaimer">
                                    <input type="checkbox" value="check" id="agree" checked>
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
                        <button type="submit" class="btn btn-block post-btn" name="update_listing">UPDATE</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>