
<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }

include("dbconnection/DBconnection.php");
include("model/record.php");
$record = new records();
$getrecord = $record->getrecordById($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Record::Update</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, record-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                    <h4 class="pull-left page-title">Record</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Krishi Seba</a></li>
                                        <li><a href="#">Update</a></li>
                                        <li class="active">Record Entry</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Record Update</h3></div>
                                    <div class="panel-body">
                    <form class="form-horizontal" action="controller/recordController.php" role="form" method="post">
                                            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Farmer_ID</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="farmer_id" value="<?php echo $getrecord['farmer_id']; ?>" required>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Crops</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="crops" value="<?php echo $getrecord['crops'];?>">
                                                </div>
                                           

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Cattles</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="cattles" value="<?php echo $getrecord['cattles'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Fishari</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="fishari" value="<?php echo $getrecord['fishari'];?>">
                                                </div>
                                            </div>

                                  <input type="hidden" name="action" value="update_record">
                                  <input type="hidden" name="id" value="<?php echo $getrecord['id']; ?>">
                                      <div class="form-group m-b-0">
                                                <div class="col-sm-offset-2 col-sm-9">
                                                  <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->


                        


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

        <script src="assets/js/app.js"></script>

    </body>
    <?php unset($_SESSION['message']); ?>
</html>