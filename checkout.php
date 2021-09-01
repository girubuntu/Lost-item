<?php include('inc/header.php');

?>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="./css/checkout.css">
</head>
<div class='row container-fluid ml-5'>
    <div class='col-md-3'></div>
    <div class='col-md-6'>
        <h3 style="margin-left: 4rem;" class='fw-bold mb-5 mt-5'>Choose Payment Method</h3>
        <div class='row'>
            <br>
            <div class='col-md-5'>
                <div style="width: 200px;" class="card">
                    <img style="width: 200px; height: 100px;" src="https://prod-refactor-cms.talkremit.com/wp-content/uploads/2021/05/MTN-MoMo-Logo_pages-to-jpg-0001-600x425.jpg" class="card-img-top">
                    <div style="width: 200px;" class="card-body">
                        <button style="width: 100%;" class='btn btn-default pay' data-toggle="collapse" data-target="#collapseText" aria-expanded="false" aria-controls="collapseText">Pay with Mobile Money</button>
                        <form style="width: 100%;" action='pay.php' method='post'>
                            <div class="form-group collapse" id="collapseText">
                                <input style="margin-bottom: 10px;" class="form-control" placeholder="078xxxxxxx" name="phone_number" type='tel' required>
                                <span class="input-group-btn">&nbsp;
                                    <button type="submit" name="pay_momo" class='btn' class='submit'>Submit</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-5'>
                <div style="width: 200px;" class="card">
                    <img style="width: 200px; height: 100px;" src="https://www.nicepng.com/png/detail/53-534638_mastercard-png-mastercard-logo-png-visa-mastercard-logo.png" class="card-img-top">
                    <div style="width: 200px;" class="card-body">
                        <form style="width: 100%;" action='pay.php' method='post'>
                            <button type="submit" name="pay_card" class='btn btn-default pay'>Visa or MasterCard</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>