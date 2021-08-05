<?php

    session_start();
    require('config/config.php');
    require('config/db.php');

    
   
    if(isset($_POST['submit']) && isset($_FILES['item_image'])) { 
        //$item_image = rand(1000,10000)."-".$_FILES['item_image']['name'];

        $item_image = $_FILES['item_image']['name'];
    
        $target = "uploads/";
        $file_location = $target . basename($_FILES["item_image"]["name"]);
    
       $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
       $category_name = mysqli_real_escape_string($conn,$_POST['category_name']);
       $brand = mysqli_real_escape_string($conn, $_POST['brand']);
       $primary_color = mysqli_real_escape_string($conn, $_POST['primary_color']);
       $secondary_color = mysqli_real_escape_string($conn, $_POST['secondary_color']);
       $incident_date = mysqli_real_escape_string($conn, date('Y-m-d', strtotime($_POST['incident_date'])));
       $incident_time = mysqli_real_escape_string($conn, $_POST['incident_time']);
       $additional_info = mysqli_real_escape_string($conn, $_POST['additional_info']);


       $location_type = mysqli_real_escape_string($conn, $_POST['location_type']);
       $province = mysqli_real_escape_string($conn, $_POST['province']);
       $district = mysqli_real_escape_string($conn, $_POST['district']);
       $sector = mysqli_real_escape_string($conn,$_POST['sector']);
       $cell = mysqli_real_escape_string($conn, $_POST['cell']);
       $village = mysqli_real_escape_string($conn, $_POST['village']);


       $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
       $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    
       
       $query = "INSERT INTO lost_item(item_name,category_name,brand,primary_color,secondary_color,incident_date,incident_time,item_image,additional_info,location_type,province,district,sector,cell,village,first_name, last_name, email, phone_number) 
       VALUES('$item_name','$category_name','$brand','$primary_color','$secondary_color','$incident_date','$incident_time','$item_image','$additional_info','$location_type','$province','$district','$sector','$cell','$village','$first_name', '$last_name', '$email', '$phone_number')";

        if(mysqli_query($conn, $query)) {

            $_SESSION['status'] = 'Your  post has been submitted successfully!';
            // move_uploaded_file($tempName, $tempName);

            move_uploaded_file($_FILES['item_image']['tmp_name'], $file_location);

            // header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }

        
    }

?>

    <?php include('inc/header.php'); 
    session_start();
    ?>
    <head>
        <link rel="stylesheet" href="./css/lostItem.css">
        <title>Lost Item</title>
    </head>
    
    <main class='container'>

    <div class='col-md-12  mb-4'>
    <?php
        if(isset($_SESSION['status']))
        {
            ?>
            <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                <?php echo $_SESSION['status']; ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='close'></button>
            </div>
            <?php
            unset($_SESSION['status']);
        }
            ?>
    </div>
        <section >
            <div class="container">
                <div class='row'>
                    <div class='col-sm-5'>
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
    
        <form class='row' action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <div class='col-sm-6 mb-5'>
                <div class='form-group'>
                    <label for="item_name" class="control-label lbl-descriptive">Item Lost
                        <small class="required">*</small>
                        <span class="label-detail">(Dog, Jacket, Smartphone, Wallet, etc.)</span>
                    </label>
                    <input class="form-control " placeholder="Item Lost" name="item_name" type="text" required>
                </div>
                <div class='form-group'>
                    <label for="category_id" class="control-label lbl-descriptive">Category
                        <small class="required">*</small>
                        <span class="label-detail">(Animals/Pets, Clothing, Electronics, Personal Accessories etc.)</span>
                    </label>
                    <select class="form-select" name='category_name' required>
                        <option selected="selected" value="">Select Category</option>
                        <option value="Animals/Pets">Animals/Pets</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Materials">Tools and Materials</option>
                        <option value="Cards">Cards</option>
                        <option value="Documents">Documents</option>
                        <option value="Personal Accessories">Personal Accessories</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for="brand" class="control-label lbl-descriptive">Brand
                        <span class="label-detail">(Apple, Louis Vuitton, Moshions, etc). (Optional)</span>
                    </label>
                    <input id="search_sub_cat" class="form-control" placeholder="Enter Brand" name="brand" type="text">
                </div>
                <div class='form-group'>
                    <label for="primary_color" class="control-label lbl-descriptive">Primary Color
                        <small class="required">*</small>
                        <span class="label-detail">Please add the color that best represents the lost property (Red, Blue, Black, etc.) </span>
                    </label>
                    <input class="form-control" placeholder="Enter Primary Color" name="primary_color" type="text" required>
                </div>
                <div class='form-group search-frm'>
                    <label for="secondary_color" class="control-label lbl-descriptive">Secondary Color
                        <span class="label-detail">Please add a color that is less dominant on  the  property (Leave blank if not applicable)</span>
                    </label>
                    <input class="form-control" placeholder="Enter Secondary Color" name="secondary_color" type="text" required>
                </div>
                
            </div>
            <div class='col-sm-6 mb-5'>
                <div class="form-group">
                    <label for="date" class="control-label lbl-descriptive">Date Lost
                        <small class="required">*</small>
                        <span class="label-detail">Please add the approximate date of when the item was lost.</span>
                    </label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Date Lost" name="incident_date" type="date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="control-label lbl-descriptive">Time Lost
                        <small class="required">*</small>
                        <span class="label-detail">Please add the approximate time of when the item was lost.</span>
                    </label>
                    <div class="input-group time">
                        <input id="incident_time" class="form-control" placeholder="Time Lost" name="incident_time" type="time" required>
                    </div>
                </div>
                <div class="form-group upload_image">
                    <label class="control-label lbl-descriptive">Upload Image
                    <span class="label-detail">(This image will be display on the website.)<span>
                    </span></span></label>
                    <input placeholder="Upload an image or file of the item" class="form-control" id="upload_image_name" name="item_image" type="file" required>
                </div>
                <div class='form-group'>
                    <label for="additional_info" class="control-label lbl-descriptive">Additional Information
                        <span class="label-detail">Please provide any additional details/description of your lost property (Optional)</span>
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
                                <select id="location_type" class="form-control js-select" data-live-search="true" data-size="5" data-type="lost" name="location_type" tabindex="-98" required>
                                <option selected="selected" value="">Select Location</option>
                                <option value="Bar">Bar</option>
                                <option value="Restaurant">Restaurant</option>
                                <option value="Hotel">Hotel</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Taxi">Airport</option>
                                <option value="Office Building">Office Building</option>
                                <option value="Educational Institution">Educational Institution</option>
                                <option value="Public Transportation">Public Transportation</option>
                                <option value="Museum">Commercial Area</option>
                                <option value="Other">Other</option></select>
                            </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="province" class="control-label lbl-descriptive">Province
                        <small class="required">*</small>
                        <span class="label-detail">Please provide your the province.<span>
                        </span></span></label>
                        <input id="province" class="form-control" placeholder="Province" name="province" type="text" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="district" class="control-label lbl-descriptive">District
                        <small class="required">*</small>
                        <span class="label-detail">Please provide the district<span>
                        </span></span></label>
                        <input id="district" class="form-control" placeholder="District" name="district" type="text" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sector" class="control-label lbl-descriptive">Sector
                        <small class="required">*</small>
                        <span class="label-detail">Please provide the sector<span>
                        </span></span></label>
                        <input id="sectore" class="form-control" placeholder="Sector" name="sector" type="text" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cell" class="control-label lbl-descriptive">Cell
                        <span class="label-detail">Please provide the cell (Optional) <span>
                        </span></span></label>
                        <input id="cell" class="form-control" placeholder="Cell" name="cell" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="village" class="control-label lbl-descriptive">Village
                        <span class="label-detail">Please provide the village (Optional)<span>
                        </span></span></label>
                        <input id="village" class="form-control" placeholder="Village" name="village" type="text">
                    </div>
                </div>
                
            <div class='col-sm-12'><h4 class='mb-5 mt-5'>Contact Information</h4></div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="first_name" class="control-label lbl-descriptive">First Name
                            <small class="required">*</small>
                            <span class="label-detail">Please enter the first name  (This will apear on your submission).</span>
                        </label>
                        <div class="input-group date">
                            <input id="first_name" class="form-control" placeholder="First Name" name="first_name" type="text" required>
                        </div>
                    </div>  
                </div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="last_name" class="control-label lbl-descriptive">Last Name
                            <small class="required">*</small>
                            <span class="label-detail">Please enter the last name  (This will apear on your submission).</span>
                        </label>
                        <div class="input-group date">
                            <input id="last_name" class="form-control" placeholder="Last Name" name="last_name" type="text" required>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="phone_number" class="control-label lbl-descriptive">Phone Number
                            <small class="required">*</small>
                            <span class="label-detail">Please enter the phone number to display on your submission</span>
                        </label>
                        <div class="input-group date">
                            <input id="phone_number" class="form-control" placeholder="Phone Number" name="phone_number" type="tel" required>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label for="email" class="control-label lbl-descriptive">Email
                            <small class="required">*</small>
                            <span class="label-detail">Please enter your email (Optional)</span>
                        </label>
                        <input id="email" class="form-control" placeholder="Email" name="email" type="email">
                    </div>
                </div>
                <button name="submit" class='btn submit mt-3 mb-5 pr-5 pl-5 btn-lg text-light' style='width:auto;'>Post</button>
            
        </form>
    </main>

    <!--footer-->
    
    <?php include('inc/footer.php'); ?>