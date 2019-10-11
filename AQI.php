<?php
// List country
//api.airvisual.com/v2/countries?key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
//List Country & State
//api.airvisual.com/v2/cities?state=Chiangmai&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
//api.airvisual.com/v2/cities?state=Chiang%20Mai&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
// will return >> {"status":"success","data":[{"city":"Nakhon Ratchasima"}]}
//Specific data in city
//api.airvisual.com/v2/city?city=Los Angeles&state=California&country=USA&key={{YOUR_API_KEY}}
// LINK documentation >> https://documenter.getpostman.com/view/507654/airvisual-api/2Fvvgg?version=latest

// key = c97b1c11-d68f-4acc-9ac9-13f8673e2844 (แทน {{YOUR_API_KEY}})
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "api.airvisual.com/v2/city?city=Muang&state=Nakhon%20Ratchasima&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  
} ?>
