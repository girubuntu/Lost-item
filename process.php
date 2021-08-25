<?php

require('config/config.php');
require('config/db.php');

if(isset($_GET['status'])){
    //check payment status

    if($_GET['status'] == 'cancelled')
    {
        //echo 'You cancelled the payment';
        
        header('Location:checkout.php');
    }

    else if($_GET['status'] == 'successful'){

        $txid = $_GET['transaction_id'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "Authorization: Bearer FLWSECK_TEST-e6d5ce4aa6175e74b58727735e9a4541-X"
            ),
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);

          $res = json_decode($response);
          if($res->status){
              $amountPaid = $res->data->charged_amount;
              $amountToPay = $res->data->meta->price;
              if($amountPaid >= $amountToPay){
                $item_id = $_COOKIE["last_id"];
                if(isset($item_id)) {
                    
                    $query = "update lost_item SET paid = 1 WHERE item_id = $item_id";
                    if (mysqli_query($conn, $query)) {

                        $_SESSION['status'] = 'Your  post has been submitted successfully!';
                        header('Location:index.php');
                      } else {
                        echo "Error accessing the record " . $conn->error;
                      }
                    
                 }
              }
              else{
                  echo 'Fraud transaction detected';
              }
          }
          else{
              echo 'Can not process your payment';
          }
    }
}
if(isset($_GET['resp'])){

    $item_id = $_COOKIE["last_id"];
        if(isset($item_id)) {
            
            $query = "update lost_item SET paid = 1 WHERE item_id = $item_id";
            if (mysqli_query($conn, $query)) {

                $_SESSION['status'] = 'Your  post has been submitted successfully!';
                header('Location:index.php');
                } else {
                echo "Error accessing the record " . $conn->error;
                }
            
            }
            header('Location:index.php');
}
else echo 'error in payment';

?>