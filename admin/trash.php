<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Company
                Information:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row">
                    <div class=" col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Company Name</label>
                        <input type="text" class="form-control" placeholder="Company Name count" value="<?php echo $count++ ?>">
                    </div>
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Company Type</label>
                        <input type="text" class="form-control" value="<?= $row['name'] ?>" placeholder="Company Type">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Company Size</label>
                        <input type="text" class="form-control" placeholder="Company Size">
                    </div>
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Email*</label>
                        <input type="text" class="form-control" placeholder="Email*">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Location</label>
                        <input type="text" class="form-control" placeholder="Location">
                    </div>
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Website Link</label>
                        <input type="text" class="form-control" placeholder="Website Link">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">Facebook</label>
                        <input type="text" class="form-control" placeholder="Facebook">
                    </div>
                    <div class="col-md-6" style="margin-bottom: 12px;">
                        <label for="inputEmail4">LinkedIn</label>
                        <input type="text" class="form-control" placeholder="LinkedIn">
                    </div>
                </div>
            </form>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">View Documents
                </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn" data-dismiss="modal" style="margin-bottom: 27px;color: white;background-color: #F18101;">Reject
            </button>
            <button type="button" class="btn btn" style="margin-bottom: 27px;color: white;background-color: #4A0063;">Accept </button>
        </div>
    </div>
</div>












<!-- form of jobcards managements-------------------------------------------------------------------- -->



<form method="GET" action="?job_cardid=<?= $job_cardid ?>&name=<?= $name ?>&education=<?= $education ?>&client_name=<?= $client_name ?>">
    <div class="form-row">
        <label for="inputEmail4" style=" margin-top: 10px;margin-left: 28px;">Jobcard ID</label>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="job_cardid" id="inputID4" placeholder="Jobcard ID" style="margin-left: 12px;">
        </div>
        <label for="inputEmail4" style=" margin-top: 10px;margin-left: 28px;">Student
            Name</label>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="name" id="inputName4" placeholder=" Name" style="margin-left: 12px;">
        </div>
    </div>
    <div class="form-row">
        <label for="inputEmail4" style=" margin-top: 10px;margin-left: 28px;">Education</label>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="education" id="inputID4" placeholder="Education" style="margin-left: 12px;">
        </div>
        <label for="inputName4" style="margin-top: 10px;margin-left: 28px;">Client Name</label>
        <div class="form-group col-md-4">
            <select class="form-control" name="client_name" id="inputName4" style="margin-left: 30px;">
                <option selected value="">Select Client</option>
                <?php
                if ($result42->num_rows > 0) {

                    while ($row2 = $result42->fetch_assoc()) {

                ?>
                        <option value="<?= $row2["jobcard_client_name"] ?>"><?= $row2["jobcard_client_name"] ?></option>

                <?php

                    }
                } else {
                    echo "Not found.";
                }
                ?>
            </select>
        </div>

    </div>

    <div class="form-row">
        <label for="inputEmail4" style=" margin-top: 10px;margin-left: 28px;">Card Type</label>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="cardtype" id="inputCity" style="margin-left: 12px;">
        </div>



    </div>
    <div class="btn-group" role="group" aria-label="Third group">
        <!-- <button type="button" class="btn btn-secondary btn-lg " style="width: 129px;margin-left: 40px;border-radius: 6px ;height: 44px;border: none">Export</button> -->
        <button type="submit" name="updatesearch" class="btn btn-secondary btn-lg" style="width: 129px;margin-left: 40px;border-radius: 6px ;height: 44px;border: none;">Search1</button>
        <button name="updatesearch" class="btn btn-primary-custom " type="submit">
            <i class="bi bi-search"></i> Update Search
        </button>
    </div>
</form>