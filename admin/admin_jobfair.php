<nav>
    <?php include 'admin-header.php'; ?>
</nav>
<link rel="stylesheet" href="./css/jobpost.css">
<style>
    .form-control {
        height: auto;
    }
</style>

<div class="row w-100" id="content">

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- Sidebar -->

    <!-- Container Fluid-->
    <div class="col mx-0" id="container-wrapper">
        <div class="row w-100 justify-content-between  bdr-custom-padding fs-4">
            <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                Job Fair
            </div>
            <div class="col-md-6 div1" style="color:#F18101;">
                <i class="fa fa-home"></i>/ Job Fair
                <br>
                <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style=" background:#4A0063; margin-bottom: -34px;">Create
                    Job Fair
                </button>

            </div>
        </div>
        <div class="row mx-auto my-4 table-responsive">
            <table class="" id="myTable">
                <tr style="background-color: #4a0063; ">
                    <th>Fair Name</th>
                    <th>Applications</th>
                    <th id="action_col">Action</th>
                </tr>

                <tr>
                    <td>
                    Shivsena Saeed Khan<span class="badge rounded-pill  active-plan">Active</span>
                        <br>
                        <span style="color: #595959;">Pune | Date: 02 April, 2023</span> <br>

                    </td>
                    <td>
                        35 <br> Total Applications
                    </td>

                    <td class="d-flex">
                        

                            <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Edit</button>
                        
                        <a href="./job-fair-candidate.php">

                            <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                        </a>
                    </td>


                </tr>
                <tr>
                    <td>
                    Shivsena Saeed Khan<span class="badge rounded-pill  expire-plan">Expired</span>
                        <br>
                        <span style="color: #595959;">Pune | Date: 02 April, 2023</span> <br>

                    </td>
                    <td>
                        35 <br> Total Applications
                    </td>

                    <td>
                    <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Edit</button>
                        <a href="./job-fair-candidate.php">

                            <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                        </a>
                    </td>


                </tr>




                



            </table>

        </div>




    </div>
    <!---Container Fluid-->
</div>
<!-- Footer -->

<footer class="sticky-footer">
    <?php include 'footer.php'; ?>
</footer>
<!-- Footer -->
</div>
</div>


<!-- create job fair mmodal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create Job fair</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" placeholder="Enter date">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" placeholder="Enter date">
                    </div>
                    <div class="form-group">
                        <label for="banner">Banner Image</label>
                        <input type="file" class="form-control " id="banner">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control " id="location">
                    </div>
                    <div class="form-group">
                        <label for="Maplink">Map Link</label>
                        <input type="text" class="form-control " id="Maplink">
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn text-white mx-auto" style=" background:#4A0063; ">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>