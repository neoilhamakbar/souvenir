<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'>
</script>
<script src='http://code.jquery.com/jquery-1.11.0.min.js' type='text/javascript'>
</script> 
<? 
$lat = $_GET['lat'];$lng = $_GET['lng'];$warna=$_GET['warna'];$id_angkot=$_GET['id_angkot'];$latsimpang=$_GET['latsimpang'];$lngsimpang=$_GET['lngsimpang'];
 

echo"
<script type='text/javascript'> 

 function init(){
    
    var latlng = new google.maps.LatLng($lat, $lng); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      var map = new google.maps.Map(document.getElementById('map'), myOptions);   
      directionsDisplay.setMap(map);
      var objIK = new google.maps.Data();
      objIK.loadGeoJson('industrikecil.php');

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
  calsimpang();    
 
}
  function calsimpang(){
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer({ draggable: false, polylineOptions: { strokeColor: 'black' } }); 
  console.log($lat+' - '+$lng);
  console.log($latsimpang+' - '+$lngsimpang);
  var awal = new google.maps.LatLng($lat , $lng);
  var akhir = new google.maps.LatLng($latsimpang , $lngsimpang);
  var request = {origin:awal,destination:akhir,travelMode: google.maps.TravelMode.DRIVING};
  console.log('done');
  directionsService.route(request, function(response, status) {if (status == google.maps.DirectionsStatus.OK) {directionsDisplay.setDirections(response);
  console.log('done2');
  }});
  } 

</script>"; 
?> 



</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>
