<?php 

session_start();
if(isset($_SESSION['A'])){
	echo"<script language='JavaScript'>document.location='index.php'</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="act/session.php" method="post">
		        <h2 class="form-login-heading">LOG IN NOW</h2>
		        <div class="login-wrap" >
		        <!--   <form > -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" autofocus required/>
        <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required/>
        <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- <div class="col-xs-4"> --> 
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Log In</button>
        </div>

        <br>
        <div class="registration">
                    Don't have an account yet?<br/>
                    <a class="" href="pages/register.php">
                        Create an account
                    </a>
                </div>
        <hr>
        <a href="../" class="btn btn-primary btn-block btn-flat" >Back</a>
      </div>
  <!--   </form> -->
		       		<!-- <label>Username</label>
		       		<br>
		            <input type="text" class="form-control" placeholder="Username" autofocus>
		            <br><br>
		            <label>Password</label>
		            <br>
		            <input type="password" class="form-control" placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <br><br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> LOGIN</button> -->
		           <!--  <hr> -->
		             </form>
		            <!-- <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div> -->
		       <!--      <div class="registration">
		                Don't have an account yet?<br/>
		                <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Create An Account Here!</a>
		
		                </span>
		            </label>
		            
				</div> -->
		        <!-- </div> -->
		
		          <!-- Modal -->
		         <!--  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Create An Account</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Please Fill The Form Correctly!</p>
		                         	<label>Name</label>
		                         	<br>
						            <input type="text" class="form-control" placeholder="Name" autofocus>
						            <br>
						            <label>Username</label>
						            <br>
						            <input type="text" class="form-control" placeholder="Username">
						            <br>
						            <label>Password</label>
						            <br>
						            <input type="password" class="form-control" placeholder="Password">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div> -->
		          <!-- modal -->
		
		     	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/coba1.jpg", {speed: 500});
    </script>


  </body>
</html>
