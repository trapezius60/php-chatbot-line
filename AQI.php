<?php  ob_start();  ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>AQI-Korat</title>
<style>
	* {
		font: 14px tahoma;
	}
	body {
		background: url(bg.jpg);
		text-align: center;
	}
	form {
		display: inline-block;
		margin: 20px auto;
		text-align: left;
	}
	[type=text]  {
		width: 200px;
		background: #ffc;
		border: solid 1px gray;
		border-right: none !important; 
		border-radius: 4px 0px 0px 4px; 
		margin-right: -3px;
		padding-left: 3px;
		padding-right: 5px;
		height: 24px;
		margin-bottom: 5px;
	}
	button {
		background: #f60;
		color: white;
		border: solid 1px gray;
		border-left: none !important; 
		border-radius: 0px 4px 4px 0px; 
		font-weight: bold;
		margin-left: -3px; 
		height: 28px;
	}
	button:hover {
		color: aqua;
	}
</style>
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

echo "ประเทศ " .$arr[data]['country']. "<br>",
      "จังหวัด " .$arr[data]['state']. "<br>", 
       "เมือง " .$arr[data]['city']. "<br>",
       //"ตำแหน่ง " .$arr[data]['location']['type']. "<br>",
        
         "วันที่-เวลา (UTC) ถ้าของไทยต้อง UTC+7 hr. update ทุก 1 hr. " .$arr[data][current][weather]['ts']. "<br>",
        //"สภาพอากาศ:: ". "<br>",
            "อุณหภูมิ (เซลเซียส) " .$arr[data][current][weather]['tp']. "<br>",
            "ความชื้น (%) " .$arr[data][current][weather]['hu']. "<br>",
          "AQI:: ". "<br>",
            "AQI (US AQI) " .$arr[data][current][pollution]['aqius'];
	
	$recommendMod = " *ข้อแนะนำ:: อากาศเริ่มมีมลภาวะมากกว่าปกติ แต่ใช้ชีวิตกลางแจ้งได้ตามปกติ แต่บุคคลที่เป็นภูมิแพ้อากาศควรหลีกเลี่ยงอากาศนอกอาคาร ";
	$recommendSevere = " **ข้อแนะนำ:: อากาศมีมลภาวะแย่กว่าปกติ อยู่นอกอาคารควรใส่หน้ากาก ลดออกกำลังกายกลางแจ้ง และเปิดเครื่องฟอกอากาศในอาคาร ";
	$recommendUnhealthy = " ***ข้อแนะนำ:: อากาศเริ่มทำให้สุขภาพแย่ลง งดออกกำลังกลางแจ้ง ใส่หน้ากากตลอดเวลาเมื่ออยู่นอกบ้าน ";
	$recommendHazadous = " ****ข้อแนะนำ:: อากาศแย่มาก ห้ามออกกำลังกายกลางแจ้ง ใส่หน้ากากตลอดเวลาที่อยู่นอกบ้าน ควรปิดหน้าต่างและประตูให้มิดชิด เปิดเครื่องฟอกอากาศ ";
	
if($arr[data][current][pollution]['aqius']>"50"){
	$str =  "AQI (US AQI) = " .$arr[data][current][pollution]['aqius'].  $recommendMod. "   [ค่า AQI อยู่ระหว่าง 0-500, ค่าเกิน 50 ถือว่าอากาศคุณภาพเริ่มไม่ดี, ค่าเกิน 300 ถือว่า อันตรายร้ายแรง (hazardous); ศึกษาเพิ่มเติม >>> https://support.airvisual.com/en/articles/3029425-what-is-aqi]";
}elseif ($arr[data][current][pollution]['aqius']>"100") {
	$str =  "AQI (US AQI) = " .$arr[data][current][pollution]['aqius'].  $recommendSevere. "   [ค่า AQI อยู่ระหว่าง 0-500, ค่าเกิน 50 ถือว่าอากาศคุณภาพเริ่มไม่ดี, ค่าเกิน 300 ถือว่า อันตรายร้ายแรง (hazardous); ศึกษาเพิ่มเติม >>> https://support.airvisual.com/en/articles/3029425-what-is-aqi]";
}elseif ($arr[data][current][pollution]['aqius']>"150") {
	$str =  "AQI (US AQI) = " .$arr[data][current][pollution]['aqius']. $recommendUnhealthy. "   [ค่า AQI อยู่ระหว่าง 0-500, ค่าเกิน 50 ถือว่าอากาศคุณภาพเริ่มไม่ดี, ค่าเกิน 300 ถือว่า อันตรายร้ายแรง (hazardous); ศึกษาเพิ่มเติม >>> https://support.airvisual.com/en/articles/3029425-what-is-aqi]";
}elseif ($arr[data][current][pollution]['aqius']>"300") {
	$str =  "AQI (US AQI) = " .$arr[data][current][pollution]['aqius'].  $recommendHazadous. "   [ค่า AQI อยู่ระหว่าง 0-500, ค่าเกิน 50 ถือว่าอากาศคุณภาพเริ่มไม่ดี, ค่าเกิน 300 ถือว่า อันตรายร้ายแรง (hazardous); ศึกษาเพิ่มเติม >>> https://support.airvisual.com/en/articles/3029425-what-is-aqi]";
} 
}
define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "Ei5KLzQrNizl4HZfnQIFzKQeAZYoNYUUzcsWgSX5BWu"; //ใส่Token ที่copy เอาไว้
//$str = $response;


	
$res = notify_message($str,$token);
print_r($res);
function notify_message($message,$token){
 $image_thumbnail_url = 'https://downloads.intercomcdn.com/i/o/124829723/8c0318000b236dcee232bfbd/upload_17692440330381041827.png';
//$image_fullsize_url = $photo; //max size 1024x1024px JPEG
 $queryData = array('imageThumbnail' => $image_thumbnail_url,'message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 //return $res;

}
//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f

?>
  <p> <a href = "https://www.airvisual.com/thailand/nakhon-ratchasima" target = "_blank">Link AQI visual</p> 
</body>
</html>
