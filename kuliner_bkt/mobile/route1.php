<!DOCTYPE html>
<html>
<head>
<style>html, body, #map-canvas {height: 85%;margin:0px;padding: 0px;}
#infodirection {height: 30%; margin:0px; padding:0px;}
</style>
<script 
src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<?php
$latAsal= $_GET['latAsal']; 
$lngAsal = $_GET['lngAsal'];
$latTujuan = $_GET['latTujuan']; 
$lngTujuan = $_GET['lngTujuan'];
?>
<script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
function initialize() {
directionsDisplay = new google.maps.DirectionsRenderer();
var unand = new google.maps.LatLng(-0.914634, 100.458670);
var mapOptions = {zoom:10,center: unand};
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
directionsDisplay.setMap(map);
   
      var objIK = new google.maps.Data();
      objIK.loadGeoJson('kuliner.php');

      objIK.setStyle(function(feature){
      return({
            fillColor: 'green',
            strokeColor: 'green',
            strokeWeight: 3,
            fillOpacity: 0.0
          });
      });
      objIK.setMap(map); 

      ja = new google.maps.Data();
      ja.loadGeoJson('tampilkanrute.php?id_angkot=$id_angkot');
      ja.setStyle(function(feature){
      return({
          fillColor: 'yellow',
          strokeColor: '$warna',
          strokeWeight: 3,
          fillOpacity: 0.5
          });          
      });
      ja.setMap(map);  
}
function calcRoute(){
var awal = new google.maps.LatLng(<?php echo"$latAsal , $lngAsal"; ?>);
var akhir = new google.maps.LatLng(<?php echo"$latTujuan , $lngTujuan"; ?>);
var request = {origin:awal,destination:akhir,travelMode: google.maps.TravelMode.DRIVING};
directionsService.route(request, function(response, status) {if (status == google.maps.DirectionsStatus.OK) {directionsDisplay.setDirections(response);
directionsDisplay.setPanel(document.getElementById('infodirection'));
}});
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body onload='calcRoute()'>
<div id='map-canvas'>
</div>
<span id='infodirection' />
</body>
</html>