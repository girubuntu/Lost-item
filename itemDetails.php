<?php include('inc/header.php');

require('config/config.php');
require('config/db.php');

// Collecting data from query string

$item_id = $_GET['id'];


if (isset($item_id)) {
    $item_id = mysqli_real_escape_string($conn, $item_id);

    $query_lost = "SELECT * from lost_item WHERE item_id = '$item_id'";
    $lost_result = mysqli_query($conn, $query_lost);
    $data = mysqli_fetch_assoc($lost_result);


    $query_found = "SELECT * from founditem WHERE item_id = '$item_id'";
    $query_found = mysqli_query($conn, $query_found);
    $data1 = mysqli_fetch_assoc($query_found);

    if (!$data) {
        $data = $data1;
    }
}
?>

<head>
    <link rel="stylesheet" href="./css/itemDetails.css">
    <title>Item Details</title>
</head>
<div class="container">
    <div class='row m-auto'>

        <br>
        <h1 class="mb-6" style="text-align:center;">View details</h1>
        <div class='col-md-6 m-auto mt-7'>
            <img src="https://irihano.s3.us-east-2.amazonaws.com/<?php echo $data['item_image']; ?>" alt='image' style='width:280px; height:250px; border-radius: 10px; margin-left: 27%;' class='card-img-top'>
        </div>
        <div></div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Status</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" name="status" type="text" disabled value="<?php echo $data['status'] ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Item Name</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" name="item_name" disabled type="text" value='<?php echo $data['item_name']; ?>'>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Category Name</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="category_name" type="text" value="<?php echo $data['category_name']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Brand Name</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="brand" type="text" value="<?php echo
                                                                                                            $retVal = (!empty($data['brand'])) ? $data['brand'] : 'None';
                                                                                                            ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">primary color</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="primary_color" type="text" value="<?php echo $data['primary_color']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Secondary color</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="secondary_color" type="text" value="<?php echo
                                                                                                                        $retVal = (!empty($data['secondary_color'])) ? $data['secondary_color'] : 'None';
                                                                                                                        ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive"><?php echo $data['status'] ?> Date</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="incident_date" type="text" value="<?php echo $data['incident_date']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive"><?php echo $data['status'] ?> Time</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="incident_time" type="text" value="<?php echo $data['incident_time']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Location</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="location_type" type="text" value="<?php echo $data['location_type']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Province</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="province" type="text" value="<?php echo $data['province']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">District</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="district" type="text" value="<?php echo $data['district']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Sector</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="sector" type="text" value="<?php echo $data['sector']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Cell</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="cell" type="text" value="<?php echo
                                                                                                            $retVal = (!empty($data['cell'])) ? $data['cell'] : 'None';
                                                                                                            ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Village</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="village" type="text" value="<?php echo
                                                                                                                $retVal = (!empty($data['village'])) ? $data['village'] : 'None';
                                                                                                                ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">First name</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="first_name" type="text" value="<?php echo $data['first_name']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Last name</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="last_name" type="text" value="<?php echo $data['last_name']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Phone number</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="phone_number" type="text" value="<?php echo '0' . $data['phone_number']; ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Email</label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" disabled name="email" type="text" value="<?php echo
                                                                                                            $retVal = (!empty($data['email'])) ? $data['email'] : 'None';
                                                                                                            ?>">
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">Additional information</label>
                <div class="input-group date">

                    <textarea class="form-control pl-0" id="exampleFormControlTextarea1" rows="4" cols="50" disabled>
                        <?php echo
                        $retVal = (!empty($data['additional_info'])) ? $data['additional_info'] : 'None';
                        ?></textarea>
                </div>
            </div>
        </div>


        <a href="<?php if ($data['status'] == "lost")
                        echo "viewLostPosts.php";
                    else echo "viewFoundPosts.php"; ?>"><button type="button" class="btn btn-outline-primary mb-7 mt-7"> Back to view posts</button></a>

    </div>
</div>
</main>

<!--footer-->

<?php include('inc/footer.php'); ?>