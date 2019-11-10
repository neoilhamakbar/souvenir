<?php
$a1 = $_GET['a1'];
$a2 = $_GET['a2'];
$b1 = $_GET['b1'];
$b2 = $_GET['b2'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' />
<style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map_canvas { height: 100%; width: 100% }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh7Xfdh42Ro9CNFPkvoZhFVhEpTeOP16g"></script>
<script src="ip.js"></script>
<script type="text/javascript">
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	var map;
	function initialize()
	{
		directionsDisplay= new google.maps.DirectionsRenderer();
		var pos= new google.maps.LatLng(<?php echo $a1;?>,<?php echo $a2;?>);
		var mapOptions = {zoom:8,center:pos}
		map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
		directionsDisplay.setMap(map);
    	var tpk = new google.maps.Data();
      	tpk.loadGeoJson(server+'spuvenir.php');
    	tpk.setStyle(function(feature){
    	return({
          fillColor: '#00923F',
          strokeColor: 'blue',
          strokeWeight: 3,
          fillOpacity: 0.5
        });
   		});
    	tpk.setMap(map);
    	var kec = new google.maps.Data();
      	kec.loadGeoJson(server+'bataskecamatan.php');
   		 kec.setStyle(function(feature){
    	return({
          fillColor: 'B2E0FF',
          strokeColor: 'black',
          strokeWeight: 3,
          fillOpacity: 0.5
        });
    	});
    	kec.setMap(map);
     tpk.addListener('click', function(event){
	  infowindow.setContent(event.feature.getProperty('name'));
	  infowindow.setPosition(event.latLng);
	  infowindow.open(map);
	  });
	}

	function calcRoute()
	{
		var start = new google.maps.LatLng(<?php echo $a1;?>,<?php echo $a2;?>);
		var end = new google.maps.LatLng(<?php echo $b1;?>,<?php echo $b2;?>);
		var request = {origin:start,destination:end,travelMode:google.maps.TravelMode.DRIVING};
		directionsService.route(request, function(response,status)
		{
			if (status==google.maps.DirectionsStatus.OK)
			{
				directionsDisplay.setDirections(response);
			}
		});
	    directionsDisplay.setPanel(document.getElementById('detailrute'));
	}
</script>
</head>
<body onload="initialize(),calcRoute()">
	<div id="map_canvas"></div>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			<h4>Info Rute</h4>
		</div>
	<div class='panel-body'>
		<div id="detailrute">
		</div>
	</div>
	</div>
</body>
</html>