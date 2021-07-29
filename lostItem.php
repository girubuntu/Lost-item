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
    <head>
        <link rel="stylesheet" href="./css/lostItem.css">
        <title>Lost Item</title>
    </head>
    <main class='container'>
        <section >
            <div class="container">
                <div class='row'>
                    <div class='col-sm-5 col-sm-pull-7 feature_list'>
                        <h1>Submit Lost Property</h1>
                        <p>
                            Our system connects lost and found properties from all around the country with their owners. For every lost property, we send a notification to the owner when the system receives a matching found item.<br>
                            <br><strong>Click the button below to the corresponding action you want</strong>
                        </p>
                        <a href="lostItem.php"><button type="button" class="btn btn-outline-secondary">Lost Item</button></a>
                        <a href="foundItem.php"><button type="button" class="btn btn-outline-secondary">Found Item</button></a>
                        <a href="viewPosts.php"><button type="button" class="btn btn-outline-secondary">View Post</button></a>
                        <br><br>
                        <strong class="required text-danger">*</strong>
                        <small>Please be descriptive when submitting your lost property report, the more information you give us the better chance you have of retrieving your items.</small>
                    </div>
                    <div class='col-sm-7 col-sm-push-5'>
                        <div class='losting_image'><img src='https://www.lostings.com/public/assets/images/submit_lost_property.jpg' class='img-responsive d-none d-sm-block' alt='image' width='100%'></div>
                    </div>
                </div>
            </div>
        </section>
    
        <form class='row' action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class='col-sm-6 mb-5'>
                <div class='form-group'>
                    <label for="item_name" class="control-label lbl-descriptive">Item Lost
                        <small class="required">*</small>
                        <span class="label-detail">(Dog, Jacket, Smartphone, Wallet, etc.)</span>
                    </label>
                    <input class="form-control " placeholder="Item Lost" name="item_name" type="text">
                </div>
                <div class='form-group'>
                    <label for="category_id" class="control-label lbl-descriptive">Category
                        <small class="required">*</small>
                        <span class="label-detail">(Animals/Pets, Clothing, Electronics, Personal Accessories etc.) This is required.</span>
                    </label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">People</option>
                        <option value="2">Animals/Pets</option>
                        <option value="3">Electronics</option>
                        <option value="4">Clothing</option>
                        <option value="5">Materials</option>
                        <option value="6">Cards</option>
                        <option value="7">Documents</option>
                        <option value="8">Personal Accessories</option>
                        <option value="9">Others</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for="brand" class="control-label lbl-descriptive">Brand
                        <small class="required">*</small>
                        <span class="label-detail">(Apple, Louis Vuitton, Moshions, etc)</span>
                    </label>
                    <input id="search_sub_cat" class="form-control" placeholder="Enter Brand" name="brand" type="text">
                </div>
                <div class='form-group'>
                    <label for="primary_color" class="control-label lbl-descriptive">Primary Color
                        <small class="required">*</small>
                        <span class="label-detail">Please add the color that best represents the lost property (Red, Blue, Black, etc.) </span>
                    </label>
                    <input class="form-control" placeholder="Enter Primary Color" name="primary_color" type="text">
                </div>
                <div class='form-group search-frm'>
                    <label for="secondary_color" class="control-label lbl-descriptive">Secondary color
                        <small class="required">*</small>
                        <span class="label-detail">Please add a color that is less dominant (Leave blank if not applicable)</span>
                    </label>
                    <input class="form-control" placeholder="Enter Secondary Color" name="secondary_color" type="text">
                </div>
                
            </div>
            <div class='col-sm-6 mb-5'>
                <div class="form-group">
                    <label for="date" class="control-label lbl-descriptive">Date Lost
                        <small class="required">*</small>
                        <span class="label-detail">Please add the approximate date of when the item was lost.</span>
                    </label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Date Lost" name="incident_date" type="date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="control-label lbl-descriptive">Time Lost
                        <small class="required">*</small>
                        <span class="label-detail">Please add the approximate time of when the item was lost.</span>
                    </label>
                    <div class="input-group time">
                        <input id="incident_time" class="form-control" placeholder="Time Lost" name="incident_time" type="time">
                    </div>
                </div>
                <div class="form-group upload_image">
                    <label class="control-label lbl-descriptive">Upload Image
                    <span class="label-detail">(This image will be display on the website.)<span>
                    </span></span></label>
                    <input placeholder="Upload an image or file of the item" class="form-control" id="upload_image_name" name="item_image" type="file">
                </div>
                <div class='form-group'>
                    <label for="additional_info" class="control-label lbl-descriptive">Additional Information
                        <span class="label-detail">Please provide any additional details/description of your lost property.</span>
                    </label>
                    <input class="form-control" placeholder="Additional information" name="additional_info" type="text">
                </div>
            </div><br><br>
            <div class='col-sm-12'><h4 class=' mb-5'>Location Information</h4></div>
                <div class='col-sm-6'>
                    <div class=" form-group">
                        <label for="where_type" class="control-label lbl-descriptive">Where Lost
                            <small class="required">*</small>
                            <span class="label-detail">Please provide an approximate location of the lost property (Bar, Restaurant, Park, etc.)<span></label>
                       
                            <div >
                                <select id="location_type" class="form-control js-select" data-live-search="true" data-size="5" data-type="lost" name="location_type" tabindex="-98">
                                <option selected="selected" value="">Select Location</option>
                                <option value="1">Bar</option>
                                <option value="2">Taxi</option>
                                <option value="3">Restaurant</option>
                                <option value="4">Hotel</option>
                                <option value="5">Hospital</option>
                                <option value="6">Government Institution</option>
                                <option value="6">Educational Instition</option>
                                <option value="7">Public Transportation</option>
                                <option value="8">Museum</option>
                                <option value="9">Park</option>
                                <option value="10">Rental Car</option>
                                <option value="11">Misc.</option></select>
                            </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="zip_code" class="control-label lbl-descriptive">Province
                        <span class="label-detail">Please provide your the province.<span>
                        </span></span></label>
                        <input id="zip_code" class="form-control" placeholder="Province" maxlength="5" name="province" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="zip_code" class="control-label lbl-descriptive">District
                        <span class="label-detail">Please provide the district<span>
                        </span></span></label>
                        <input id="zip_code" class="form-control" placeholder="District" maxlength="5" name="district" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="zip_code" class="control-label lbl-descriptive">Sector
                        <span class="label-detail">Please provide the sector<span>
                        </span></span></label>
                        <input id="zip_code" class="form-control" placeholder="Sector" maxlength="5" name="sector" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="zip_code" class="control-label lbl-descriptive">Cell
                        <span class="label-detail">Please provide the cell<span>
                        </span></span></label>
                        <input id="zip_code" class="form-control" placeholder="Cell" maxlength="5" name="cell" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="zip_code" class="control-label lbl-descriptive">Village
                        <span class="label-detail">Please provide the village<span>
                        </span></span></label>
                        <input id="zip_code" class="form-control" placeholder="Village" maxlength="5" name="village" type="text">
                    </div>
                </div>
                
            <div class='col-sm-12'><h4 class='mb-5 mt-5'>Contact Information</h4></div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="firstname" class="control-label lbl-descriptive">First Name
                            <small class="required">*</small>
                            <span class="label-detail">Please enter the first name  (This will apear on your submission).</span>
                        </label>
                        <div class="input-group date">
                            <input id="incident_date" class="form-control" placeholder="First Name" name="first_name" type="text">
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
                            <input id="incident_date" class="form-control" placeholder="Last Name" name="last_name" type="text">
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="phone" class="control-label lbl-descriptive">Phone Number
                            <small class="required">*</small>
                            <span class="label-detail">Please enter the phone number to display on your submission</span>
                        </label>
                        <div class="input-group date">
                            <input id="incident_date" class="form-control" placeholder="Phone Number" name="phone_number" type="tel">
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
                            <input id="incident_date" class="form-control" placeholder="Email" name="email" type="email">
                        </div>
                    </div>
                </div>
                <button name="submit" class='btn submit mt-3 mb-5 pr-5 pl-5 btn-lg text-light' style='width:auto;'>Publish</button>
            
        </form>
    </main>

    <!--footer-->
    
    <?php include('inc/footer.php'); ?>