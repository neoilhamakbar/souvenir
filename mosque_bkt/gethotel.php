<?php 
require '../connect.php';
$idik = $_GET["idik"];
$querysearch ="SELECT h.id_hotel, nama_hotel, h.alamat, st_x(st_centroid(h.geom)) as longitude, 
st_y(st_centroid(h.geom)) as latitude, ik.id_industri, ST_Distance_Sphere(h.geom, ik.geom)/1000 as jarak_dari_ik from hotel h, industri_kecil ik where ik.id_industri='".$idik."' and ((ST_Distance_Sphere(h.geom, ik.geom)/1000>=0.5) and (ST_Distance_Sphere(h.geom, ik.geom)/1000<=1)) ";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_hotel=$row['id_hotel'];
          $nama=$row['nama_hotel'];
          $alamat=$row['alamat'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];      
          $dataarray[]=array('id_hotel'=>$id_hotel,'nama_hotel'=>$nama,'alamat'=>$alamat,'longitude'=>$longitude,'latitude'=>$latitude,'jarak'=>$row['jarak_dari_ik']);
    }
echo json_encode ($dataarray);
?>
