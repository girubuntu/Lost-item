<?php include('inc/header.php');

require('config/config.php');
require('config/db.php');

$query = "SELECT * FROM founditem ORDER BY created_at DESC";

$result = mysqli_query($conn,$query);

$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/viewPosts.css">
    <title>Recent Posts</title>
</head>

    <main class='container-fluid mb-5'>
        <ul class="nav nav-tabs justify-content-center text-dark mb-5" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#all">All</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#animals">Animals/Pets</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#electronics">Electronics</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#clothing">Clothing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#accessories">Personal Accessories</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#materials">Tools and Materials</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cards">Cards</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#documents">Documents</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#others">Others</a>
            </li>
            
        </ul>
        <div class="tab-content">
            <section id="all" class="container tab-pane active">
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href="itemDetails.php?id=<?php echo $post['item_id']?> " class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    
                    </div>
                </div>
            </section>
            <section id='animals' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Animals/Pets" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>

            <section id='electronics' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Electronics" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            <section id='clothing' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Clothing" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            <section id='accessories' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Personal Accessories" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            <section id='materials' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Tools and Materials" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            <section id='cards' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Cards" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            <section id='documents' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Documents" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            
            <section id='others' class="container tab-pane">
            <?php
                require('config/config.php');
                require('config/db.php');

                $query = 'SELECT * FROM founditem WHERE category_name = "Others" ORDER BY created_at DESC';

                $result = mysqli_query($conn,$query);

                $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);

                mysqli_close($conn);

            ?>
                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        <?php foreach($posts  as $post): ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="uploads/<?php echo $post['item_image'];?>" alt='image' style='width:100%; height:180px;' class='card-img-top' >
                                    
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $post['item_name']; ?></h4>
                                        <div class='text-center'>
                                            Found on <?php echo $post['incident_date']; ?> <br>
                                            Location: <?php echo $post['district'];?> - <?php echo $post['sector'];?>
                                        </div>
                                        <div class="text-center my-4"> <a href='itemDetails.php?item_id=<?php echo " $post[item_id]";?> ' class="btn">View Details</a> </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>

        </div>
      
    </main>


       <!--footer-->
    
       <?php include('inc/footer.php'); ?>