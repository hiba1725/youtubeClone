<?php
    require_once("db_connect.php");
    $db = getDB();
    if(isset($_REQUEST["UploadedVideosID"])){
        $sql = "SELECT * FROM UPLOADEDVIDEOS WHERE UPLOADEDVIDEOSID ="."'$_REQUEST[UploadedVideosID]'";
        $rows = $db->query($sql);
        foreach($rows as $row){
            echo($row["NumberOfViews"]." Views"."<br> Uploaded Date: ".$row["UploadDate"]);
        }
    }
?>