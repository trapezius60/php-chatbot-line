<?php  ob_start();  ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>GenerateQRcode</title>
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
if(@$_POST['q']) {
	if($_POST['inputword'] == "") {
echo "No Word";	
exit('</body></html>');
		ob_end_flush();
	} else {
		
	 //sentinel analysis 
$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.aiforthai.in.th/ssense?text=$inputwords",
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
  echo $response;
  
  $arr = json_decode($response, true);
     echo 
     "คำที่ใช้ประเมิน " .$arr[preprocess]['input']. "<br>", 
     "ความเชื่อมั่น (%) " .$arr[sentiment]['score']. "<br>",
      "เป็นลบ " .$arr[sentiment]['polarity-neg']. "<br>", 
      "เป็นบวก " .$arr[sentiment]['polarity-pos']. "<br>", 
      "แนวโน้ม " .$arr[sentiment]['polarity']. "<br>"; 
}
?>
<form method="post" target="_blank">
	<input type="text" name="q" maxlength="5000" required> 
    <button>Input words</button><br><br>
}
}
    
</form>
</body>
</html>
<?php  ob_end_flush();  ?>
