<?php
ob_start();
include('inc/header.php');
require('config/config.php');
require('config/db.php');


if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, ($_POST['password']));

    $query = "SELECT * FROM userlogin WHERE username= '$username' AND pass= '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $username;
        if ($username == "admin") {
            //validate pass - before redirecting
            header("Location:https://irihanolostandfound.herokuapp.com/admin/index.php");
        } else {
            // validate pass and username - before redirecting
            header("Location:https://irihanolostandfound.herokuapp.com/index.php");
            $username = "";
            $password = "";
        }
    } else {
        header("location:https://irihanolostandfound.herokuapp.com/login.php?error= Please enter the correct Username/Email or Password");
    }

    // if($result->num_rows > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     $_SESSION['username'] = $row['username'];

    //     header("Location: http://localhost/lost-item/index.php");
    // } else {
    //     echo "<script>alert('Woops! Email or password is wrong.')</script>"
    // }



}
ob_end_flush();
?>
<style>
    section {
        height: 70vh;
    }
    #img-login {
      width: 90%;
      height: 90%;
      margin-top: 1rem;
    }
    @media only screen and (max-width: 1000px) {
        #img-login {
            display: none;
        }
    }
</style>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<section class="form my-5 mx-auto">
    <div class="container">
        <div class="row no-gutters my-5">
            <div class="col-lg-6">
                <img src="./img/brabus.jpg" alt="" class="img-fluid w-100" id="img-login">
            </div>
            <div class="col-lg-5">
                <div class="card-body">
                    <h1 class="card-title text-center">LOGIN</h1>
                    <div class="card-text">
                    <?php 
                        if(@$_GET['error'] == true){

                    ?>
                    <div class="alert-light text-danger text-center my-3">
                        <?php echo $_GET['error']
                                                
                        ?>
                                            
                    </div>
                        <?php
                        }
                        ?>
                                    

                    <form method="POST" action="#">
                        <div class="form-group">
                            <label for="email">Username or Email</label>
                            <input type="text" name="username" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="passord">Password</label>                            
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>
                                        
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        <div class="signup">
                            <p>Don't have an account?<a href="register.php">Register Here</a></p>
                        </div>
                                        
                    </form>
                </div>
            </div>               

            </div>
        </div>
    </div>
</section>

</div>
