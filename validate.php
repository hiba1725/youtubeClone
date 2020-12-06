<?php
    include("db_connect.php");
    include('userclass.php');
    $userClass = new userClass();

    if(isset($_POST["sign-in-btn"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $uid=$userClass->userLogin($email,$password);
        if($uid) {
            $remember_me = $_POST["remember-me"];
            if(isset($_POST["remember-me"])){
                setcookie('email',$email,time()+60*60*7);
                setcookie('password',$password,time()+60*60*7);
            }
            session_start();
            $_SESSION['email'] = $email;
            header("location:menu.php");

        } else {
            echo "Email or Password invalid.<br> Click <a href=\"sign_in.php\">here</a> to try again";
        }

    } else {
        header("location: Sign_in.php");
    }
?>