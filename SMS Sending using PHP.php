<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>SMS Form</title>
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<meta name="robots" content="noindex,follow" />
</head>
<body>
  <div class="container">
    <div class="login">
      <h1>Send SMS</h1>
      <form method="post" action="">
        <p><input type="number" name="no" value="" placeholder="Mobile No."></p>
        <p><input type="text" name="msg" value="" placeholder="Message"></p>
        <p class="submit"><input type="submit" name="submit" value="Send"></p>
      </form>
    </div>
  </div>
</body>
</html>
<?php
$noo=$_POST['no']; 
$mssg=$_POST['msg']; 
if(isset($_POST['submit']))  
    {  
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => $mssg,
    "language" => "english",
    "route" => "p",
    "numbers" => $noo,
    "flash" => "1"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization:Enter Your API key",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
?>
