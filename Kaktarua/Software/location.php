

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>request</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/slick.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
		@media (min-width: 576px) {
			.container-fluid {
				max-width: 540px;
			}
		}
		@media (min-width: 768px) {
			.container-fluid {
				max-width: 720px;
			}
		}
		@media (min-width: 992px) {
			.container-fluid {
				max-width: 960px;
			}
		}
		@media (min-width: 1200px) {
			.container-fluid {
				max-width: 1140px;
			}
		}
	</style>
  </head>
  <body>
    <div class="container" style="background-color:rgba(6, 246, 45, 0.79);">
  <div class="container md-2 mt-3" style="display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;">
    
      
       
        
        <div class="d-grid gap-2 col-8 mx-auto">
        <h1 class="text-center">Request for help,</h1>
        <button onclick="getLocation()" class="btn btn-primary btn-block mb-4" style="background-color:orange;width: 200px;
  height: 200px;
  border-radius: 50%; margin: auto;font-size: 40px; 
			font-weight: bold; border: 4px solid white;">help</button>
       
       

            
        
          </div>

          
     </div>
</div>
     <script>
 function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(saveLocation);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function saveLocation(position) {
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

  // Send the latitude and longitude data to a PHP script to save to a file
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xmlhttp.open("GET", "save_location.php?lat=" + latitude + "&lon=" + longitude, true);
  xmlhttp.send();
}


</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>