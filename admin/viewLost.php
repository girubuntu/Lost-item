<?php

require('../config/config.php');
require('../config/db.php');

    if(isset($_POST["view_id"])) {
        $output = ''; 
        $item_id = $_POST["view_id"];
        
        $query = "SELECT * FROM lost_item WHERE item_id='$item_id'";
        $data = mysqli_query($conn, $query);
        
        $output .= '  
        <div class="container"> 
        <form>
        <div class="row">';

        while($row = mysqli_fetch_array($data)) {
          
          $output .= '
                <div class="col-md-6 m-auto mt-7">
            
                <label class="control-label lbl-descriptive">Item Image</label>
                <img src="../uploads/'.$row['item_image'].'" alt="image" style="width:180px; height:150px; border-radius: 10px;" class="card-img-top" >
          
                </div>
                <div></div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">Item name</label>
                  <input type="text" disabled class="form-control" value="'.$row['item_name'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">categoy name</label>
                  <input type="text" disabled class="form-control" value="'.$row['category_name'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">primary color</label>
                  <input type="text" disabled class="form-control" value="'.$row['primary_color'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">date lost</label>
                  <input type="text" disabled class="form-control" value="'.$row['incident_date'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">location</label>
                  <input type="text" disabled class="form-control" value="'.$row['location_type'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">province</label>
                  <input type="text" disabled class="form-control" value="'.$row['province'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">district</label>
                  <input type="text" disabled class="form-control" value="'.$row['district'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">sector</label>
                  <input type="text" disabled class="form-control" value="'.$row['sector'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">first name</label>
                  <input type="text" disabled class="form-control" value="'.$row['first_name'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">last name</label>
                  <input type="text" disabled class="form-control" value="'.$row['last_name'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">phone number</label>
                  <input type="text" disabled class="form-control" value="'.$row['phone_number'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">status</label>
                  <input type="text" disabled class="form-control" value="'.$row['verify'].'">
                </div>
                <div class="form-group col-md-6">
                <label class="control-label lbl-descriptive">state</label>
                  <input type="text" disabled class="form-control" value="'.$row['status'].'">
                </div>
               
                ';
                $output .= " </div>
                </form></div>";  
                echo $output;  
        }
        
      }
       
?>