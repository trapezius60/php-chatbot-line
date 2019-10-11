<?php
include "httpful.phar";
$uri = "https://maps.googleapis.com/maps/api/geocode/json?address=Bangkok";
$response = \Httpful\Request::get($uri)->send();
echo $response;
?>
