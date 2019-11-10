<?php
    include("../connect.php");
$cari = $_GET["cari"];
$id = $_GET["id"];
        $querysearch= "SELECT distinct a.name as worship_place_name,a.id,a.address,a.capacity,b.name as category_name,st_x(st_centroid(a.geom)) as lon,st_y(st_centroid(a.geom)) as lat 
							from worship_place as a left join category_worship_place as b on a.id_category=b.id, 
							district where st_contains(district.geom, a.geom) and district.id='$id' and b.id='$cari' order by a.name ASC";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $worship_place_name=$row['worship_place_name'];
		  $address=$row['address'];
		  $capacity=$row['capacity'];
		  $category_name=$row['category_name'];
		  $longitude=$row['lon'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'worship_place_name'=>$worship_place_name,'address'=>$address,'capacity'=>$capacity,'category_name'=>$category_name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
            echo json_encode ($dataarray);
?>