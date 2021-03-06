<?php include('inc/header.php');


require('config/config.php');
require('config/db.php');
require('vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// $s3_key = $_ENV['AWS_KEY'];
// $s3_secret = $_ENV['AWS_SECRET'];

$s3_key = getenv('AWS_KEY');
$s3_secret = getenv('AWS_SECRET');
$s3_bucket = 'irihano';

if (isset($_POST['submit']) && isset($_FILES['item_image'])) {
    $item_image = $_FILES['item_image']['name'];
    $target = "uploads/";
    // $file_location = $target . basename($_FILES["item_image"]["name"]);

    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $primary_color = mysqli_real_escape_string($conn, $_POST['primary_color']);
    $secondary_color = mysqli_real_escape_string($conn, $_POST['secondary_color']);
    $incident_date = mysqli_real_escape_string($conn, date('Y-m-d', strtotime($_POST['incident_date'])));
    $incident_time = mysqli_real_escape_string($conn, $_POST['incident_time']);
    $additional_info = mysqli_real_escape_string($conn, $_POST['additional_info']);


    $location_type = mysqli_real_escape_string($conn, $_POST['location_type']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $sector = mysqli_real_escape_string($conn, $_POST['sector']);
    $cell = mysqli_real_escape_string($conn, $_POST['cell']);
    $village = mysqli_real_escape_string($conn, $_POST['village']);
    $item_current_location = mysqli_real_escape_string($conn, $_POST['item_current_location']);

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    $query = "INSERT INTO founditem(item_name,category_name,brand,primary_color,secondary_color,incident_date,incident_time,item_image,additional_info,location_type,province,district,sector,cell,village,item_current_location,first_name, last_name, email, phone_number) 
   VALUES('$item_name','$category_name','$brand','$primary_color','$secondary_color','$incident_date','$incident_time','$item_image','$additional_info','$location_type','$province','$district','$sector','$cell','$village','$item_current_location','$first_name', '$last_name', '$email', '$phone_number')";

    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn);
        $ext  = pathinfo($item_image, PATHINFO_EXTENSION);
        $newnm = $last_id . '.' . $ext;
        $updatename = "UPDATE founditem SET item_image = '$newnm' WHERE item_id = $last_id";
        $file_location = $target . $newnm;
        move_uploaded_file($_FILES['item_image']['tmp_name'], $file_location);
        if (mysqli_query($conn, $updatename)) {
            $s3 = new S3Client([
                'region' => 'us-east-2',
                'version' => 'latest',
                'credentials' => [
                    'key' => $s3_key,
                    'secret' => $s3_secret
                ]
            ]);
            try {
                $res = $s3->upload($s3_bucket, $newnm, file_get_contents($file_location));
            } catch (S3Exception $e) {
                echo 'error';
            }
        } else {
            echo mysqli_error($conn);
        }
        $_SESSION['status'] = 'Your  post has been submitted successfully!';
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}


?>

<head>
    <title>Submit a found item</title>
</head>
<div class='col-md-12  mb-4'>
    <?php
    if (isset($_SESSION['status'])) {
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


<!-- showcase -->
<section>
    <div class="container">

        <div class='row'>
            <div class='col-sm-5 col-sm-pull-7 feature_list'>
                <h1>Submit Found Property</h1><br><br>
                <p>
                    Our system connects lost and found properties from all around the Rwanda with their owners. <br>

                </p>
                <br>
                <strong class="required text-danger">*</strong>
                <small>Please be descriptive when submitting your Found property report, the more information you give us the better chance you have of retrieving your items.</small>
            </div>
            <div class='col-sm-7 col-sm-push-5'>
                <div class='losting_image'><img src='./img/submit_found_property.jpg' class='img-responsive d-none d-sm-block' alt='image' width='80%'></div>
            </div>
        </div>
    </div>
</section>


<form class="container" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <div class='row mb-5'>
        <div class='col-sm-6 mb-5'>
            <div class='form-group'>
                <label for="item_name" class="control-label lbl-descriptive">Item Found
                    <small class="required text-danger">*</small>
                    <span class="label-detail">(Dog, Jacket, Smartphone, Wallet, etc.) This field may auto-populate</span>
                </label>
                <input class="form-control " placeholder="Item Found" name="item_name" type="text" required>
            </div>
            <div class='form-group'>
                <label for="category_id" class="control-label lbl-descriptive">Category
                    <small class="required text-danger">*</small>
                    <span class="label-detail">(Animals/Pets, Clothing, Electronics, Personal Accessories etc.)</span>
                </label>
                <select class="form-select" name='category_name' required>
                    <option selected="selected" value="">Select Category</option>
                    <option value="Animals/Pets">Animals/Pets</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Tools and Materials">Tools and Materials</option>
                    <option value="Cards">Cards</option>
                    <option value="Documents">Documents</option>
                    <option value="Personal Accessories">Personal Accessories</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class='form-group search-frm'>
                <label for="brand" class="control-label lbl-descriptive">Brand
                    <small class="required text-danger"></small>
                    <span class="label-detail">(Apple, Louis Vuitton, Moshions, etc). (Optional)</span>
                </label>
                <input id="search_sub_cat" class="form-control" placeholder="Search Brand" name="brand" type="text">
            </div>
            <div class='form-group'>
                <label for="primary_color" class="control-label lbl-descriptive">Primary Color
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please add the color that best represents the Found property (Red, Blue, Black, etc.) </span>
                </label>
                <input class="form-control" placeholder="Search Primary Color" name="primary_color" type="text" required>
            </div>
            <div class='form-group'>
                <label for="secondary_color" class="control-label lbl-descriptive">Secondary Color

                    <span class="label-detail">Please add the color that is less dominent on the found property (Leave blank if not applicable) </span>
                </label>
                <input class="form-control" placeholder="Search Secondary Color" name="secondary_color" type="text">
            </div>


        </div>
        <div class='col-sm-6 mb-5'>
            <div class="form-group">
                <label for="date" class="control-label lbl-descriptive">Date Found
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please add the approximate date of when the item was Found.</span>
                </label>
                <div class="input-group date">
                    <input class="form-control" placeholder="Date Found" name="incident_date" type="date" required>
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="control-label lbl-descriptive">Time Found
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please add the approximate time of when the item was Found.</span>
                </label>
                <div class="input-group time">
                    <input id="incident_time" class="form-control" placeholder="Time Found" name="incident_time" type="time" required>
                </div>
            </div>
            <div class="form-group upload_image">
                <label class="control-label lbl-descriptive">Upload Image
                    <small class="required text-danger">*</small>
                    <span class="label-detail">(This image will be display on the website.)<span>
                        </span></span></label>
                <input type="file" name="item_image" placeholder="Upload an image or file of the item" class="form-control" id="item_image" accept="image/*" required>
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
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please provide an approximate location of the found property (Bar, Restaurant, Park, etc.)<span></label>

                <div>
                    <div class="dropdown-menu open" role="combobox" style="max-height: 243px; overflow: hidden;">

                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 200px; overflow-y: auto;">

                        </ul>
                    </div><select id="location_type" class="form-control js-select" required data-live-search="true" data-size="5" data-type="found" name="location_type" tabindex="-98">
                        <option selected="selected" value="">Select Type</option>
                        <option value="Bar">Bar</option>
                        <option value="Taxi">Taxi</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Aiport">Airport</option>
                        <option value="Educational insitute">Educational Institute</option>
                        <option value="Public transport">Public Transportation</option>
                        <option value="other">Other</option>

                    </select>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">Province
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please provide your the province.<span>
                        </span></span></label>
                <input id="zip_code" class="form-control" placeholder="Province" name="province" type="text" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">District
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please provide the district<span>
                        </span></span></label>
                <input id="zip_code" class="form-control" placeholder="District" name="district" type="text" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code" class="control-label lbl-descriptive">Sector
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please provide the sector<span>
                        </span></span></label>
                <input id="zip_code" class="form-control" placeholder="Sector" name="sector" type="text" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="Cell" class="control-label lbl-descriptive">cell
                    <span class="label-detail">Please provide the cell (Optional)<span>
                        </span></span></label>
                <input id="zip_code" class="form-control" placeholder="cell" name="cell" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="Village" class="control-label lbl-descriptive">village
                    <span class="label-detail">Please provide the village (Optional)<span>
                        </span></span></label>
                <input id="zip_code" class="form-control" placeholder="village" name="village" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="item_current_location" class="control-label lbl-descriptive">Item Current Location
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please provide the location where the owner of the item will find it</span>
                    <input id="item_current_location" class="form-control" placeholder="Item Current Location" name="item_current_location" type="text" required>
            </div>
        </div>




    </div>
    <h4 class='mb-5'>Contact Information</h4>
    <div class='row'>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">First Name
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter the first name (This will apear on your submission).</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="First Name" name="first_name" type="text" required>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="lastname" class="control-label lbl-descriptive">Last Name
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter the last name (This will apear on your submission).</span>
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
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter your email</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Email" name="email" type="email" required>
                </div>
            </div>
        </div>

    </div>

    <button name="submit" class='btn submit mt-3 mb-5 pr-5 pl-5 btn-lg text-light' style='width: 50%; margin-left: 25%;'>Submit</button>
</form>