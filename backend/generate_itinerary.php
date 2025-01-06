<?php

function getItinerary($destination) {
    $api_url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=" . urlencode($destination) . "&key=AIzaSyDWw_8W1y6f3udxRkaUw8mrg9yNDp3eImg";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response !== false) {
        error_log("API Response: " . $response);  

        return json_decode($response, true);
    } else {
        return null; 
    }
}
?>
