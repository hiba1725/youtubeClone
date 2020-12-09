<?php
    require_once("db_connect.php");
    $db = getDB();
    $sql = "UPDATE UPLOADEDVIDEOS SET UPLOADEDVIDEONAMEf="."'$_REQUEST[title_input]',"."UploadedVideosDescription="."'$_REQUEST[description_input]',"."Hide="."'$_REQUEST[privacy_input]'"." WHERE UploadedVideosID="."'$_REQUEST[UploadedVideosID]'";
    $db->exec($sql);
    header("location:myChannel.php");
?>