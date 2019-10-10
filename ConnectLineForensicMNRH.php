<?php
$url = parse_url(getenv("mysql://b4d4ed34e9b742:e8ba9c70@us-cdbr-iron-east-05.cleardb.net/heroku_04736a2bbd78072?reconnect=true"));

$server = $url["us-cdbr-iron-east-05.cleardb.net"];
$username = $url["b4d4ed34e9b742"];
$password = $url["e8ba9c70"];
$db = substr($url["heroku_04736a2bbd78072"], 1);

$conn = new mysqli($server, $username, $password, $db);
?>
