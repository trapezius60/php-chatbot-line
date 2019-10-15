<html>
<head>
<title>PHP & MySQL (mysqli)</title>
</head>
<body>
<?php

// List country
//api.airvisual.com/v2/countries?key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
//List Country & State
//api.airvisual.com/v2/cities?state=Chiangmai&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
//api.airvisual.com/v2/cities?state=Chiang%20Mai&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844

// will return >> {"status":"success","data":[{"city":"Chiang Mai"},{"city":"Hang Dong"},{"city":"San Sai"}]}
//             >>{"status":"success","data":[{"city":"Nakhon Ratchasima"}]}
//Specific data in city
//api.airvisual.com/v2/city?city=Los Angeles&state=California&country=USA&key={{YOUR_API_KEY}}
//api.airvisual.com/v2/city?city=Nakhon%20Ratchasima&state=Nakhon%20Ratchasima&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
//{"status":"success","data":{"city":"Nakhon Ratchasima","state":"Nakhon Ratchasima","country":"Thailand","location":{"type":"Point","coordinates":[102.0775411,14.9723586]},"current":{"weather":{"ts":"2019-10-11T02:00:00.000Z","tp":27,"pr":1014,"hu":94,"ws":1.5,"wd":0,"ic":"50d"},"pollution":{"ts":"2019-10-11T01:00:00.000Z","aqius":78,"mainus":"p2","aqicn":36,"maincn":"p2"}}}}
//api.airvisual.com/v2/city?city=Los%20Angeles&state=California&country=USA&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844
//{"status":"success","data":{"city":"Los Angeles","state":"California","country":"USA","location":{"type":"Point","coordinates":[-118.2417,34.0669]},"current":{"weather":{"ts":"2019-10-11T01:00:00.000Z","tp":23,"pr":1011,"hu":50,"ws":1.5,"wd":260,"ic":"01n"},"pollution":{"ts":"2019-10-11T01:00:00.000Z","aqius":48,"mainus":"p2","aqicn":17,"maincn":"p2"}}}}

// LINK documentation >> https://documenter.getpostman.com/view/507654/airvisual-api/2Fvvgg?version=latest
//                    >>   key = c97b1c11-d68f-4acc-9ac9-13f8673e2844 (แทน {{YOUR_API_KEY}})

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "api.airvisual.com/v2/city?city=Nakhon%20Ratchasima&state=Nakhon%20Ratchasima&country=Thailand&key=c97b1c11-d68f-4acc-9ac9-13f8673e2844",
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
// Decode JSON data to PHP associative array
$arr = json_decode($response, true);

echo $arr[data]['country'] 
$arr[data]['state'] 
$arr[data]['city'] 
  $arr[data]['location']['type']
  $arr[data]['location']['coordinates']
  $arr[current][weather]['ts']
  $arr[current][weather]['tp'];
echo $response;
  
} 

?>
</body>
</html>
