<?php
require_once("db_connect.php");
$db = getDB();
if (!isset($_REQUEST["addLike"]) & !isset($_REQUEST["addDisLike"])) {
    $sql = "SELECT * FROM DISPLAYEDVIDEODETAILS WHERE NAME =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
    $rows = $db->query($sql);
    $rows = $rows->fetchAll();
    if (!$rows) {
        $sql = "SELECT * FROM UPLOADEDVIDEOS WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
        $rows = $db->query($sql);
        foreach ($rows as $row) {
            $sql = "INSERT INTO DISPLAYEDVIDEODETAILS (ID,NAME,UPLOADEDBY,ViewingBy) VALUES (" . "'$_REQUEST[UploadedVideosID]'," . "'$row[UploadedVideoName]'," . "'$row[UploadedBy]',"  . "'$_REQUEST[uid]'" . ")";
            $db->exec($sql);
            $number = (int)$row["NumberOfViews"] +1;
            $sql = "UPDATE UPLOADEDVIDEOS SET NumberOfViews=" . "'$number'" . "WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
            $db->exec($sql);
            
        }
    }

    $sql = "SELECT * FROM UPLOADEDVIDEOS WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
    $rows = $db->query($sql);
    foreach ($rows as $row) {
        echo ($row["UploadedVideosDescription"] . "~" . $row["NumberOfLikes"] . "~" . $row["NumberOfDislikes"]);
        // print("".$_REQUEST["UploadedVideosID"]);
    }
}
if (isset($_REQUEST["addLike"])) {
    $number;
    $sql = "SELECT * FROM DISPLAYEDVIDEODETAILS WHERE NAME =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
    $rows = $db->query($sql);
    $rows = $rows->fetchAll();
    $sql = "SELECT * FROM UPLOADEDVIDEOS WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
    $rowschild = $db->query($sql);
    foreach ($rowschild as $row) {
        $number = (int)$row["NumberOfLikes"];
    }
    foreach ($rows as $row) {
        if ($row["LikedBefore"] == 0) {
            $number += 1;
            $sql = "UPDATE DISPLAYEDVIDEODETAILS SET LIKEdBEFORE='1'" .  "WHERE name =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
            $db->exec($sql);
            $sql = "UPDATE UPLOADEDVIDEOS SET numberoflikes=" . "'$number'" . "WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
            $db->exec($sql);
            echo ($number);
        } else {
            $number -= 1;
            $sql = "UPDATE DISPLAYEDVIDEODETAILS SET LIKEdBEFORE='0'" . "WHERE name =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
            $db->exec($sql);
            $sql = "UPDATE UPLOADEDVIDEOS SET numberoflikes=" . "'$number'" . "WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
            $db->exec($sql);
            echo ($number);
        }
    }
}
if (isset($_REQUEST["addDisLike"])) {
    $sql = "SELECT * FROM DISPLAYEDVIDEODETAILS WHERE NAME =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
    $rows = $db->query($sql);
    $rows = $rows->fetchAll();
    $sql = "SELECT * FROM UPLOADEDVIDEOS WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
    $rowschild = $db->query($sql);
    $number;
    foreach ($rowschild as $row) {
        $number = (int)$row["NumberOfDislikes"];
    }
    foreach ($rows as $row) {
        if ($row["DisLikedBefore"] == 0) {
            $number += 1;
            $sql = "UPDATE DISPLAYEDVIDEODETAILS SET DisLIKEdBEFORE='1'" .  "WHERE name =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
            $db->exec($sql);
            $sql = "UPDATE UPLOADEDVIDEOS SET numberofDislikes=" . "'$number'" . "WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
            $db->exec($sql);
            echo ($number);
        } else {
            $number -= 1;
            $sql = "UPDATE DISPLAYEDVIDEODETAILS SET DisLIKEdBEFORE='0'" . "WHERE name =" . "'$_REQUEST[UploadedVideosName]'" . "AND ViewingBy =" . "'$_REQUEST[uid]'";
            $db->exec($sql);
            $sql = "UPDATE UPLOADEDVIDEOS SET numberofDislikes=" . "'$number'" . "WHERE UPLOADEDVIDEOname =" . "'$_REQUEST[UploadedVideosName]'";
            $db->exec($sql);
            echo ($number);
        }
    }
}
