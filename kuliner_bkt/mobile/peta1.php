<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh7Xfdh42Ro9CNFPkvoZhFVhEpTeOP16g"></script>
<script src="../assets/js/GeoJSON.js"></script>
<script src='http://code.jquery.com/jquery-1.11.0.min.js' type='text/javascript'>
</script> 
<script src="../script.js"></script>
<? 
$lat = $_GET['lat']; $lng = $_GET['lng']; $warna=$_GET['warna'];$id_angkot=$_GET['id_angkot']; $latTujuan=$_GET['latTujuan'];
  $lngTujuan=$_GET['lngTujuan'];
  $bool=false;
if(isset($_GET['latsimpang'])){
  $latsimpang=$_GET['latsimpang'];
  $lngsimpang=$_GET['lngsimpang'];
  $bool=true;
}else{
  $latsimpang='0';
  $lngsimpang='0';
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
  // ik.setMap(map);

  // ik = new google.maps.Data();
  // ik.loadGeoJson('industrikecill.php');
  // ik.setStyle(function(feature)
  // {
  //   return({
  //           fillColor: '#edc236',
  //           strokeColor: '#331428 ',
  //           strokeWeight: 2,
  //           fillOpacity: 0.5
  //         });          
  // }
  // );
  // ik.setMap(map);

  // souvv = new google.maps.Data();
  // souvv.loadGeoJson('souvenir.php');
  // souvv.setStyle(function(feature)
  // {
  //   return({
  //           fillColor: '#40ef83',
  //           strokeColor: '#040677 ',
  //           strokeWeight: 2,
  //           fillOpacity: 0.5
  //         });          
  // }
  // );
  // souvv.setMap(map);

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
}
</script>

</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>