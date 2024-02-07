<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Admin Dashboard</title>
    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
</head>
<body id="page-top">
    <div id="wrapper">
   
        <div id="content-wrapper" class="d-flex flex-column bg-light">
        <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
            <div class="row"id="content">
                <!-- TopBar -->
               
                 <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- Sidebar -->
                                
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="col" id="container-wrapper">
                <!-- <div class="d-sm-flex align-items-center justify-content-between "
                                style="margin-left: 11px;">
                                <p style="font-size: 40px;color:#4A0063">Job Posting

                                </p>

                                <ol class="breadcrumb">
  
                                    <a href=""><i class="fa fa-home "
                                            style="  margin-left: 37px;margin-top: 28px; margin-right: -202px;color:#F18101;">/ Job Posting</i></a>
                                            <a href="jobdetails.php">   <button type="button" class="btn btn-secondary"  style=" padding-left: 30px; margin-top: 89px; margin-bottom: 28px;margin-right: 16px;  padding-right: 31px;background:#4A0063;">Create New Job Post 
                                       </button></a>

</div> -->
<div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6"style="font-size: 40px;color: #4A0063;">
                                Job Posting
                                </div>
                                <div class="col-md-6 div1"style="color:#F18101;">
                                <i class="fa fa-home"></i>/ Job Posting
                                <br>
                              <a href="jobdetails.php">  <button type="button" class="btn btn-secondary" 
                                        style=" background:#4A0063;    margin-bottom: -34px;"
                                    >Create New Job Post 
                                    </button></a>
                                     
                                </div>
                            </div>

 
                    <div class="row mb-3">
                        
                        <!-- Invoice Example -->
                        <div class="col-xl-12"style="margin-left: -6px;">
                            <div class="card">
                            <div
                                            class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold "style="color:#F6B264;">Job Posting List</h5>
                                        </div>
                               
                                <div class="card-body">
                                            <!-- <h5 class="m-0 font-weight-bold text-dark">Jobfair Application</h5> -->
                                            <button class="btn btn-dark" style="background:#4A0063;"type="submit">Copy</button>
                                            <input class="btn btn-dark"style="background:#4A0063;" type="button" value="Excel">
                                            <input class="btn btn-dark"style="background:#4A0063;" type="submit" value="CSV">
                                            <input class="btn btn-dark"style="background:#4A0063;" type="reset" value="PDF">
                                            <input class="btn btn-dark"style="background:#4A0063;" type="reset" value="Print">
                                            <br>
                                            <br>
                                            <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Show</span>

                                            <select class="form-group col-md-0" aria-label=".form-select-lg example"
                                                style="height:11%;">
                                                <option selected></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Entries</span>
                                            <form class="form-inline" style="float: right;margin-right: 66px;">

                                                <div class="form-group mb-2">
                                                    <h6 style="margin: auto;color: black;">Search:</h6>
                                                </div>
                                                <div class="form-group mx-sm-3 mb-2">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="text" class="form-control" id="search"
                                                        placeholder="Search">
                                                </div>
                                            </form>


                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover"
                                                    id="table-id">
                                                    <thead class="thead-dark text-light ">
                                                        <tr>
                                                            <th style="background-color: #4A0063;">Posting </th>
                                                            <th style="background-color: #4A0063;">Date Created </th>
                                                            
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                     


                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="chart-area" style="margin-top: 54px;">



                                            </div>


                                        </div>
                               
                            </div>
                        </div>
                        
                    <!--Row-->

                    

                    <!-- Modal Logout -->
                    

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
    
              <footer class="sticky-footer">
                        <?php include 'footer.php'; ?>
                        <?php include 'company-job-post.php'; ?>
                    </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>