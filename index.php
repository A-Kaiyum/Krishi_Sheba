<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }
include("dbconnection/DBconnection.php");
include("model/doctor.php");
include("model/farmer.php");
include ("model/record.php");

$getdoctor = new doctors();
$getdoctor = $getdoctor->getdoctors();
$getfarmer = new farmers();
$getfarmers = $getfarmer->getfarmers();
$gettotalland = $getfarmer->gettotalland();

$recordData = new records();
$TableData = $recordData->getData();


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Krishi Seba</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
             <?php include("includes/topbar.php"); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include("includes/sidebar.php"); ?>

            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Dashboard</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Krishi Seba</a></li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-lg-4">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Registerd Doctors</h4>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class=""><b>

                                 <!--count data must be an array or object -->

                                        <?= count($getdoctor);?>

                                    </b></h3>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-lg-4">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Registerd Farmers</h4>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class=""><b>
                                            
                                            <?= count($getfarmers);?>
                                                
                                            </b></h3>
                                        
                                    </div>
                                </div>
                            </div>

                    

                            <div class="col-sm-4 col-lg-4">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Total Area</h4>
                                    </div>
                                    <div class="panel-body">
                                    <h3>  

                                        <?= $gettotalland?> acar

                                      </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>

                            <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Record Board</h3>
                                </div>

                            <div class="panel-body" >
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>

                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Farmer Name</th>
                                                        <th>Farmer Address</th>
                                                        <th>Farmar_ID</th>
                                                        <th>Total Crops</th>
                                                        <th>Total Cattles</th>
                                                        <th>Total Fishari</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php $i=1; foreach($TableData as $key=>$Data): ?>
                                                        <tr>
                                                          <td><?php echo $i; ?></td>
                                                          <td><?php echo $Data['name']; ?></td>
                                                          <td><?php echo $Data['address']; ?></td>
                                                            <td><?php echo $Data['farmer_id']; ?></td>
                                                            <td><?php echo $Data['crops']; ?></td>
                                                            <td><?php echo $Data['cattles']; ?></td>
                                                            <td><?php echo $Data['fishari']; ?></td>
                                                          </tr>
                                                      <?php $i++; endforeach; ?>
                                                  </tbody>
                                              </table>

                                          </div>
                                      </div>
                                  </div>
                        </div>

                        
                        </div>


                      

                        </div> <!-- End Row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                   <?php include("includes/footer.php"); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

        <script src="assets/pages/dashborad.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>