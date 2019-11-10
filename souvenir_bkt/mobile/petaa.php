<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true'>
</script>
<script src='http://code.jquery.com/jquery-1.11.0.min.js' type='text/javascript'>
</script> 
<? 
$lat = $_GET['lat']; $lng = $_GET['lng'];$route_color=$_GET['route_color'];$id_angkot=$_GET['id_angkot']; $latTujuan=$_GET['latTujuan'];
  $lngTujuan=$_GET['lngTujuan'];
$bool=false;
if(isset($_GET['lathenti'])){
  $lathenti=$_GET['lathenti'];
  $lnghenti=$_GET['lnghenti'];
  $bool=true;
}else{
  $lathenti='0';
  $lnghenti='0';
}


?> 
<script type='text/javascript'> 

 function init(){

    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      var map = new google.maps.Map(document.getElementById('map'), myOptions);   
      
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

       
    
  var marker0 = new google.maps.Marker({ position: latlng,map: map,title: '', clickable:false, icon:''}); 
  objIK.addListener('click', function(event){
  infowindow.setContent(event.feature.getProperty('nama'));
  infowindow.setPosition(event.latLng);
  infowindow.open(map);
  });

  ik = new google.maps.Data();
  ik.loadGeoJson('bataskecamatan.php');
  ik.setStyle(function(feature)
  {
    return({
            strokeColor: '#385aaf',
            strokeWeight: 4,
            fillOpacity: 0.0,
            clickable : false
          });          
  }
  );
  ik.setMap(map);


  cull = new google.maps.Data();
  cull.loadGeoJson('kuliner.php');
  cull.setStyle(function(feature)
  {
    return({
            fillColor: '#f75d5d',
            strokeColor: '#065b38 ',
            strokeWeight: 2,
            fillOpacity: 0.5
          });          
  }
  );
  cull.setMap(map);

    angkot = new google.maps.Data();
      angkot.loadGeoJson('tampilkanrute.php?id_angkot=$id_angkot');
      angkot.setStyle(function(feature){
      return({
          fillColor: 'yellow',
          strokeColor: '$route_color',
          strokeWeight: 3,
          fillOpacity: 0.5
          });          
      });
      angkot.setMap(map); 
}
</script>
</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>

