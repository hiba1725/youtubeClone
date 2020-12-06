<?php
        session_start();

        require_once("db_connect.php");
    
        $email = $_COOKIE["email"];
        $db = getDB();
        $uid = "";
        $query ="SELECT * FROM users WHERE email = '$email'";
        $cells = $db->query($query);
        foreach($cells as $cell) {
            $uid = $cell['id'];
        }
    
        $profile_pic = "uploads/profile_pics/".$uid.".jpg";
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OurTube</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="SideNav.css">
    <link rel="stylesheet" href="myChannel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="icon" href="https://dolphin-emu.org/m/user/blog/3dsupport/youtube.png" type = "image/x-icon">
    <script src="app.js"></script>
    <script src="AddVideo.js"></script>
</head>
<body>
    <div id="navbar">
        <a href="#" class="menu-bars" id="show-menu" title="Menu">
            <i class="fas fa-bars"></i>
            <a href="menu.php"><h1><i class="fab fa-youtube" id="youtube-logo"></i>OurTube</h1></a>
        </a>
        <div id="search-bar">
            <input type="text" placeholder="Search" id="search-input">
            <i class="fas fa-search" title="Search" id="search-button"></i>
            <button id="add-video">Add video</button>
        </div>
        <a href="upload.php"><div id="top-upload" title="Create">
            <i class="fas fa-video"></i>
        </div></a>
            <?php 
                if(isset($_SESSION['email'])){
                    echo "
                        <img src='$profile_pic' alt='Profile Picture' id='picture' style='
                        margin: auto;
                        height: 50px;
                        width: 50px;
                        border-radius: 360px;
                        cursor: pointer;' onclick='openNav()'></img>
                    ";
                } else {
                    echo '
                        <a href="sign_in.php"><div id="top-sign-in" class:="sign-in">
                            <i class="fas fa-sign-in-alt nav-sign-in-icon"></i>&nbsp; Sign In
                        </div></a>
                    ';
                }
            ?>
    </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="myChannel.php"><i class='far fa-id-badge'></i> Your Channel</a>
        <a href="sign_out.php"><i class="fas fa-sign-in-alt nav-sign-in-icon"></i> Sign Out</a>
        <a href="#"><i class='fas fa-sync'></i> Switch Account</a>
        <a href="#"><i class="fa fa-question-circle"></i> Help</a>
        <a href="#" style="background-color:rgb(52, 49, 49); margin-left: 2px; cursor: default;">
        <?="You are logged in as " . $_SESSION['email'];?>
        </a>
      </div>
    <nav id="nav-menu">
        <ul class="nav-menu-items">
            <div id="navbar-toggle">
                <a href="#" class="menu-bars" id="hide-menu" title="Menu">
                    <i class="fas fa-bars nav-icon"></i>
                </a>
                <a href="menu.php"><h1><i class="fab fa-youtube" id="youtube-logo"></i>OurTube</h1></a>
            </div>
            <hr/>
            <div class="nav-section">
                <li class="nav-text"><a href="menu.php"><i class="fas fa-home nav-icon"></i>&nbsp; Home</a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"></i>&nbsp; Trending</a></li><?php
                if(isset($_SESSION['email'])){
                    echo '
                        <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i>&nbsp; Subscriptions</a></li>
                    ';
                } else {
                    echo '
                        <li class="nav-text"><a href="sign_in.php"><i class="fab fa-youtube nav-icon"></i>&nbsp; Subscriptions</a></li>
                    ';
                }
                ?>
            </div>
            <hr/>
            <div class="nav-section">
                <?php
                if(isset($_SESSION['email'])){
                    echo '
                        <li class="nav-text"><a href="#"><i class="fas fa-play-circle nav-icon"></i>&nbsp; Library</a></li>
                        <li class="nav-text"><a href="#"><i class="fas fa-history nav-icon"></i>&nbsp; History</a></li>
                        <li class="nav-text"><a href="#"><i class="fas fa-clock nav-icon"></i>&nbsp; Watch Later</a></li>
                        <li class="nav-text"><a href="myChannel.php"><i class="far fa-file-video nav-icon"></i>&nbsp; Your Videos</a></li>
                        <li class="nav-text"><a href="#"><i class="fas fa-thumbs-up nav-icon"></i>&nbsp; Liked Videos</a></li>
                    ';
                } else {
                    echo '
                        <li class="nav-text"><a href="sign_in.php"><i class="fas fa-play-circle nav-icon"></i>&nbsp; Library</a></li>
                        <li class="nav-text"><a href="sign_in.php"><i class="fas fa-history nav-icon"></i>&nbsp; History</a></li>
                        <li class="nav-text"><a href="sign_in.php"><i class="fas fa-clock nav-icon"></i>&nbsp; Watch Later</a></li>
                    ';
                }
                ?>
            </div>
            <hr/>
            <div class="nav-section nav-sign-in sign-in">
                <?php 
                    if(isset($_SESSION['email'])){
                        echo "<span style='padding: 8px'>You are logged in as " . $_SESSION['email'] . "</span>";
                    } else {
                        echo '
                            <li class="nav-sign-in-text"><a href="sign_in.php">Sign In to like videos, comment, and subscribe.<br/><br/><i class="fas fa-sign-in-alt nav-sign-in-icon"></i>&nbsp; Sign In</a></li>
                        ';
                    }
                ?>
                
            </div>
        </ul>
    </nav>
    <div class="main-content">
        <hr/>
        <div id="nav-left-static">
            <li class="nav-text"><a href="menu.php"><i class="fas fa-home nav-icon"></i><br> Home</a></li>
            <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"></i><br> Trending</a></li>
            <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i><br> Subscriptions</a></li>
        </div>
    </div>
        <div class="main-body-min-navbar" id = "main-body">
                
        </div>
        
    </div>
</body>
</html>
