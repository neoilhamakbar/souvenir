<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "1412";
	$port = "5432";
	$dbname = "kuliner_bkt";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>