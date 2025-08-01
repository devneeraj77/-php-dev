<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $lat = $_POST['latitude'] ?? 'N/A';
  $lon = $_POST['longitude'] ?? 'N/A';
  echo "Latitude: $lat<br>";
  echo "Longitude: $lon<br>";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Get Location</title>
</head>
<body>
  <h1>Get My Location</h1>
  <button onclick="getLocation()">Get Location</button>

  <form method="POST" id="locationForm">
    <input type="hidden" name="latitude" id="lat">
    <input type="hidden" name="longitude" id="lon">
  </form>

  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          document.getElementById('lat').value = position.coords.latitude;
          document.getElementById('lon').value = position.coords.longitude;
          document.getElementById('locationForm').submit();
        });
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }
  </script>
</body>
</html>
