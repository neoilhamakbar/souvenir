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
    <thead><th><h3><b>Owned Souvenir List</b></h3></th><th><h3><b>Action</b></h3></th></thead>
    <tbody  style='vertical-align:top;'>
    
    <?php 
    $query1 = "SELECT souvenir.id,souvenir.name,souvenir.address,souvenir.cp,souvenir.employee,souvenir.owner, status.status, souvenir_type.name AS tipe,ST_X(ST_Centroid(souvenir.geom)) AS lng, ST_Y(ST_CENTROID(souvenir.geom)) As lat FROM souvenir join status on souvenir.id_status=status.id join souvenir_type on souvenir.id_souvenir_type=souvenir_type.id  where souvenir.username='$username' ";
    
    $hasil1=pg_query($query1);
    while($data1 = pg_fetch_array($hasil1)){
      $id = $data1['id'];
      $nama = $data1['name'];                    
    ?>
    
    <tr><td><h4><?php echo $nama ?></h4></td><td><a href="?page=detailsouvenir&id=<?php echo $id ?>"><i class="fa fa-eye" style="color: black;"></i></a></td></tr>
    <?php } ?> 

    <?php 
    $query2 = "SELECT small_industry.id,small_industry.name,small_industry.address,small_industry.cp,small_industry.employee,small_industry.owner, status.status, industry_type.name AS tipe,ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) As lat FROM small_industry join status on small_industry.id_status=status.id join industry_type on small_industry.id_industry_type=industry_type.id  where small_industry.username='$username' ";
    
    $hasil2=pg_query($query2);
    while($data2 = pg_fetch_array($hasil2)){
      $id = $data2['id'];
      $nama = $data2['name'];                    
    ?>
    
    <tr><td><h4><?php echo $nama ?></h4></td><td><a href="?page=detailcraft&id=<?php echo $id ?>"><i class="fa fa-eye" style="color: black;"></i></a></td></tr>
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