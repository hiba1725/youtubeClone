
<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign In
        </title>
        <meta charset="utf-8">
        <link href="sign_in_up_styles.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="https://dolphin-emu.org/m/user/blog/3dsupport/youtube.png" type = "image/x-icon">
    </head>
    <body>
        <div class="middle-card">
            <p>Welcome to OurTube!<br>Sign In to like videos, comment and subscribe!</p>
            <form method="POST" action="validate.php" id="sign-in-form">
                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" required><br>
                
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required><br>
                
                <div style="margin-top:15px">
                    <input type="checkbox" checked="checked" name="remember-me" style="height:20px;width:20px">
                    <label id="remember-me" for="remember-me"> Remember me </label>
                </div><br>
                <span id="error" style="color: white; font-size:15pt; text-align: center; color: red;"></span>
                <br>

                <input type="submit" value="Sign In" id="submit" name="sign-in-btn">
            </form>
            <div class="bottom-right">Don't have an account? <a href="sign_up.php">Sign up!</a></div>
            <div class="bottom-right"><a href="sign_out.php">Continue signed out</a></div>
        </div>
    
        <?php
            if(isset($_COOKIE['email']) && $_COOKIE['password']) {
                $email = $_COOKIE['email'];
                $password = $_COOKIE['password'];
                echo "
                    <script>
                        function $(id) { return document.getElementById(id); }
                        $('email').value = '$email';
                        $('password').value = '$password';
                    </script>
                ";
            }
        ?>
    </body>
</html>
