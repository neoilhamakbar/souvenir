<?php 
include ('../../../connect.php');

		$sql = "select(select count(*) from worship_place where id_category=1) as masjid,
		(select count(*) from worship_place where id_category=2) as mushalla
				";
				$query = pg_query($sql);
		
		if(pg_num_rows($query)>0){
			$data = pg_fetch_assoc($query);
			return $data;
		}
		
 

  

	



 ?>


	
	