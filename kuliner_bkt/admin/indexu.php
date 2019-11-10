<?php 
session_start(); 
if(!isset($_SESSION['P'])){ 
  echo"<script language='JavaScript'>document.location='login.php'</script>"; 
  exit(); 
} 
include("../../connect.php");


$username = $_SESSION['username']; 
$sql_rm = "select * from culinary_place where username='$username'";
$query_rm = pg_query($sql_rm);
$data_rm = pg_fetch_assoc($query_rm);
$id = $data_rm['id'];
// die();
?> 


<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <title>Culinary Owner's ADMIN</title> 
 
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true&libraries=drawing&callback=initialize"  async defer></script> --> 
    <!-- <script src="mapedit.js" type="text/javascript"></script> --> 
    <link href="../assets/css/bootstrap.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css"> 
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" /> 
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">     
    <link href="../assets/css/style.css" rel="stylesheet"> 
    <link href="../assets/css/style-responsive.css" rel="stylesheet"> 
  <!-- <script src="inc/script.js" type="text/javascript"></script> --> 
  <!-- <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> --> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM2fDXHmGzCDmDBk3bdPIEjs6zwnI1kGQ&libraries=drawing"></script> 
    <script src="../assets/js/chart-master/Chart.js"></script> 
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" /> 
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" /> 
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" /> 
    <!-- <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/compiled/timepicker.css" /> 
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/datertimepicker.html" /> --> 
     
  </head> 
 
   <body> 
 
  <section id="container" > 
      <header class="header black-bg"> 
      <?PHP include("inc/headeru.php"); ?> 
      </header> 
 
    <aside> 
    <div id="sidebar"  class="nav-collapse " > 
              <!-- sidebar menu start--> 
            <ul class="sidebar-menu" id="nav-accordion"> 
 
            <?PHP include("inc/sidebaru.php"); ?> 
             </ul> 
              <!-- sidebar menu end--> 
          </div> 
      </aside> 
 
 
        <section id="main-content"> 
          <section class="wrapper"> 
          <section class="panel"> 
                    <div class="col-lg-15 ds" id="hide2"> 
          <h4 class="btn btn-compose">MANAGE THE DATA</h4> 
               </div> 
                
        <!-- Main content --> 
        <section class="content">   
      <?php 
      $p=$_GET['page']; 
      $page="pages/".$p.".php"; 
      if(file_exists($page)){ 
        include($page); 
      }elseif($p==""){ 
        include('pages/homeu.php'); 
      }else{ 
        include('pages/404.php'); 
      } 
      ?> 
        </section><!-- /.content --> 
      </div><!-- /.content-wrapper --> 
 
 
 
      </section> 
 
       <!-- <footer class="site-footer"> 
          <div class="text-center"> 
              Fitriany Chairunnisa - 1311521018 
              <a href="index.html#" class="go-top"> 
                  <i class="fa fa-angle-up"></i> 
              </a> 
          </div> 
      </footer> --> 
      <!--footer end--> 
  </section> 
 
    <script src="../assets/js/jquery.js"></script> 
    <script src="../assets/js/jquery-1.8.3.min.js"></script> 
    <script src="../assets/js/bootstrap.min.js"></script> 
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script> 
    <script src="../assets/js/jquery.scrollTo.min.js"></script> 
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script> 
    <script src="../assets/js/jquery.sparkline.js"></script> 
   <!-- <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script> 
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> --> 
 
    <!--common script for all pages--> 
    <script src="../assets/js/common-scripts.js"></script> 
     
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script> 
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script> 
  <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script> 
   
  <script type="text/javascript" src="../assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>   
  <script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
  <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script> 
  <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script> 
   
  <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
  <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script> 
  <script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
    <script src="plugins/datatables/dataTables.min.css" type="text/javascript"></script> 
    <script src="plugins/datatables/dataTables.min.js" type="text/javascript"></script> 
  <script src="../assets/js/advanced-form-components.js"></script>     
 <script> 
            $(document).ready(function () { 
 
                "use strict"; // Start of use strict 
 
                $('#dataTableExample1').DataTable({ 
                    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>", 
                    "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]], 
                    "iDisplayLength": 6 
                }); 
 
                $("#dataTableExample2").DataTable({ 
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp", 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 
                    buttons: [ 
                        {extend: 'copy', className: 'btn-sm'}, 
                        // {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'}, 
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'}, 
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}, 
                        // {extend: 'print', className: 'btn-sm'} 
                    ] 
                }); 
 
            }); 
        </script> 
 
      </body> 
      </html> 
