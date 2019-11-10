<?php
include '../connect.php';
$id = $_GET['id'];
$querysearch	="SELECT small_industry.id, small_industry.name, small_industry.address, small_industry.owner, ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) 
            As lat FROM small_industry";
			   
$hasil=mysqli_query($conn, $querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		$id=$baris['id'];
        $name=$baris['name'];
        $address=$baris['address'];
        $owner=$baris['owner'];
        
        $longitude=$baris['lng'];
		$latitude=$baris['lat'];
        $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, 'lng'=>$longitude,'lat'=>$latitude);
    }
echo json_encode ($dataarray);
?>

