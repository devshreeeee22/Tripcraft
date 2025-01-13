<?php
include './db.php';

$destination_id = $_GET['id'];
$result = $conn->query("SELECT name, latitude, longitude FROM destinations WHERE id = $destination_id");
$destination = $result->fetch_assoc();

$latitude = $destination['latitude']; 
$longitude = $destination['longitude'];  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Map of <?php echo $destination['name']; ?></title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->
</head>
<body>
    <h1><?php echo $destination['name']; ?></h1>
    <iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAD5KYxsn8p_mbiuvt145HJRIFLhcZK7XY&center=<?php echo $latitude; ?>,<?php echo $longitude; ?>&zoom=14" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</body>
</html>

