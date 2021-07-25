<?php
    require('config/config.php');
    require('config/db.php');

    
   
    if(isset($_POST['submit'])) { 

    

       $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
       $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    
       
       $query = "INSERT INTO user(first_name, last_name, email, phone_number) VALUES('$first_name', '$last_name', '$email', '$phone_number')";

        if(mysqli_query($conn, $query)) {
            
            echo "<script>setTimeout(function(){alert('Contact saved')}, 3000);</script>";
            // header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }

        
    }

?>

    <?php include('inc/header.php'); ?>

    

  
    <!-- showcase -->
    <section >
        <div class="container">
           
            <div class='row'>
                <div class='col-sm-5 col-sm-pull-7 feature_list'>
                    <h1>Submit Found Property</h1>
                    <p>
                        Our system connects lost and found properties from all around the country with their owners. For every lost property, we send a notification to the owner when the system receives a matching found item.<br>
                        <br><strong>Click the button below to the corresponding action you want</strong>
                    </p>
                    <a href="./index.php"><button type="button" class="btn btn-outline-secondary">Lost Item</button></a>
                    <a href="#"><button type="button" class="btn btn-outline-secondary">Found Item</button></a>
                    <a href="#"><button type="button" class="btn btn-outline-secondary">View Post</button></a>
                    <br><br>
                    <strong class="required text-danger">*</strong>
                    <small>Please be descriptive when submitting your Found property report, the more information you give us the better chance you have of retrieving your items.</small>
                </div>
                <div class='col-sm-7 col-sm-push-5'>
                    <div class='losting_image'><img src='./img/submit_found_property.jpg' class='img-responsive d-none d-sm-block' alt='image' width='100%'></div>
                </div>
            </div>
        </div>
    </section>

  
<form class="container" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class='row mb-5'>
    <div class='col-sm-6 mb-5'>
        <div class='form-group'>
            <label for="item_name" class="control-label lbl-descriptive">Item Found
                <small class="required">*</small>
                <span class="label-detail">(Dog, Jacket, Smartphone, Wallet, etc.) This field may auto-populate</span>
            </label>
            <input class="form-control " placeholder="Item Found" name="item_name" type="text">
        </div>
        <div class='form-group'>
            <label for="category_id" class="control-label lbl-descriptive">Category
                <small class="required">*</small>
                <span class="label-detail">(Animals/Pets, Clothing, Electronics, Personal Accessories etc.) This is required.</span>
            </label>
            <input class="form-control " placeholder="Search Category" name="category_id" type="text">
        </div>
        <div class='form-group search-frm'>
            <label for="brand" class="control-label lbl-descriptive">Brand
                <small class="required">*</small>
                <span class="label-detail">(Canada, Louis Vuitton, Apple, etc)</span>
            </label>
            <input id="search_sub_cat" class="form-control" placeholder="Search Brand" name="brand" type="text">
        </div>
        <div class='form-group'>
            <label for="primary_color" class="control-label lbl-descriptive">Primary Color
                <small class="required">*</small>
                <span class="label-detail">Please add the color that best represents the Found property (Red, Blue, Black, etc.) </span>
            </label>
            <input class="form-control" placeholder="Search Primary Color" name="primary_color" type="text">
        </div>
        <div class='form-group search-frm'>
            <label for="secondary_color" class="control-label lbl-descriptive">Secondary color
                <small class="required">*</small>
                <span class="label-detail">Please add a color that is less dominant (Leave blank if not applicable)</span>
            </label>
            <input class="form-control" placeholder="Search Secondary Color" name="secondary_color" type="text">
        </div>
        
    </div>
    <div class='col-sm-6 mb-5'>
        <div class="form-group">
            <label for="date" class="control-label lbl-descriptive">Date Found
                <small class="required">*</small>
                <span class="label-detail">Please add the approximate date of when the item was Found.</span>
            </label>
            <div class="input-group date">
                <input class="form-control" placeholder="Date Found" name="incident_date" type="date">
            </div>
        </div>
        <div class="form-group">
            <label for="date" class="control-label lbl-descriptive">Time Found
                <small class="required">*</small>
                <span class="label-detail">Please add the approximate time of when the item was Found.</span>
            </label>
            <div class="input-group time">
                <input id="incident_time" class="form-control" placeholder="Time Found" name="incident_time" type="time">
            </div>
        </div>
        <div class="form-group upload_image">
            <label class="control-label lbl-descriptive">Upload Image
            <span class="label-detail">(This image will be display on the website.)<span>
            </span></span></label>
            <input placeholder="Upload an image or file of the item" class="form-control" id="upload_image_name" name="upload_image" type="file">
        </div>
        <div class='form-group'>
            <label for="additional_info" class="control-label lbl-descriptive">Additional Information
                <span class="label-detail">Please provide any additional details/description of your found property.</span>
            </label>
            <input class="form-control" placeholder="Additional information" name="additional_info" type="text">
        </div>
    </div>
    </div>
    <h4 class='mb-5'>Location Information</h4>
    <div class='row mb-5'>
        <div class='col-sm-6'>
            <div class=" form-group">
                <label for="where_type" class="control-label lbl-descriptive">Where Found
                    <small class="required">*</small>
                    <span class="label-detail">Please provide an approximate location of the found property (Bar, Restaurant, Park, etc.)<span></label>
               
                    <div >
                       <div class="dropdown-menu open" role="combobox" style="max-height: 243px; overflow: hidden;">

                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 200px; overflow-y: auto;">
                            <li data-original-index="0" class="active selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select Type</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bar</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Taxi</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Restaurant</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Hotel</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li class="divider" data-optgroup="1div"></li>
                            <li class="dropdown-header " data-optgroup="1"><span class="text">Airport</span></li><li data-original-index="5" data-optgroup="1"><a tabindex="0" class="opt  " data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Airport of Departure</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="6" data-optgroup="1"><a tabindex="0" class="opt  " data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Airport of Arrival</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7" data-optgroup="1"><a tabindex="0" class="opt  " data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">TSA Checkpoint</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="8" data-optgroup="1"><a tabindex="0" class="opt  " data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Airport Shuttle</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li class="divider" data-optgroup="1div"></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Pet Services</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Educational Institute</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Public Transportation</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                            <li data-original-index="12"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Museum</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="13"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Park</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="14"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Rental Car</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="15"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Venu</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="16"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Misc.</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="location_type" class="form-control js-select" data-live-search="true" data-size="5" data-type="found" name="location_type" tabindex="-98"><option selected="selected" value="">Select Type</option><option value="1">Bar</option><option value="2">Taxi</option><option value="4">Restaurant</option><option value="12">Hotel</option><optgroup label="Airport"><option value="3">Airport of Departure</option><option value="15">Airport of Arrival</option><option value="16">TSA Checkpoint</option><option value="17">Airport Shuttle</option></optgroup><option value="9">Pet Services</option><option value="14">Educational Institute</option><option value="11">Public Transportation</option><option value="7">Museum</option><option value="5">Park</option><option value="6">Rental Car</option><option value="8">Venu</option><option value="13">Misc.</option></select>
                    </div>
            </div>
            </div>

        
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">Province
                <span class="label-detail">Please provide your the province.<span>
                </span></span></label>
                <input id="zip_code" class="form-control" placeholder="Province" maxlength="5" name="zip_code" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">District
                <span class="label-detail">Please provide the district<span>
                </span></span></label>
                <input id="zip_code" class="form-control" placeholder="District" maxlength="5" name="zip_code" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">Sector
                <span class="label-detail">Please provide the sector<span>
                </span></span></label>
                <input id="zip_code" class="form-control" placeholder="Sector" maxlength="5" name="zip_code" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">Cell
                <span class="label-detail">Please provide the cell<span>
                </span></span></label>
                <input id="zip_code" class="form-control" placeholder="Cell" maxlength="5" name="zip_code" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">Village
                <span class="label-detail">Please provide the village<span>
                </span></span></label>
                <input id="zip_code" class="form-control" placeholder="Village" maxlength="5" name="zip_code" type="text">
            </div>
        </div>
    
    </div>
    <h4 class='mb-5'>Contact Information</h4>
    <div class='row'>
        <br>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">First Name
                    <small class="required">*</small>
                    <span class="label-detail">Please enter the first name  (This will apear on your submission).</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="First Name" name="first_name" type="text" required>
                </div>
            </div>  
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="lastname" class="control-label lbl-descriptive">Last Name
                    <small class="required">*</small>
                    <span class="label-detail">Please enter the last name  (This will apear on your submission).</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Last Name" name="last_name" type="text" required>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="phone" class="control-label lbl-descriptive">Phone Number
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter the phone number to display on your submission</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Phone Number" name="phone_number" type="tel" required>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="email" class="control-label lbl-descriptive">Email
                    <small class="required">*</small>
                    <span class="label-detail">Please enter your email(This will appear on your submission)</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Email" name="email" type="email" required>
                </div>
            </div>
        </div>
        
    </div>
    
    <button name="submit" class='btn btn-outline-info submit mt-3 mb-5 pr-5 pl-5 btn-lg text-light'>Publish</button>
</form>
   
<?php include('inc/footer.php'); ?>
