<?php

$curl = curl_init();
 
curl_setopt_array($curl, array(
CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_1480_1579254770/agg?dsname=vir_1480_1579254770&path=vir_1480_1579254770&aggf=count&agg_prop=col_2&groupby=col_7&property=col_5&operator=GT&valueLiteral=10000000&loadAll=1&type=json&limit=100&offset=0",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
 "api-key:tg2XPZo23UOjWWWpNpCRIejyQyvbIzKf"
),
));
 
$response = curl_exec($curl);
$err = curl_error($curl);
 
curl_close($curl);
 
if ($err) {
echo "cURL Error #:" . $err;
} else {

 // Decode JSON data to PHP associative array
//$arr = json_decode($response, true);
 echo $response;
 echo $arr;
}
?>
