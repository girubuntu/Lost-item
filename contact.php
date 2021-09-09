<?php include('inc/header.php');

if (isset($_POST['submit'])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $toEmail = "autoparts250test@gmail.com";
    $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
    if (mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
    }
    echo "<span class='success'>" . 'We have received your message, ' . $name . "</span>";
}
?>

<style type="text/css">
    h2 {
        margin-left: 40%;
        margin-top: 3rem;
    }

    .success {
        margin-left: 40%;
        color: green;
    }

    .form-style-1 {
        margin: 10px auto;
        max-width: 400px;
        padding: 20px 12px 10px 20px;
        font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }

    .form-style-1 li {
        padding: 0;
        display: block;
        list-style: none;
        margin: 10px 0 0 0;
    }

    .form-style-1 label {
        margin: 0 0 3px 0;
        padding: 0px;
        display: block;
        font-weight: bold;
    }

    .form-style-1 input[type=text],
    .form-style-1 input[type=date],
    .form-style-1 input[type=datetime],
    .form-style-1 input[type=number],
    .form-style-1 input[type=search],
    .form-style-1 input[type=time],
    .form-style-1 input[type=url],
    .form-style-1 input[type=email],
    textarea,
    select {
        border-radius: 10px;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        border: 1px solid #BEBEBE;
        padding: 7px;
        margin: 0px;
        margin-bottom: 1rem;
        transition: all 0.30s ease-in-out;
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;
        outline: none;
    }

    .form-style-1 input[type=text]:focus,
    .form-style-1 input[type=date]:focus,
    .form-style-1 input[type=datetime]:focus,
    .form-style-1 input[type=number]:focus,
    .form-style-1 input[type=search]:focus,
    .form-style-1 input[type=time]:focus,
    .form-style-1 input[type=url]:focus,
    .form-style-1 input[type=email]:focus,
    .form-style-1 textarea:focus,
    .form-style-1 select:focus {
        -moz-box-shadow: 0 0 8px #88D5E9;
        -webkit-box-shadow: 0 0 8px #88D5E9;
        box-shadow: 0 0 8px #88D5E9;
        border: 1px solid #88D5E9;
    }

    .form-style-1 input[type=submit],
    .form-style-1 input[type=button] {
        background: #4B99AD;
        padding: 8px 15px 8px 15px;
        border: none;
        color: #fff;
        margin-top: 2rem;
        border-radius: 10px;
    }

    .form-style-1 input[type=submit]:hover,
    .form-style-1 input[type=button]:hover {
        background: #4691A4;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }

    .form-style-1 .required {
        color: red;
    }
</style>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<main class="form-container">
    <h2>Contact Us</h2>
    <form class="form-style-1" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" onsubmit="return validateContactForm()">

        <div class="input-row">
            <label style="padding-top: 20px;">Name</label> <span id="userName-info" class="info"></span><br /> <input type="text" class="input-field" name="userName" id="userName" />
        </div>
        <div class="input-row">
            <label>Email</label> <span id="userEmail-info" class="info"></span><br /> <input type="text" class="input-field" name="userEmail" id="userEmail" />
        </div>
        <div class="input-row">
            <label>Subject</label> <span id="subject-info" class="info"></span><br /> <input type="text" class="input-field" name="subject" id="subject" />
        </div>
        <div class="input-row">
            <label>Message</label> <span id="userMessage-info" class="info"></span><br />
            <textarea name="content" id="content" class="input-field" cols="60" rows="4"></textarea>
        </div>
        <div>
            <input type="submit" name="submit" class="btn-submit" value="Send" />

            <div id="statusMessage">
                <?php
                if (!empty($message)) {
                ?>
                    <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </form>
</main>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function validateContactForm() {
        var valid = true;

        $(".info").html("");
        $(".input-field").css('border', '#e0dfdf 1px solid');
        var userName = $("#userName").val();
        var userEmail = $("#userEmail").val();
        var subject = $("#subject").val();
        var content = $("#content").val();

        if (userName == "") {
            $("#userName-info").html("Required.");
            $("#userName").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (userEmail == "") {
            $("#userEmail-info").html("Required.");
            $("#userEmail").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            $("#userEmail-info").html("Invalid Email Address.");
            $("#userEmail").css('border', '#e66262 1px solid');
            valid = false;
        }

        if (subject == "") {
            $("#subject-info").html("Required.");
            $("#subject").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (content == "") {
            $("#userMessage-info").html("Required.");
            $("#content").css('border', '#e66262 1px solid');
            valid = false;
        }
        return valid;
    }
</script>