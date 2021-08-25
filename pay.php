<?php
session_start();
require('config/config.php');
require('config/db.php');

if (isset($_POST['pay_card'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    //preparing a payment request
    $request = [
        "tx_ref" => time(),
        "amount" => "100",
        "currency" => "RWF",
        "redirect_url" => "http://localhost:8080/Lost-item/process.php",
        "payment_options"  => "card",
        "meta" => [
            "consumer_id" => "id",
            "price" => "100",
        ],
        "customer" => [
            "name" => $firstName . " " . $lastName,
            "email" => $email,
            "phonenumber" => $phone_number,

        ],
        "customizations" => [
            "title" => "Submit Lost Item Payment",
            "description" => "Our services are worthwhile. Pay the price to display your lost item to the whole world and increase your chance to get it back",
        ]
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK_TEST-e6d5ce4aa6175e74b58727735e9a4541-X',
            'Content-Type: application/json'
        )
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    curl_close($curl);

    $res = json_decode($response);
    if ($res->status == 'success') {
        $link = $res->data->link;
        header('Location: ' . $link);
    } else {
        'We can not process your payment';
    }
} else if (isset($_POST['pay_momo'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    //preparing a payment request
    $request = [
        "tx_ref" => time(),
        "amount" => "100",
        "currency" => "RWF",
        "network" => "MTN",
        "email" => $email,
        "phone_number" => $phone_number,
        "fullname" => $firstName . " " . $lastName,
        "redirect_url" => "http://localhost:8080/Lost-item/process.php",
        "meta" => [
            "consumer_id" => "id",
            "price" => "100",
        ],
        "customer" => [
            "name" => $firstName . " " . $lastName,
            "email" => $email,
            "phone_number" => $phone_number,

        ],
        "customizations" => [
            "title" => "Submit Lost Item Payment",
            "description" => "Our services are worthwhile. Pay the price to display your lost item to the whole world and increase your chance to get it back.",
        ]
    ];


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/charges?type=mobile_money_rwanda',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK_TEST-e6d5ce4aa6175e74b58727735e9a4541-X',
            'Content-Type: application/json'
        )
    ));

    //FLWSECK-f567136b2f4ad68c1ff153336d218372-X

    $response = curl_exec($curl);

    curl_close($curl);
    curl_close($curl);

    $res = json_decode($response);
    if ($res->status == 'success') {
        $link = $res->meta->authorization->redirect;
        header('Location: ' . $link);
    } else {
        'We can not process your payment';
    }
}
