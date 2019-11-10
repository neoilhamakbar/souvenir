<?php
require '../connect.php';
$tipe_sou = $_GET['tipe_sou'];
$querysearch  ="SELECT souvenir.id, souvenir.name as nama,souvenir.address, souvenir.geom, souvenir.id_souvenir_type,souvenir_type.name, st_x(st_centroid(souvenir.geom)) as longitude, st_y(st_centroid(souvenir.geom)) as latitude from souvenir join souvenir_type on souvenir.id_souvenir_type=souvenir_type.id where souvenir.id_souvenir_type= '$tipe_sou'"; 

$hasil=mysqli_query($conn, $querysearch);
while($baris = mysqli_fetch_array($hasil))
  {
    $id=$baris['id'];
        $nama=$baris['nama'];
        $address=$baris['address'];
        $owner=$baris['owner'];
        $id_souvenir_type=$baris['id_souvenir_type'];
        $longitude=$baris['longitude'];
    $latitude=$baris['latitude'];
        $dataarray[]=array('id'=>$id,'id_souvenir_type'=>$id_souvenir_type,'nama'=>$nama,'address'=>$address, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);

?>