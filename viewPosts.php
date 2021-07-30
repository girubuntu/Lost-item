<?php

require('config/config.php');
require('config/db.php');

$query = 'SELECT * FROM lost_item';

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
              <a class="nav-link" data-toggle="tab" href="/viewPosts.html">ID  Cards</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#main-footer">Bank Cards</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Driving Licence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Land Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">School Cards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Insurance Cards</a>
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
                                    <?php echo '<img src="data:image;base64,'.base64_encode($post['item_image']).'" alt="image" style="width:100%; height:160px;" class="card-img-top" >' ?>
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>Lost <?php echo $post['incident_date']; ?>  at <?php echo $post['incident_time']; ?>
                                            Location: <?php echo $post['district']; ?>
                                        </div>
                                        <div class="text-center my-4"> <a href="#" class="btn">View Details</a> </div>
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