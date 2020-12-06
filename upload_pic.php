<?php
    require_once("db_connect.php");

    $email = $_COOKIE["email"];
    $db = getDB();
    $uid = "";
    $query ="SELECT * FROM users WHERE email = '$email'";
    $cells = $db->query($query);
    foreach($cells as $cell) {
        $uid = $cell['id'];
    }

    $target_dir = "uploads/profile_pics/";
    $file_name = basename($_FILES["profile-pic"]["name"]);
    $ext = "jpg";
    $new_name = "uploads/profile_pics/".$uid.".".$ext;
    $target_filepath = $target_dir . $file_name;
    $file_type = pathinfo($target_filepath, PATHINFO_EXTENSION);

    if(isset($_POST["upload-pic"]) && !empty($_FILES["profile-pic"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($file_type, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $target_filepath)){
                // Insert image file name into database
                $file_name = rename($target_filepath, $new_name);
                $insert = $db->query("UPDATE users SET picture='".$new_name."' WHERE email='$email'");
                if($insert){
                    $statusMsg = "The file ".$file_name. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    // Display status message
    echo $statusMsg;
    header("location: myChannel.php");
?>
