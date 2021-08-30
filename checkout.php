<?php include('inc/header.php');

?>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="./css/checkout.css">
</head>
<div class='row container-fluid ml-5'>
    <div class='col-md-3'></div>
    <div class='col-md-6'>
    <h3 class='fw-bold mb-5 mt-5'>Choose a payment method</h3>
        <div class='row'>
            <br>
            <div class='col-md-5'>
                <div class="card" >
                    <img src="https://prod-refactor-cms.talkremit.com/wp-content/uploads/2021/05/MTN-MoMo-Logo_pages-to-jpg-0001-600x425.jpg" class="card-img-top" alt="" height='230px'>
                    <div class="card-body">
                        <h4 class="card-title">
                        <button class='btn btn-default pay' data-toggle="collapse" data-target="#collapseText" aria-expanded="false" aria-controls="collapseText">Pay with Mobile Money</button>
                        </h4>
                        <form action='pay.php' method='post' class='form-inline'>
                        <div class="form-group collapse" id="collapseText">
                            <input class="form-control" placeholder="Enter your phone number" name="phone_number" type='tel' required>
                            <span class="input-group-btn">&nbsp;
                            <button type="submit" name="pay_momo" class='btn' class='submit'>Submit</button>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>    
            </div>

            <div class='col-md-1'></div>

            <div class='col-md-5'>
                <div class="card">
                    <img src="https://www.nicepng.com/png/detail/53-534638_mastercard-png-mastercard-logo-png-visa-mastercard-logo.png" class="card-img-top" alt="" height='230px'>
                    <div class="card-body">
                        <h5 class="card-title">
                        <form action='pay.php' method='post'>
                        <button type="submit" name="pay_card" class='btn btn-default pay' >Pay with Visa or MasterCard</button>
                        </form>    
                    </h5>
                    </div>
                </div>    
            </div>
        </div>
       
    </div>
</div>
</div>
<!-- footer -->

<?php include('inc/footer.php'); ?>