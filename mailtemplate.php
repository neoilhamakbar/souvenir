<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<style>
		#container{
			width: 800px;
			margin: 0 auto;
			height: 100px;
		}
		#header{
			background-color: grey;
			color: white;
			text-align: center
		}
		#badan{
			font-family: arial;
		}
		#kaki{
			margin-top:10px;
			background-color: grey;
			color: white;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h2>BUKITTINGGI TOURISM'S CUSTOMER EMAIL VERIFICATION</h2>
		</div>
		<div id="body">
			<p>Click the link below to verify your account</p>
			<a href="http://localhost/kuliner_bkt/kuliner_bkt/admin/pages/verifikasi.php?token=<?php echo $_GET['token']?>&user=<?php echo $_GET['user']?>">Click on this link to confirm your e-mail</a>
		</div>
		<div id="footer">
			<h3>end of discusion</h3>
		</div>
	</div>
</body>
</html>