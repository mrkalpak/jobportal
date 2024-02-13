
<nav>
    <?php 
    include 'admin-header.php'; 
    ?>
</nav>
<?php
    require('connection.php');
    $query = "SELECT * FROM job_fair";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_query($con,$query);
    } else {
        $NoData="No Data Found";
    }

?>
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
                <?php
                while($row = $result->fetch_assoc()) {
                    
                    $query2 = "SELECT * FROM job_faircandidate WHERE fairId=".$row['id']."";
                    $result2 = mysqli_query($con, $query2);
                    // print_r($result2->num_rows);
                    $today=date("Y-m-d");
                    // echo $today;
                    $fairStatus="";
                    if($today==$row['fairDate'] || $today<$row['fairDate']){
                        $fairStatus="Active";
                        $badege="success";
                    }else{
                        $fairStatus="Expired";
                        $badege="danger";

                    }
                echo' <tr>

                    <td>
                    '.$row['fair_Organizer'].'<span class="badge badge-'.$badege.' rounded-pill  ">'.$fairStatus.'</span><br>
                        <span style="color: #595959;">'.$row['location'].' | Date: '.$row['fairDate'].'</span> <br>

                    </td>
                    <td>
                        '.$result2->num_rows.' Total Applications
                    </td>

                    <td class="d-flex">
                            <button onclick="editFair('.$row['id'].')"  value="'.$row['id'].'" class=" btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Edit</button>
                            
                            <a href="./job-fair-candidate.php?fair_Id='.$row['id'].'">
                                <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                            </a>
                    </td>


                </tr>';

            }?>
            </table>
            <?php
            if (mysqli_num_rows($result)<0) {
                echo '<h4 class="text-danger text-center">'.$NoData.'</h4>';
            }
            ?>
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
                <button type="button" onclick="closeModal()" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="jobFairForm" action="admin_postdata.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input required type="text" class="form-control" name="fairName" id="Name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="Name">Fair Organizer</label>
                        <input required type="text" class="form-control" name="organizer" id="organizer" placeholder="Organizer Name">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input required type="date" class="form-control" name="fairDate" id="date" placeholder="Enter date">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input required type="time" class="form-control" name="fairTime" id="time" placeholder="Enter date">
                    </div>
                    <div class="form-group">
                        <label for="banner">Banner Image</label>
                        <input required type="file" class="form-control" name="BannerImg" id="banner">
                        <span id="currentFile" class="text-primary"></span>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input required type="text" class="form-control" name="location" onkeyup="mapLocation()" id="location">
                        <input id="updateThisId" name="updateId" type="hidden" value="">
                    </div>
                    <!-- <div class="form-group">
                        <label for="Maplink">Map Link</label>
                        <input type="text" class="form-control " id="Maplink">
                    </div> -->
                    <iframe id="embedMap" width="450" height="250" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade"allowfullscreen></iframe>
                    <div class="modal-footer">
                        <button type="submit" name="admin_jobfair" id="upload" class="btn text-white mx-auto" style=" background:#4A0063; ">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>