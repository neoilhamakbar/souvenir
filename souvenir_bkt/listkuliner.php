<?php
include ('../connect.php');
$dataarray=array();
 
$sql=mysqli_query($conn, "SELECT id_kuliner, nama_kuliner from kuliner Order by nama_kuliner asc");
			
while($row = mysqli_fetch_array($sql))
	{
		  $id_kuliner=$row['id_kuliner'];
		  $nama_kuliner=$row['nama_kuliner'];
		  $dataarray[]=array('id_kuliner'=>$id_kuliner,'nama_kuliner'=>$nama_kuliner);
	}
echo json_encode ($dataarray);
   			  
?>