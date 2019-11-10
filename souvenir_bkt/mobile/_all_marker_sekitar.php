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
$lat = -0.305441; 
$lng = 100.3692; 

$hotel = $_GET["hotel"];
$tourism = $_GET["tourism"];
$worship = $_GET["worship"];
$souvenir = $_GET["souvenir"];
$culinary = $_GET["culinary"];
$industry = $_GET["industry"];
$restaurant = $_GET["restaurant"];

$id = $_GET["id"];    // Isi yang dicari
$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];
$rad = $_GET["rad"];

?> 
<script src="ip.js"></script>
<script type='text/javascript'> 
var map;
var ip_mobile=server;
var markersDua = [];
//var ip="http://10.44.7.106/kuliner_bkt/";

  function init(){
    //console.log("init jalan");
    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      map = new google.maps.Map(document.getElementById('map'), myOptions);     

    ja = new google.maps.Data();
    ja.loadGeoJson(ip_mobile+"kuliner.php?id=<?php echo $id; ?>");
    ja.setStyle(function(feature){
    return({
        fillColor: 'yellow',
        strokeColor: 'red',
        strokeWeight: 3,
        fillOpacity: 0.5
        });          
    });
    ja.setMap(map);  

    if (<?php echo $hotel ?> == 1) {
        //var url = ip+"_angkot_hotel.php?id_angkot=<?php echo $id_angkot ?>";
        var url ="_sekitar_hotel.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/marker_hotel.png',
                  animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);

              }//end for               
          }});//end ajax 
      }      

    if (<?php echo $tourism ?> == 1) {
        var url ="_sekitar_tw.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/marker_tw.png'
                }); 
                 markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $worship ?> == 1) {
        var url ="_sekitar_masjid.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/marker_masjid.png'
                }); 
                 markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $souvenir ?> == 1) {
        var url ="_sekitar_oleholeh.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/marker_oo.png'
                }); 
                 markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $culinary ?> == 1) {
        var url ="_sekitar_kuliner.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/marker_kuliner.png'
                }); 
                 markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $industry ?> == 1) {
        var url ="_sekitar_industri.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/marker_industri.png'
                }); 
                 markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $restaurant ?> == 1) {
        var url ="_sekitar_restaurant.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
        console.log(url);
          $.ajax({url: url, data: "", dataType: 'json', success: function(rows){ 
              for (var i in rows){ 
                var row = rows[i];
                var lat = row.latitude;
                var lng = row.longitude;
                
                console.log(lat);
                var pos = new google.maps.LatLng(lat, lng); 
                var marker = new google.maps.Marker({ 
                  position:pos,
                  map: map,
                  title: '', 
                  clickable:false, 
                  icon:'../icon/restaurants.png'
                }); 
                 markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 


    }

  
</script>
</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>

