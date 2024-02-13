<?php
    require('connection.php');
    // print_r($_GET);
    $query = "SELECT * FROM job_fair where id=".$_GET["editId"]."";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_query($con,$query);
        $data = $result->fetch_assoc();
        // print_r($data);
        echo json_encode($data);
    } else {
        echo "0 results";
    }
?>