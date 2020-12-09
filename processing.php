
<?php
    session_start();
    // require_once("classes/video_upload_data.php");
    // require_once("classes/video_processor.php");
    // require_once("config.php");
    require_once("db_connect.php");

    //check for submission of form
    if (isset($_POST['upload-button'])) {
       $_FILES["name"] = $_REQUEST["title-input"];
       if(is_uploaded_file($_FILES["file-input"]["tmp_name"])){
           $email = $_SESSION["email"];
           move_uploaded_file($_FILES["file-input"]["tmp_name"],"Videos/".$email.$_FILES["name"].".mp4");
           move_uploaded_file($_FILES["thumbnail-input"]["tmp_name"],"Thumbnail/".$email.$_FILES["name"].".jpg");
           $text = $_REQUEST["description-input"];
            $db = getDB();
            $userID = "SELECT * FROM USERS WHERE EMAIL="."'$email'";
            $temp = $db->query($userID);
            foreach($temp as $ID){
                $userID = $ID["id"];
            }
            $hide;
            $query = "INSERT INTO UPLOADedVIDEOS (UPLOADEDVIDEOsID,UploadedBy,UPLOADEDVIDEONAME,UPLOADEDVIDEONAMEf,UploadedVideosDescription,Hide) VALUES("."'$email"."$_FILES[name]',"."'$userID',"."'$email"."$_FILES[name]',"."'$_FILES[name]',"."'$text',"."'$_REQUEST[privacy_input]'".")";
            $db->exec($query);
            header("location:menu.php");
       }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="SideNav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="icon" href="https://dolphin-emu.org/m/user/blog/3dsupport/youtube.png" type = "image/x-icon">
    <script src="app.js"></script>
    <script src="myChannel.js"></script>
    <link rel="stylesheet" href="myChannel.css">
    <!-- <script src="AddVideo.js"></script> -->
</head>
<body>
    <div id="navbar">
        <a href="#" class="menu-bars" id="show-menu" title="Menu">
            <i class="fas fa-bars"></i>
            <a href="#"><h1><i class="fab fa-youtube" id="youtube-logo"></i>OurTube</h1></a>
        </a>
        <div id="search-bar">
            <input type="text" placeholder="Search" id="search-input">
            <i class="fas fa-search" title="Search" id="search-button"></i>
        </div>
        <div id="top-upload" title="Create">
            <a href="upload.php"><i class="fas fa-video"></i></a>
        </div>
        <div id="top-sign-in" class:="sign-in">
            <a href="sign_in.php"><i class="fas fa-sign-in-alt nav-sign-in-icon"></i>&nbsp; Sign In</a>
        </div>
        <div id="picture">
            <a href="#"><i class='far fa-user-circle' style="font-size:36px" onclick="openNav()"></i></a>
        </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="myChannel.html"><i class='far fa-id-badge'></i> Your Channel</a>
        <a href="#"><i class="fas fa-sign-in-alt nav-sign-in-icon"></i> Sign Out</a>
        <a href="#"><i class='fas fa-sync'></i> Switch Account</a>
        <a href="#"><i class="fa fa-question-circle"></i> Help</a>
      </div>
    <nav id="nav-menu">
        <ul class="nav-menu-items">
            <div id="navbar-toggle">
                <a href="#" class="menu-bars" id="hide-menu" title="Menu">
                    <i class="fas fa-bars nav-icon"></i>
                </a>
                <a href="menu.html"><h1><i class="fab fa-youtube" id="youtube-logo"></i>OurTube</h1></a>
            </div>
            <hr/>
            <div class="nav-section">
                <li class="nav-text"><a href="menu.html"><i class="fas fa-home nav-icon"></i>&nbsp; Home</a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"></i>&nbsp; Trending</a></li>
                <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i>&nbsp; Subscriptions</a></li>
            </div>
            <hr/>
            <div class="nav-section">
                <li class="nav-text"><a href="#"><i class="fas fa-play-circle nav-icon"></i>&nbsp; Library</a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-history nav-icon"></i>&nbsp; History</a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-clock nav-icon"></i>&nbsp; Watch Later</a></li>
                <li class="nav-text"><a href="#"><i class="far fa-file-video nav-icon"></i>&nbsp; Your Videos</a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-thumbs-up nav-icon"></i>&nbsp; Liked Videos</a></li>
            </div>
            <hr/>
            <div class="nav-section nav-sign-in sign-in">
                <li class="nav-sign-in-text"><a href="sign_in.php">Sign In to like videos, comment, and subscribe.<br/><br/><i class="fas fa-sign-in-alt nav-sign-in-icon"></i>&nbsp; Sign In</a></li>
            </div>
        </ul>
    </nav>
    <div class="main-content">
        <hr/>
        <div id="nav-left-static">
            <li class="nav-text"><a href="menu.html"><i class="fas fa-home nav-icon"></i><br> Home</a></li>
            <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"></i><br> Trending</a></li>
            <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i><br> Subscriptions</a></li>
        </div>
    
        <div class="main-body-min-navbar" id = "upload-card">
            <?php
            
            ?>
        </div>
        
    </div>
</body>
</html>
