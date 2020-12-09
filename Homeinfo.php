<?php
require_once("db_connect");
$db = getDB();
// $query = "SELECT * FROM UPLOADEDVIDEOS";
$query = "SELECT * FROM UPLOADEDVIDEOS WHERE UPLOADEDVIDEOSID LIKE " . "'$_REQUEST[email]%'";
$videos = $db->query($query);
foreach ($videos as $video) {
?>
    <script type="text/javascript">
        AddVideo("<?= $video["UploadedVideosID"] ?>", "<?= $video["UploadedVideoName"] ?>", "<?= $video["UploadedVideosDescription"] ?>", "<?= $username ?>");
    </script>
<?php
}
?>