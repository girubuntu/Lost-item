<?php include('inc/header.php');

require('config/config.php');
require('config/db.php');

?>

<head>
    <link rel="stylesheet" href="./css/pay.css">
    <title>Payment</title>
</head>
<div class="container mt-4">
    <h3 class='fw-bold mb-3'>Payment</h3>
    <div class='row'>
        <form action='pay.php' method='post'>
        <div class='row'>
        <br>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="firstname" class="control-label lbl-descriptive">First Name
                <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter the first name</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="First Name" name="firstName" type="text" required>
                </div>
            </div>  
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="lastname" class="control-label lbl-descriptive">Last Name
                <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter the last name</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Last Name" name="lastName" type="text" required>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="phone" class="control-label lbl-descriptive">Phone Number
                    <small class="required text-danger">*</small>
                    <span class="label-detail">Please enter the phone number</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Phone Number" name="phone_number" type='tel'>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="email" class="control-label lbl-descriptive">Email
                    
                    <span class="label-detail">Please enter your email</span>
                </label>
                <div class="input-group date">
                    <input id="incident_date" class="form-control" placeholder="Email" name="email" type="email">
                </div>
            </div>
        </div>
        
    <div class='col-md-6'><img src='https://prod-refactor-cms.talkremit.com/wp-content/uploads/2021/05/MTN-MoMo-Logo_pages-to-jpg-0001-600x425.jpg'  width='20%;'><br>
        <button name="pay_momo" class='submit mt-3 mb-5 btn btn-default' style='background-color:white; text-align:left;'>Pay with Mobile Money</button>
    </div>

    <div class='col-md-6'><img src='https://www.nicepng.com/png/detail/53-534638_mastercard-png-mastercard-logo-png-visa-mastercard-logo.png'  width='20%;'><br>
        <button name="pay_card" class='submit mt-3 mb-5 btn btn-default' style='background-color:white; text-align:left;'>Pay with Visa or MasterCard</button>
    </div>
        </form>
    </div>
</div> 
</div>

<!-- footer -->

<?php include('inc/footer.php'); ?>