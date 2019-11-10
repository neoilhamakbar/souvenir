<?php
require '../connect.php';
$info = $_GET["info"];

$querysearch ="select id, name, address, owner,cp,ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat,id_status,id_industry_type from small_industry where id='$info'";	   
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $owner=$row['owner'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  
		  $stat=$row['id_status'];
		  $status = '';
		  if($stat == 'a'){
		  	$status = 'Sales';
		  } else if($status == 'b'){
		  	$status = 'Manufactures';
		  } else if($status == 'c'){
		  	$status = 'Sales & Manufactures';
		  }

  		  $Ty=$row['id_industry_type'];
		  $Type = '';
		  if($Ty == 'a'){
		  	$Type = 'Various Sulaman';
		  } else if($Ty == 'b'){
		  	$Type = 'Various Bordiran';
		  } else if($Ty == 'c'){
		  	$Type = 'Sulaman & Bordiran';
		  } else if($Ty == 'd'){
		  	$Type = 'Tenunan';
		  }

		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'owner'=>$owner,'cp'=>$cp,'longitude'=>$longitude,'latitude'=>$latitude,'status'=>$status,'type'=>$Type);
	}
echo json_encode ($dataarray);
?>
