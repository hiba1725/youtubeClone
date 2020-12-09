<?php
    require_once("db_connect.php");
    $db = getDB();
    $rows = $db->query("SELECT * from uploadedvideos where UploadedBy="."'$_REQUEST[userID]'");
    $totalViewsinOneMonth =0;
    $totalViews=0;
    $mostViewdin48;

    foreach($rows as $row){
        $totalViews += (int)$row["NumberOfViews"];
    }
    echo("Total views: ".$totalViews."<br>");
    $rows = $db->query("SELECT * from displayedvideodetails where UploadedBy="."'$_REQUEST[userID]'");
    foreach($rows as $row){
        $currenttime = strtotime("0");
        $viewedTime = strtotime($row["ViewedAt"]);
        if($currenttime-$viewedTime<48){
            $totalViewsinOneMonth +=1;
        }
    }
    echo("Views last Month: ".$totalViewsinOneMonth."<br>");
    echo("Top 10 viewed videos: ");
    $sql ="SELECT * FROM UPLOADEDVIDEOS WHERE UploadedBy="."'$_REQUEST[userID]'" ." ORDER BY numberofviews DESC LIMIT 10 ";
    $rows = $db->query($sql);
    foreach($rows as $row){
        echo($row["UploadedVideoNamef"].", ");
    }
    echo("<br>");
    echo("most viewed videos: ");
    $sql ="SELECT * FROM UPLOADEDVIDEOS WHERE UploadedBy="."'$_REQUEST[userID]'" ." ORDER BY numberofviews DESC LIMIT 10 ";
    $rows = $db->query($sql);
    foreach($rows as $row){
        echo($row["UploadedVideoNamef"].", ");
    }
?>