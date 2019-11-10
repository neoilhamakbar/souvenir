<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true">
</script>
<script src='http://code.jquery.com/jquery-1.11.0.min.js' type='text/javascript'>
</script> 
<? 
$rad = $_GET["rad"];    // Isi yang dicari
$lat = $_GET["lat"];    // Isi yang dicari
$lng = $_GET["lng"];    // Isi yang dicari

?> 
<script src="ip.js"></script>
<script type='text/javascript'> 
var map;
var markersDua = [];
var centerBaru;

  function init(){
    console.log("init jalan");

    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      map = new google.maps.Map(document.getElementById('map'), myOptions);   

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

    var lat = "<?php echo $lat; ?>";
	var lng = "<?php echo $lng; ?>";
	var rad = "<?php echo $rad; ?>";
    var url = server+'masjid_radius.php?lat='+lat+'&lng='+lng+'&rad='+rad;
    console.log(url);
      $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
          for (var i in rows){ 
            var row = rows[i];
            var id = row.id;
            var latitude = row.latitude;
            var longitude = row.longitude;
			
			centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'../assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
               markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(12);
          }//end for               
      }});//end ajax 
     
  }

  
</script>
</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>

