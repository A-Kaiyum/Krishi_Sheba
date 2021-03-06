<?php
session_start();
if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Record::Add</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
            <?php if($_SESSION['user_type']=='Admin'){ ?>
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Add Record</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Records</a></li>
                                        <li><a href="#">Add</a></li>
                                        <li class="active">Record Entry</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Records</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" action="controller/recordController.php" role="form" method="post">
                                            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Farmer Id</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="farmer_id" placeholder="Farmer ID" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-address">Crops</label>
                                                <div class="col-md-10">
                                                    <input type="number" id="example-address" name="crops" class="form-control" placeholder="Crops" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Cattels</label>
                                                <div class="col-md-10">
                                                    <input type="number" id="example-email" name="cattles" class="form-control" placeholder="Cattles" value="" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Fishari</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="fishari" placeholder="Fishari" value="">
                                                </div>
                                            </div>

                                            <input type="hidden" name="action" value="save_record">
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
          <?php }else{
            ?>
            <div class="content">Permission Denied!!!</div>
            <?php 
        } ?>
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