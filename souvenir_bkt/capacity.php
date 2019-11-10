<?php
require '../connect.php';

$kapasitas=$_GET['kapasitas'];

	if($kapasitas==1){
		$querysearch	="SELECT id, capacity, name,st_x(st_centroid(geom)) as longitude, st_y(st_centroid(geom)) as 					  latitude from culinary_place where capacity < '50' ";	
		
	} else if($kapasitas ==2){
		$querysearch	=" SELECT id, capacity, name,st_x(st_centroid(geom)) as longitude, st_y(st_centroid(geom)) as 			 		   latitude from culinary_place where capacity >= '50' and capacity <= '100' ";	
				
	} else {
		$querysearch	=" SELECT id, capacity, name,st_x(st_centroid(geom)) as longitude, st_y(st_centroid(geom)) as 					   latitude from culinary_place where capacity > '100'  ";			
		
	}
	 
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id				=$row['id'];
		  $name				=$row['name'];
		  $capacity			=$row['capacity'];
		  $longitude		=$row['longitude'];
		  $latitude			=$row['latitude'];
		  
		$dataarray[]=array('id'=>$id,'name'=>$name,'capacity'=>$capacity, 'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
