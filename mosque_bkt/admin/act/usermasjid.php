<?php
    include ('../../../connect.php');
    $result=  pg_query("select * from worship_place where username='A' ");
        while($baris = pg_fetch_array($result))
            {
                $id=$baris['id'];
                $nama=$baris['name'];
                $dataarray[]=array('id'=>$id,'name'=>$nama);
            }
            echo json_encode ($dataarray);
?>