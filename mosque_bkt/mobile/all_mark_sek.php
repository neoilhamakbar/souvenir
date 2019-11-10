<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh7Xfdh42Ro9CNFPkvoZhFVhEpTeOP16g"></script>
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

$latitude = $_GET["latitude"];    // Isi yang dicari
$longitude = $_GET["longitude"];  
$rad = $_GET["rad"];  

?> 
<script src="ip.js"></script>
<script type='text/javascript'> 
var map;
var ip_mobile=server;
//var ip="http://10.44.7.31/t2-eng/";
var markersDua = [];

  function init(){
    console.log("init jalan");
    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      map = new google.maps.Map(document.getElementById('map'), myOptions);     
 
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

    if (<?php echo $hotel ?> == 1) {
      console.log("huuuuu");
      var url = "carihotel.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/marker_hotel.png',
                  animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
              map.setZoom(12);

              }//end for               
          }});//end ajax 
      }      

    if (<?php echo $tourism ?> == 1) {
        var url = "cariow.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/marker_tw.png',
                  animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12); 

              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $worship ?> == 1) {
        var url = "cariworship.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/marker_masjid.png',
                animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
                map.setZoom(12);

              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $souvenir ?> == 1) {
        var url ="carioleholeh.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/shopping.png',
                animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
              map.setZoom(12);

              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $culinary ?> == 1) {
        var url ="carikuline.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/food.png',
                  animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
              map.setZoom(12); 

              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $industry ?> == 1) {
        var url ="cariindustri.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/industries.png',

              animation: google.maps.Animation.DROP,
                }); 
                markersDua.push(marker);
                map.setCenter(pos);
              map.setZoom(12);
              }//end for               
          }});//end ajax 
      } 

    if (<?php echo $restaurant ?> == 1) {
        var url ="carirestaurant.php?latitude=<?php echo $latitude ?>&longitude=<?php echo $longitude ?>&rad=<?php echo $rad ?>";
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
                  icon:'../assets/ico/restaurants.png',
                animation: google.maps.Animation.DROP,
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

