<?php 
include ('../../connect.php');
session_start();
$id = $_GET["id"];
$id_hotel = $_SESSION['id'];
$username = $_SESSION['username'];

?>
<div class="col-lg-12 main-chart" > 
  <div class="col-sm-12">
    <section class="panel">                   

    <div class="panel-body">
    <table class="table">
    <thead><th><h3><b>Owned Culinary List</b></h3></th><th><h3><b>Action</b></h3></th></thead>
    <tbody  style='vertical-align:top;'>
    
    <?php 
    $query ="SELECT culinary_place.id, culinary_place.name, culinary_place.address, culinary_place.cp, culinary_place.open, culinary_place.close, culinary_place.capacity, culinary_place.employee, ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat FROM culinary_place join admin on admin.username = culinary_place.username where culinary_place.username='$username'";
    
    $hasil=pg_query($query);
    while($data = pg_fetch_array($hasil)){
      $id = $data['id'];
      $nama = $data['name'];                    
    ?>
    
    <tr><td><h4><?php echo $nama ?></h4></td><td><a href="?page=detailculinary&id=<?php echo $id ?>"><i class="fa fa-eye" style="color: black;"></i></a></td></tr>
    <?php } ?>                          
    
    </tbody>          
    </table>
    
    </div>
    </section>
            
    </div>

             
                  
                </div>
                
              </div>
          
            </div>
          </div>