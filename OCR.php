
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="">
    <meta name="author" content="">
<head>
	<title>OCR-AI</title>
</head>
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
		width: 20px;
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
<body>
	<form enctype="multipart/form-data" action="http://203.151.81.80:7900/upload" method="post">
		<input type="file" name="uploadfile" />
		<input type="hidden" name="token" value="685c169da3b2a9d653397ec17b7bd8bb"/>
		<input type="submit" value="upload" />
       </form>
</body>

</html>
<?php
 
$curl = curl_init();
$img_file = ("img.jpg");
$data = array("uploadfile" => new CURLFile($img_file, mime_content_type($img_file), basename($img_file)));
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.aiforthai.in.th/ocr",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: multipart/form-data",
    "apikey: lkEUrfOpTvUCOISqVdFDkm1KPyFpsLOz"
  )
));
 
$response = curl_exec($curl);
$err = curl_error($curl);
 
curl_close($curl);
 
if ($err) {
  echo "cURL Error #:" . $err;
} else {
$arr = json_decode($response, true);
  echo $arr;
}
?>
