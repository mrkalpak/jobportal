<!DOCTYPE html>
<html lang="en">

<?php include './header.php'; ?>
<?php
    require('connection.php');
    $query = "SELECT * FROM job_fair";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_query($con,$query);
    } else {
        $NoData="No Data present";
    }
?>

<style>
    .job-fair-card-details {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .main-title {
        font-size: x-large !important;
    }

    @media (max-width: 767px) {
        .job-fair-card-details {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
<!-- navbar  -->
<?php include './navbar.php'; ?>


<!-- gallery-->
<section class="paddingTB60 ">
    <div class="card shadow job-fair-card-details px-4 py-3 textjustify">

        <div class="col-12  ">
            <h3 class="main-title">Get ready for the <span class="main-title-span">upcoming Job Fair </span></h3>
        </div>
        <div class="row my-2 mx-5">
        <?php
            if (mysqli_num_rows($result)<0) {

                echo '<h4 class="text-danger text-center">'.$NoData.'</h4>';
            }
        ?>
        <?php
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-4 my-2">
                    <div class="card">
                        <img src="./assets/fair/'.$row['fileName'].'" class="card-img-top" alt="'.$row['fileName'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['fairName'].'</h5>
                            <p class="card-text"><i class="bi bi-calendar-event"></i> '.$row['location'].'</p>
                            <p class="card-text"><i class="bi bi-geo-alt-fill"></i> '.$row['fairDate'].'</p>
                            <a href="./job-fair-form.php?fair_Id='.$row['id'].'" class="btn btn-primary-custom"> Apply</a>
                        </div>
                    </div>
                </div>';
            }
        ?>
                </div>

        &nbsp; &nbsp; &nbsp; &nbsp; At the job fair in India, there are more beneficial options that can provide specific solutions for your quest of getting a perfect and efficient job where you can be comfortable with your skills, payments, and all. Job Fair India organises the job fair in Maharashtra which is the hub of industries of different types therefore, the job fair always cares for the concerns of every member so that you can be comfortable attending it. It often happens that despite having perfect qualifications and skills, you are not able to find the job and you are unable to explore the vacancy and all in the respective companies. <br><br>
        &nbsp; &nbsp; &nbsp; &nbsp; The upcoming job fair always helps you be prepared to join your desired company as per your skill and certification. Therefore, if you are willing to find a good job and willing to establish your career, then register by filling in all the details and get ready for the upcoming job fair where all the experts from different companies help you be more knowledgeable about the interview and all. It’s the way that can lead you to success and perfection. Hence, you are always welcome to join the upcoming job fair either to join as a fresher or to switch your existing job for a better salary hike. <br><br>

        &nbsp; &nbsp; &nbsp; &nbsp; Considering all these benefits and facilities, you can attend the upcoming job fair so that you can find the best options for your career growth and enhancement of your professional positions. It’s the platform that can take you to the next level I.e., almost to the success. <br> <br>

        <br> <br>
        <div class="col-12 ">
            <h3 class="main-title">Mega<span class="main-title-span"> Job Fair</span></h3>
        </div>
        &nbsp; &nbsp; &nbsp; &nbsp; The mega job fair is basically famous and relevant as per its name where maximum numbers of companies come to select the talented and competent professionals for a different post and it is beneficial for all those looking for better chances in job and career, therefore, the mega job fair is an event where you can get various possibilities for your better future. <br><br>
        &nbsp; &nbsp; &nbsp; &nbsp; Once you have accomplished your degree or looking for an internship while pursuing your courses, you can join the event for better options where enormous numbers of companies get gathered. <br><br>
        &nbsp; &nbsp; &nbsp; &nbsp; Mega job fair is an outcome of the vision to bridge the gap between unemployment and a better job where one can get the fulfilment and goal of accumulating the professional degree which is to get a perfect, transformative, and convenient job. At a mega job fair your ultimate goal of getting a job gets achieved and you can find yourself in a better position. Considering the huge requirements of the job and selecting the talent from different institutions, mega job fair calls multiple companies and helps the freshers as well as the experienced to get the better options. <br><br>
        &nbsp; &nbsp; &nbsp; &nbsp; Since it covers a larger area and calls more companies, it is not confined to some distinct fields but there are wider options for the various fields there are requirements for all the fields like IT, Civil, Mechanical, Science, Arts, Commerce and all. Everyone can select the relevant companies as per their qualification and interpersonal skills. <br><br>
        &nbsp; &nbsp; &nbsp; &nbsp; It’s your time to add some distinct and valuable steps to your career by attending the mega job fair at your nearest place and you can also register for the online updates where you will receive regular updates and notifications from the employers. <br><br>





    </div>
</section>

<!-- footer -->
<?php include './footer.php'; ?>

 
<!-- Plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="assets/js/our-trusted-company.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/popular-category.js"></script>
<script src="assets/js/featured-jobs-gallery.js"></script>
<script src="assets/js/users-feedback.js"></script>
</body>

</html>