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
$cari_nama = $_GET['cari_nama'];
$lat = -0.305441; 
$lng = 100.3692; 
//$nilai = $_GET["nilai"];    // Isi yang dicari

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
    
  //var marker0 = new google.maps.Marker({ position: latlng,map: map,title: '', clickable:false, icon:''}); 
  /*objIK.addListener('click', function(event){
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
  ik.setMap(map);*/


  cull = new google.maps.Data();
  cull.loadGeoJson('souvenir.php');
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


    var nilai = "<?php echo $cari_nama; ?>";
    var url = server+'find_sou.php?cari_nama='+nilai;
    console.log(url);
      $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
          for (var i in rows){ 
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var address = row.address;
            var cost = row.cost;
            var latitude = row.latitude;
            var longitude = row.longitude;

            centerBaru = new google.maps.LatLng(latitude, longitude);
          marker = new google.maps.Marker
          ({
            position: centerBaru,
            map: map,
            icon: "http://192.168.100.9/souvenir_bkt/assets/img/souv.png",
          });
          markersDua.push(marker);
          map.setCenter(centerBaru);
          }//end for               
      }});//end ajax 
         

  }
  
</script>
</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>

