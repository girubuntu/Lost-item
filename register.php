<?php
ob_start();
include('inc/header.php');

require('config/config.php');
require('config/db.php');

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, ($_POST['password']));
    $password2 = mysqli_real_escape_string($conn, ($_POST['password2']));
    $pattern = '/^(?=.*[!@#$%^&*-.?])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

    $query = "SELECT * FROM userlogin WHERE username= '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if(!$user) {
        if(!preg_match($pattern, $password)){
            header("Location: https://localhost/lost-item/register.php?error= Password is weak");
        } elseif($password != $password2) {
            header("Location: https://localhost/lost-item/register.php?error= Password do not match");
        } elseif($user['username'] == $username){
            header("Location:https://localhost/lost-item/register.php?error=Username/email already exist");
        } else {
            $query = "INSERT INTO userlogin (username, pass) VALUES ('$username', '$password')";
            mysqli_query($conn, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "you are logged in";
            header("Location: https://localhost/lost-item/login.php");
        }
        
    
    } else {
        header("Location:https://localhost/lost-item/register.php?error=Username/email already exist");
    }

    
    // if($password != $password2) {
    //     header("Location: https://irihanolostandfound.herokuapp.com/register.php?error= Password do not match");
    // } else {
    //     $query = "SELECT * FROM userlogin WHERE username= '$username'";
    //     $result = mysqli_query($conn, $query);

    //     $user = mysqli_fetch_assoc($result);
    //     if($user) {
    //         if($user['username'] == $username) {
    //             header("Location:https://irihanolostandfound.herokuapp.com/register.php?error=Username/email already exist");
    //         }
    //     }

    //     $query = "INSERT INTO userlogin (username, pass) VALUES ('$username', '$password')";
    //     mysqli_query($conn, $query);
    //     $_SESSION['username'] = $username;
    //     $_SESSION['success'] = "you are logged in";
    //     header("Location: https://irihanolostandfound.herokuapp.com/login.php");

    // }



}
ob_end_flush();
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Recent Posts</title>
</head>

    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">REGISTER</h1>
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
                            <input type="type" name="username" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" required>
                            <small>(password must contain atleat 8 char, upper letter, lower letter, symbol and number)</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Re-enter Password</label>
                            <input type="password" name="password2" class="form-control form-control-sm" required>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        
                        <p class="mt-1 float-right">Already have an account!<a href="login.php"> login Here</a></p>
                                              
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    <?php include('inc/footer.php'); ?>