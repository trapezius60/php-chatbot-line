<?php
// ใช้ API ของ BOT (Bank of Thailand) https://apiportal.bot.or.th/bot/public/node/470
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apigw1.bot.or.th/bot/public/Stat-ReferenceRate/v2/DAILY_REF_RATE/?start_period=2019-06-01&end_period=2019-06-30",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "x-ibm-client-id: a5dbb483-67cd-4293-9c40-e82853d82b96"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $post_body = json_decode($response, JSON_UNESCAPED_UNICODE);
  echo $post_body;
}
?>
