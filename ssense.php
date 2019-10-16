<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>SentinelAnalysis</title>
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

<form method="get" target="_blank">
	<input type="text" type="submit" name="q" maxlength="5000" required>       
        <button>Input words</button><br><br>
</form>
	
<?php
	
$strKeyword = $_GET["q"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.aiforthai.in.th/ssense?text=$strKeyword",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Apikey: lkEUrfOpTvUCOISqVdFDkm1KPyFpsLOz"
  )
));
 
$response = curl_exec($curl);
$err = curl_error($curl);
 
curl_close($curl);
 
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
   $arr = json_decode($response, true);
     echo "ข้อความที่ใช้ประเมิน คือ " .$arr[@preprocess]['input'].  "<br>", 
     "ข้อความดังกล่าวมีแนวโน้มแนวโน้ม " .$arr[@sentiment]['polarity'].  " ด้วยความเชื่อมั่นร้อยละ " .$arr[@sentiment]['score']. ;      
}
?>
</body>
</html>
