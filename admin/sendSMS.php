<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://panel2.messagewale.com/http-api.php?username=JobFair&password=Jobfair@23&senderid=JOBCRD&route=1&number=7000630640&message=Dear Candidate For todays opening click on link https://shorturl.at/BCUW5 Ref-NCP NASHIK Reg- - - Job Card and Job Fair India&templateid=1407168327034496963");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $response = curl_exec($ch);


curl_close($ch);      

echo $response;
echo '<br>';

?>
<?php
// $send_msg91_sms = file_get_contents("http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=7000630640&authkey=AUTH_KEY&message=Hello! This is a test message&country=0&response=json");
// $response = json_decode($send_msg91_sms);
// echo $response;
// echo '<br>';

?>
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://panel2.messagewale.com/http-jsondlr.php?username=JobFair&password=Jobfair@23&msg_id=MTQ5MDYw");

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