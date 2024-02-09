<?php
session_start();
require('connection.php');

// Assuming you have a variable $blog_id with the ID of the specific blog you want to display
$blog_id = $_GET['blog_id']; // Assuming you're passing the blog_id via URL

// Fetch the specific blog details from the database
$query = "SELECT * FROM blogs WHERE blog_id = $blog_id";
$result = mysqli_query($con, $query);
$blog = mysqli_fetch_assoc($result);

// Check if a blog with the given ID exists
if (!$blog) {
  // Handle the case where the blog with the given ID does not exist
  // For example, you could redirect to an error page or display a message
  echo "Blog not found!";
  exit();
}

?>


<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="assets/css/blog-detail.css">
<!-- navbar  -->
<?php include './navbar.php'; ?>
<!-- breadcrumb -->
<div class="breadcrumb-section">
  <div class="container">
    <h2 class="title">Blog Detail</h2>
    <nav aria-label="breadcrumb" class="text-center mt-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item"><a href="./blog.php">Blogs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
      </ol>
    </nav>
  </div>
</div>
<!-- Recent article-->
<section class="paddingTB60 blog-detail">
  <div class="container ms-auto me-auto">

    <img src="admin/blog/.<?php echo $blog['other_image']; ?>" class="card-img-top" alt="Image">
    <div class="main-row">
      <br>
      <br>
      <br>
      <div class="date-square">
        <?php echo date('d M', strtotime($blog['blog_date'])); ?>
      </div>
      <div class="comment-count"> comments</div>
      <div class="user-name">
        <?php echo $blog['blog_name']; ?>
      </div>
    </div>
    <h1 class="blog-title">
      <?php echo $blog['blog_title']; ?>
    </h1>
    <p class="blog-text textjustify">
      <?php echo $blog['blog_description']; ?>
    </p>







    <div class="ms-auto me-auto row">
      <img src="./assets/images/home/blog_details_1.png" class="mx-2 col" alt="">
      <img src="./assets/images/home/blog_details_2.png" class="mx-2 col" alt="">
    </div>
    <div class="row my-4">
      <div class="col-md-8">
        <span class="tags fw-semibold blog-text">Tag:</span>
        <?php echo $blog['blog_tags']; ?>
      </div>



      <ul class="social-media-icons-share col-md-4 justify-content-end">
        <span> Share :</span>
        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
      </ul>

    </div>
    <div class="row my-lg-5">


      <div class="col">
        <div class="row">

          <div class="col-auto">

            <img src="./assets/images/home/img1.png" height="56px" width="56px" alt="">
          </div>
          <div class="col mt-lg-3"><a href="">Previous Post </a></div>
        </div>
      </div>

      <div class="col">
        <div class="row">
          <div class="col d-flex justify-content-end mt-lg-3"><a href=""> Next Post</a></div>
          <div class="col-auto">

            <img src="./assets/images/home/img1.png" height="56px" width="56px" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row my-5 w-100">
      <div class="col-md-12">
        Comments:
      </div>
      <?php
      $query6 = "SELECT * FROM `comments` WHERE blog_id='$blog_id'  ORDER BY comment_date DESC";


      if ($result6 = mysqli_query($con, $query6)) {
        if (mysqli_num_rows($result6) > 0) {
          $count = 1;
          while ($row = mysqli_fetch_assoc($result6)) {
      ?>
            <div class="row my-3">
              <div class="col-auto">
                <img src="./assets/images/home/profile2.png" height="50px" width="50px" alt="">
              </div>
              <div class="col">
                <div class="row">
                  <?= $count++ ?>
                  <div class="col-auto"><?= $row['person_name'] ?>,</div>
                  <div class="col-auto" style="color: #595959; font-family: Exo ;"><?= $row['comment_date'] ?></div>

                </div>
                <div class="row">
                  <div class="col">

                    <?= $row['comment'] ?>
                  </div>
                </div>
              </div>
            </div>

      <?php
          }
        } else {
          echo "No Comments.";
        }
      }
      ?>

    </div>

    <div class="form  mx-5 border-0  p-4" style=" background-color:#F8F8F8">
      <form action="" method="post">
        <h3 class="my-3" style="font-family: 'Exo'; font-style: normal;font-weight: 400;font-size: 19px;">
          Leave A Reply
        </h3>
        <div class="row">

          <div class="col-auto mb-3">
            <label for="name" class="form-label">Your Name*</label>
            <input type="text" class="form-control" name="name" id="name" required>
            <input type="hidden" class="form-control" name="blog_id" value="<?= $blog_id ?>" id="name">
          </div>

          <div class="col-auto mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control" name="email" required id="email" placeholder="name@example.com">
          </div>
        </div>
        <div class="mb-3">
          <label for="msg" class="form-label">Message</label>
          <textarea required class="form-control" id="msg" name="msg" rows="5"></textarea>
        </div>
        <div class="mb-3">
          <input type="submit" name="comment" class="btn text-light px-4" value="Send Message" style="background-color: var(--primary);">
        </div>
      </form>

    </div>
  </div>
  </div>
  </div>
</section>
<!-- footer -->
<?php include './footer.php'; ?>


<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

<?php
if (isset($_POST['comment'])) {


  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['msg'];
  $blog_id = $_POST['blog_id'];

  $q = "INSERT INTO `comments`(`blog_id`,`comment`, `person_name`, `email`) VALUES ('$blog_id','$msg','$name','$email')";

  if (mysqli_query($con, $q)) {
    echo "
                    <script>
                      alert('Thank You...');
                       window.location.href='blog-details.php?blog_id=$blog_id';
                    </script>
                  ";
  } else {


    echo "
                    <script>
                      alert('Something went wrong??');
                      window.location.href='blog-details.php?blog_id=$blog_id';
                    </script>
                  ";
  }
}

?>

</html>