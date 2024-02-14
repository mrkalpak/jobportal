<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://panel2.messagewale.com/http-jsonapi.php?username=JobFair&password=Jobfair@23&senderid=JOBCRD&route=1&number=7000630640&message=HelloNihal&templateid=1407168327034496963");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $response = curl_exec($ch);


curl_close($ch);      

echo $response;
echo '<br>';
?>
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://panel2.messagewale.com/http-jsondlr.php?username=JobFair&password=Jobfair@23&msg_id=MTQ5MDA5");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $response = curl_exec($ch);


curl_close($ch);      

echo $response;
echo '<br>';

?>

<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://panel2.messagewale.com/http-jsoncredit.php?username=JobFair&password=Jobfair@23&route_id=1");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $response = curl_exec($ch);


curl_close($ch);      

echo $response;
echo '<br>';

?>