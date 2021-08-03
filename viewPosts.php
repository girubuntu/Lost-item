<?php

require('config/config.php');
require('config/db.php');

$query = 'SELECT * FROM lost_item UNION ALL SELECT *  FROM founditem ORDER BY created_at DESC';

$result = mysqli_query($conn,$query);

$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>

<head>
    <link rel="stylesheet" href="./css/viewPosts.css">
    <title>Recent Posts</title>
</head>

    <main class='container-fluid mb-5'>
        <ul class="nav nav-tabs justify-content-center text-dark mb-5">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="/viewPosts.html">All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="/viewPosts.html">Animals/Pets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#main-footer">Electronics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Clothing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Personal Accessories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Others</a>
            </li>
        </ul>
        <section id='posts'>
            
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'><?php
                                            if ($post['status'] == 'lost')
                                            echo "Lost"; 
                                            else echo "Found";?> on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a>' </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                       
                    </div>
                </div>
        </section>
    </main>
    
    <!--footer-->
    
    <?php include('inc/footer.php'); ?>