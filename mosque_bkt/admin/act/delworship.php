<?php
include ('../../../connect.php');
$id = $_GET['id'];
  
  $sql   = "delete from worship_place where id='$id'";

  
  $delete = pg_query($sql);
  if ($delete){
      echo "<script>
    alert (' Data Successfully Delete');
    eval(\"parent.location='../?page=homeadmin'\");
    </script>";
  }
  else{
    echo 'error';

  }

?>


// <?php
// include ('../../../connect.php');

// if(isset($_GET['id']))
//   {
//   $id=$_GET["id"];

//   $sql=pg_query("DELETE from detail_worship_place where id_worship_place='$id'");
//   $sql3=pg_query("DELETE from detail_event where id_event='$id'");
//   $sql4=pg_query("DELETE from worship_place_gallery where id='$id'");
//   $sql5=pg_query("DELETE from category_worship_place where id='$id'");
//   $sql6=pg_query("DELETE from detail_facility where id_facility='$id'");
//   //$sql1=pg_query("DELETE from detail_culinary_place where id_culinary_place='$id_culinary_place'");
//   $sql2=("DELETE from worship_place where id='$id'");

//   if(pg_query($sql2)){
//       	echo "<script>
// 		alert (' Data Successfully Delete');
// 		eval(\"parent.location='../?page=homeadmin'\");
// 		</script>";
//     }else
//     {
//       echo"<script>alert ('Data Gagal Dihapus');</script>";
//     }
//   }

//       ?>