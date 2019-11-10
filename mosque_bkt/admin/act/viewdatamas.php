 <?php
 session_start();
require '../../../connect.php';
$username = $_SESSION['username'];
$id_worship_place = $_SESSION['id_worship_place'];
$query = "SELECT worship_place.id, worship_place.name as worship_place_name, worship_place.address, worship_place.image, worship_place.land_size, worship_place.building_size, worship_place.park_area_size, worship_place.capacity, worship_place.est, worship_place.last_renovation, worship_place.imam, worship_place.jamaah, worship_place.teenager, category_worship_place.name as category_name, admin.username as admin_name, ST_X(ST_Centroid(geom)) As lng, ST_Y(ST_Centroid(geom)) As lat FROM worship_place join category_worship_place on category_worship_place.id=worship_place.id_category join admin on admin.username=worship_place.username where worship_place.username='$username'";
$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
  $id=$row['id'];
  $worship_place_name=$row['worship_place_name'];
  $address=$row['address'];
  $land_size=$row['land_size'];
  $building_size=$row['building_size'];
  $park_area_size=$row['park_area_size'];
  $capacity=$row['capacity'];
  $est=$row['est'];
  $last_renovation=$row['last_renovation'];
  $imam=$row['imam'];
  $jamaah=$row['jamaah'];
  $teenager=$row['teenager'];
  $category_name=$row['category_name'];
  $admin_name=$row['admin_name'];
  $image=$row['image'];
  $lat=$row['lat'];
  $lng=$row['lng'];

  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
    if ($image=='null' || $image=='' || $image==null){
    $image='foto.jpg';
  }
}
  ?>