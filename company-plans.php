<?php
require('connection.php');

$env = parse_ini_file('.env');
if($_SERVER['SERVER_PORT']==443) {
    $header = $env["HEADER_SERVER"];
    
}
else {
    $header = $env["HEADER"];
}

// var_dump($header);
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];




$query = "SELECT * FROM `company` WHERE  `username`='$main_user'";
$result = mysqli_query($con, $query);
if ($result) {

    $result_fetch = mysqli_fetch_assoc($result);
    // var_dump($result_fetch);
    $db_points = $result_fetch['coins'];
}
?>



<?php include './header.php'; ?>

<style>
    .card-color {
        background-color: #EFF3F2;
    }
</style>
<link rel="stylesheet" href="./assets/css/company-dashboard.css">
<!-- navbar -->
<?php include './profileNavbar.php'; ?>


<!-- comapany Navbar -->
<?php
$activePage = "plansandsub";
include './company-navbar.php';

?>


<div class="p-4 ms-auto mb-5 me-auto cards-width card-color   ">


    <h3 class="text-center mt-5">Buy coins to close your hiring</h3>
    <div class="text-secondary text-center mt-0" style="font-size: smaller;">
        Use Job Fair coins to post the jobs and to hire through Job Fair Database product. Simple & easy free
        process. 
    </div>
    <div class="row mt-5 g-5">
        <div class="row w-100 ms-auto me-auto px-4">
            <div class="card">
                <span class="fw-semibold mt-2 ms-2" style="font-size: medium;">
                    Free Coins
                </span>
                <div class="mt-2 ms-2">

                    <img src="./assets/images/jobcoin.png" alt=""><span class="fw-semibold  fs-3" style="vertical-align: middle;">
                        600
                    </span>
                </div>
                <hr>
                <div class=" mb-4" style="font-size: smaller;">
                    <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">6
                        Months </span> &nbsp;
                    <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                    user account
                </div>
            </div>
        </div>
        <div class="col-md ">
            <div class="card mb-3">
                <div class="card-header  bg-transparent fw-semibold fs-6 text-center " style="font-size: smaller;">
                    Classic </div>
                <div class="card-body">
                    <div class=" mb-5">


                        <img src="./assets/images/jobcoin.png" alt=""><span class="fw-semibold fs-3" style="vertical-align: middle;">
                            300
                        </span> <br>
                        <span style="font-size: x-small;">Try the classic plan for beginners.
                            300 coins balance valid for 6 months. </span>
                    </div>
                    <hr />
                    <div class=" mb-4" style="font-size: smaller;">
                        <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">6 Months </span><br>
                        <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                        user account
                    </div>
                    <div class="card-footer border-0 bg-transparent ">
                        <!-- <button class="btn btn-primary-custom btn-sm w-100">Buy Now</button> -->
                        <form method="post">
                            <input type="text" name="points1" value="300" hidden>
                            <input type="button" onclick="payNow(300)" class="btn btn-primary-custom btn-sm w-100" name="plan1" value="Buy Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md ">
            <div class="card mb-3">
                <div class="card-header bg-transparent fs-6 fw-semibold text-center " style="font-size: smaller;">
                    Premium</div>
                <div class="card-body">
                    <div class=" mb-5">


                        <img src="./assets/images/jobcoin.png" alt=""><span class="fw-semibold fs-3" style="vertical-align: middle;">
                            500
                        </span> <br>
                        <span style="font-size: x-small;">Get best offer for 1 year. Register for the Premium plan
                            access 500 coins. </span>
                    </div>
                    <hr />
                    <div class=" mb-4" style="font-size: smaller;">
                        <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">1 Years </span><br>
                        <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                        user account
                    </div>
                    <div class="card-footer border-0 bg-transparent ">
                        <!-- <button class="btn btn-primary-custom btn-sm w-100">Buy Now</button> -->
                        <form method="post">
                            <input type="text" name="points2" value="500" hidden>
                            <input type="button" onclick="payNow(500)" class="btn btn-primary-custom btn-sm w-100" name="plan2" value="Buy Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md ">
            <div class="card mb-3">
                <div class="card-header bg-transparent fs-6 fw-semibold text-center " style="font-size: smaller;">
                    Premium</div>
                <form>
                    <div class="card-body">
                        <div class=" mb-5">

                            <span class="" style="font-size: small ;">Buy coins as per your need</span>
                            <div class="mb-2">
                                <input type="number" value=""  class="form-control form-control-sm" name="points3" id="customcoin" inputmode="numeric">
                                <input type="hidden" id="companyName" value="<?=$companyName=$result_fetch['name'];?>">
                                <input type="hidden" id="companyId" value="<?=$main_user;?>">
                                <input type="hidden" id="companyEmail" value="<?=$companyEmail=$result_fetch['email'];?>">
                                <input type="hidden" id="companyLogo" value="<?=$companyLogo=$result_fetch['companylogo'];?>">
                                <input type="hidden" id="companyMobile" value="<?=$companyMobile=$result_fetch['mobile'];?>">

                            </div>

                            <div class="col">
                                <img src="./assets/images/jobcoin.png" alt=""><span class="  " style="vertical-align: middle;">
                                    1 Coin = ₹ 1
                                </span>
                            </div>
                        </div>
                        <hr />
                        <div class=" mb-4" style="font-size: smaller;">
                            <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">30 Days </span><br>
                            <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                            user account
                        </div>
                        <div class="card-footer border-0 bg-transparent ">
                            <!-- <button class="btn btn-primary-custom btn-sm w-100">Buy Now</button> -->
                            <!-- <input type="text" name="points" value="600" hidden> -->
                        <input type="button" onclick="payNow('')"  class="btn btn-primary-custom btn-sm w-100" name="plan3" value="Buy Now">
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<hr>
<div class="my-3 text-center fw-semibold fs-5">
    Our Pricing Plans
</div>
<div class="row px-0 ms-auto me-auto bg-white text-center " style="width: 380px;">
    <div class="col  p-4 border">
        Classic
    </div>
    <div class="col  p-4 border">
        ₹ 300
    </div>
</div>
<div class="row px-0 ms-auto me-auto bg-white text-center " style="width: 380px;">
    <div class="col p-4 border">
        Premium
    </div>
    <div class="col p-4 border">
        ₹ 500
    </div>
</div>
<div class="row mt-5 text-center">
    <div class="col">
        <img src="./assets/images/jobcoin.png" alt=""><span class="  " style="vertical-align: middle;">
            1 Coin = ₹ 1
        </span>
    </div>
    <div class="col">
        <span class="  " style="vertical-align: middle;">
            1 Job Post =
        </span>

        <img src="./assets/images/jobcoin.png" alt=""><span class=" " style="vertical-align: middle;">
            50 Coins ( ₹ 50)
        </span>
    </div>
    <div class="col">
        <span class="  " style="vertical-align: middle;">
            1 Data =
        </span>

        <img src="./assets/images/jobcoin.png" alt=""><span class=" " style="vertical-align: middle;">
            2 Coins ( ₹ 2)
        </span>
    </div>

</div>
</div>


<!-- footer -->
<?php
 include './footer.php'; 
 $razorpayOrderId=$_SESSION['razorpayOrderId'];
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- script -->
<script src="./assets/js/showrows.js"></script>
<script>
    function payNow(amount){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
        }).then((result) => {
        if (result.isConfirmed) {
                // console.log(amount=='')
                var coin='';
                if(amount==''){
                    coin=$("#customcoin").val()
                    if(coin==''){
                        alert('Enter The Amount')
                        return;
                    }
                }
                else if(amount==500){
                    coin=500
                }else if(amount==300){
                    coin=300
                }else{
                    alert('Enter The Amount')
                    return;
                }
                var userData = {
                customcoin:coin,
                main_user:$("#companyId").val()
                };
                $.ajax({
                type: "POST",
                url: 'postdata.php',
                data: userData,
                dataType: 'json',
                success: function(data) {
                    // console.log(data.res);
                    if(data.res!=''){
                        var customcoin=coin;   
                        var companyName=$("#companyName").val();
                        var companyEmail=$("#companyEmail").val();
                        var companyLogo=$("#companyLogo").val();
                        var companyMobile=$("#companyMobile").val();    
                        var options = {
                            "key": 'rzp_test_MwpraXR8m9YNGK', // Enter the Key ID generated from the Dashboard
                            "amount": customcoin*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": companyName, //your business name
                            "description": "Added Amount to Wallet",
                            "image": "<?php echo $header ?>"+"companydocs/."+companyLogo+"",
                            "order_id": ''+data.res+'', //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": function (response){
                                // alert(response.razorpay_payment_id);
                                // alert(response.razorpay_order_id);
                                // alert(response.razorpay_signature)
                                    console.log(response)
                                    var userData = {
                                    transactionId:response.razorpay_order_id,
                                    companyId:$("#companyId").val(),
                                    razorpay_payment_id:response.razorpay_payment_id,
                                    customcoin:customcoin,
                                    verifySignature:response.razorpay_signature,
                                    };
                                    $.ajax({
                                    type: "POST",
                                    url: 'postdata.php',
                                    data: userData,
                                    dataType: 'json',
                                    success: function(data) {
                                        console.log(data.res)
                                        if(data.res=='success'){
                                            alert('Payment Successfully done')
                                            window.location.href='company-joblist.php';
                                        }
                                    },
                                    error: function(data) {
                                        // console.log(response);
                                        if(data.res=='error'){
                                            alert('Payment Failed') 
                                        }
                                    }
                                })
                                // alert(response.razorpay_payment_id);
                            },
                            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                                "name": companyName, //your customer's name
                                "email": companyEmail, 
                                "contact": companyMobile  //Provide the customer's phone number for better conversion rates 
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function (response){
                                // alert(response.error.code);
                                // alert(response.error.description);
                                // alert(response.error.source);
                                // alert(response.error.step);
                                alert(response.error.reason);
                                // alert(response.error.metadata.order_id);
                                // alert(response.error.metadata.payment_id);
                        });
                        // document.getElementById('rzp-button1').onclick = function(e){ 
                                rzp1.open();
                                // e.preventDefault();
                        // }
                    }
                    
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
        });    
    
    }
</script>
 

<?php
// if (isset($_POST['plan1'])) {
//     $points = $_POST['points1'];
//     $fpoints = $db_points + $points;
//     $currentDate = date('Y-m-d');
//     $expirationDate = date('Y-m-d', strtotime('+6 months', strtotime($currentDate)));

//     $add = "UPDATE `company` SET `coins`='$fpoints'  where username='$main_user' ";
//     $run233 = mysqli_query($con, $add);

//     $add2 = "INSERT INTO `plans`(`username`, `amount`, `active`, `edate`) VALUES ('$main_user','$points',1,'$expirationDate')";
//     $run2 = mysqli_query($con, $add2);
//     echo "
//             <script>
//               alert('$points Payment Sucessfully');
//               window.location.href='company-plans.php';
//             </script>
//           ";
// }





// if (isset($_POST['plan2'])) {
//     $points = $_POST['points2'];
//     $currentDate = date('Y-m-d');
//     $expirationDate = date('Y-m-d', strtotime('+1 year', strtotime($currentDate)));
//     $fpoints = $db_points + $points;

//     $add = "UPDATE `company` SET `coins`='$fpoints'  where username='$main_user' ";
//     $run233 = mysqli_query($con, $add);

//     $add2 = "INSERT INTO `plans`(`username`, `amount`, `active`, `edate`) VALUES ('$main_user','$points',1,' $expirationDate')";
//     $run2 = mysqli_query($con, $add2);
//     echo "
//             <script>
//               alert('$points Payment Sucessfully');
//               window.location.href='company-plans.php';
//             </script>
//           ";
// }









?>