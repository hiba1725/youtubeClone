
<?php

    include("./db_connect.php");
    include("./userclass.php");
    $userClass = new UserClass();
    $errorMsgReg = "";
    $username_error = "";
    $password_error = "";

    if (!empty($_POST['sign-up-btn'])) {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $conf_password=$_POST['confirm-password'];
        /* Regular expression check */
        if ($password !=$conf_password){
            $password_error = "Passwords should match!";
        } else {
            $password_error = "";
            $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
            $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
            if(!$username_check) {
                $username_error = "Username should not contain spaces";
            }
            if($username_check && $email_check) {
                $uid=$userClass->userRegistration($username,$password,$email);
                if($uid) {
                    $url = BASE_URL.'menu.php';
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: $url"); // Page redirecting to home.php 
                } else {
                    $errorMsgReg="Username or Email already exists.";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            OurTube Sign Up
        </title>
        <link href="sign_in_up_styles.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="https://dolphin-emu.org/m/user/blog/3dsupport/youtube.png" type = "image/x-icon">
        <script src="check_availability.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="middle-card">
            <p>Welcome to OurTube!<br>Sign Up for an account now!</p>
            <form id="sign-in-form" action="sign_up.php" method="POST">
                <label for="username">User Name</label><br>
                <input type="text" id="username" name="username" required><br>
                <span style="color: white; font-size:15pt; text-align: center; color: red;"><?php echo $errorMsgReg;echo $username_error;?><br>

                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" required><br>
                <span style="color: white; font-size:15pt; text-align: center; color: red;"><?php echo $errorMsgReg;?><br/>
                
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <label for="confirm-password">Confirm Password</label><br>
                <input type="password" id="confirm-password" name="confirm-password" required><br>
                <span style="color: white; font-size:15pt; text-align: center; color: red;"><?php echo $password_error;?><br>

                <input type="submit" value="Sign Up" name="sign-up-btn" id="submit">
            </form>
            <div class="bottom-right">Already have an account? <a href="sign_in.php">Sign in!</a></div>
        </div>
    </body>
</html>