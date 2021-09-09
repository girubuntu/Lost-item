<?php

//create Connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//check Connnection
if (mysqli_connect_errno()) {
    //connection failed        
    echo "<span class='failed'>" . 'Request failed, try again!';
}

?>

<style type="text/css">
    .failed {
        margin-left: 30%;
        color: red;
    }
</style>