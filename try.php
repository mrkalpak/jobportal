<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Form</title>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <!-- Add your additional styles or include Bootstrap CSS here -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>

    <!-- Your HTML form goes here -->
    <form id="yourForm" action="process_form.php" method="post">
        <!-- Your form fields go here -->
        <input type="submit" value="Submit Form">
    </form>

    <!-- Your modal goes here -->
    <div class="modal" tabindex="-1" id="submitmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body px-5">
                    <div class="col-12 text-center">
                        <h5 class="">Profile Updated </h5>
                        <h6>Your Profile is under review <br /> We will get back to you </h6>
                    </div>
                </div>
                <div class="my-3 text-center">
                    <button type="button" class="btn btn-primary-custom" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and your script -->
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('yourForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // You can add any additional form processing logic here

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('submitmodal'));
            myModal.show();

            // Optionally, you can redirect to another page after showing the modal
            // window.location.href = 'your_redirect_page.php';
        });
    </script>

</body>

</html>