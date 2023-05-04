<!DOCTYPE html>
<html>
<head>
	<title>location</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		function showLocation(lat, lng) {
			// open a new window with the Google Maps location
			window.open("https://www.google.com/maps/place/"+lat+","+lng, '_blank');
		}
	</script>
    <style>
        body {
  background-color: lime;
}
     </style>   
</head>
<body>

<div class="container" style="background-color:rgba(6, 246, 45, 0.79);">
    <div class="container mt-3" style="width: 800px; position: absolute;
  top: 250px;
  left: 500px;">
		<h2 style="text-align: center;">requested persion table</h2>
		<table class="table" style="background-color:orange">
			<thead>
				<tr>
					<th>latitude</th>
					<th>longitude</th>
					<th>See Location</th>
					<th>Check</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$file = fopen("location-data.txt", "r");
					if ($file) {
						while (($line = fgets($file)) !== false) {
							$columns = explode(",", $line);
							echo "<tr>";
							echo "<td>".$columns[0]."</td>";
							echo "<td>".$columns[1]."</td>";
							echo "<td><button type='button' class='btn btn-primary' onclick='showLocation(".$columns[0].",".$columns[1].")'>See Location</button></td>";
							echo "<td><input type='checkbox' name='delete[]' value='".$line."'></td>";
							echo "</tr>";
						}
						fclose($file);
					}
				?>
			</tbody>
		</table>
      </div>
		
	</div>

	

</body>
</html>