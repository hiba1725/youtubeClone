<?php
    require_once("db_connect.php");
    $db = getDB();
    $sql = "DELETE FROM UPLOADEDVIDEOS WHERE UploadedVideosID="."'$_REQUEST[UploadedVideosID]'";
    $db->exec($sql);
    $sql ="DELETE FROM DISPLAYEDVIDEODETAILS WHERE ID="."'$_REQUEST[UploadedVideosID]'";
    $db->exec($sql);
    header("location:myChannel.php");
?>