<?php 
ob_start();
include('inc/header.php');
require('config/config.php');
require('config/db.php');


if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, ($_POST['password']));

    $query = "SELECT * FROM userlogin WHERE username= '$username' AND pass= '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $username;
        if($username == "admin") {
            header("Location:http://localhost/lost-item/admin/index.php");
        }else {
            header("Location:http://localhost/lost-item/index.php");
            $username = "";
            $password = "";
        }
    
    } else {
        header("location:http://localhost/lost-item/login.php?error= Please enter the correct Username/Email or Password");
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
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

    <div class="global-container">
        <div class="card login-form">
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
                            <a href="#" style="float:right; font-size: 12px:">Forgot Password?</a>
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

    <?php include('inc/footer.php'); ?>