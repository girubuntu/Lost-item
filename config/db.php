<?php
    
    //create Connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //check Connnection
    if(mysqli_connect_errno()) {
        //connection failed        
        echo 'failed to connect to mysql'. mysqli_connect_errno();
    }