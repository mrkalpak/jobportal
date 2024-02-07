<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
  header("Location: ../index.php");
}

require('connection.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>
    <section class="">
      <div class="container py-4 ">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong">
              <div class="card-body  mx-md-4">

                <h3 class="text-center">Generate New Job Card</h3>


                <div class="form-outline mb-3">
                  <label class="form-label" for="typeEmailX-2">How many cards</label>
                  <input type="text" placeholder=" Cards" id="typeEmailX-2" class="form-control" style="border-radius: 0px;" />

                </div>

                <div class="form-outline mb-3">
                  <label class="form-label" for="typePasswordX-2">Client Name</label>
                  <input type="text" placeholder="Client Name" id="typePasswordX-2" class="form-control" style="border-radius: 0px;" class="fa fa-caret-down" /> </i>

                </div>


                <a href="jobcards-management.php"><button type="submit" class="btn btn-dark w-100 mb-5">Generate Card</button></a>


                <!-- <div class="form-check d-flex justify-content-start mb-3">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember  </label>
             
                <a href=""  style="margin-left: auto;color: black"></a>
            </div> -->

                <!-- <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <script>
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
}); -->
    </script>

  </body>

  </html>
</body>

</html>