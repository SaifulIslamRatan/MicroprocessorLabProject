<?php
// Get the latitude and longitude data from the query string
$lat = $_GET['lat'];
$lon = $_GET['lon'];

// Open the text file for appending
$file = fopen("location-data.txt", "a");

// Write the latitude and longitude data to the file
fwrite($file, $lat . "," . $lon . "\n");

// Close the file
fclose($file);

echo "Location saved: " . $lat . ", " . $lon;
?>