<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map_canvas { height: 100%; width: 100% }
</style>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'>
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
echo"
<script type='text/javascript'> 
 function init(){

    var latlng = new google.maps.LatLng($lat,$lng); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      var map = new google.maps.Map(document.getElementById('map'), myOptions); 
 	  
  
  kecamatan = new google.maps.Data();
    kecamatan.loadGeoJson('kecamatan.php');
    kecamatan.setStyle(function(feature)
    {
      var gid = feature.getProperty('id');
      if (gid == 1){ color = '#ff3300' 
        return({
      fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0,
          clickable: false
        }); 
    }
      else if(gid == 2){ color = '#ffd777' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0,
          clickable: false
        });
    }
      else if(gid == 3){ color = '#00b300' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0,
          clickable: false
        });

    }
       
    });
    kecamatan.setMap(map);

      mesjid = new google.maps.Data();    
    mesjid.loadGeoJson('masjid.php');

    mesjid.setStyle(function(feature){
        return({
            fillColor: '#68dff0',
                    strokeColor: '#68dff0',
                    strokeWeight: 1,
                    fillOpacity: 0.6
          });
      });
      mesjid.setMap(map);
	  
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

    var marker0 = new google.maps.Marker({ position: latlng,  icon:'../assets/ico/restaurants.png', map: map,title: '', animation: google.maps.Animation.DROP, clickable:false}); 
    mesjid.addListener('click', function(event){
    infowindow.setContent(event.feature.getProperty('name'));
    infowindow.setPosition(event.latLng);
    infowindow.open(map);
    });
}


</script>"; 
?> 

</head>
<body onload='init()'> 
<div id='map' style="width: 100%; height: 100%;"></div>
</body>
</html>