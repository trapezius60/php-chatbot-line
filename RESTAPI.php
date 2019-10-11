<?php
include "httpful.phar";
$uri = "https://maps.googleapis.com/maps/api/geocode/json?address=Bangkok";

$response = \Httpful\Request::get($uri)->send();
echo $response;

curl -X POST -H "Content-Type: application/json" \
  -H "Authorization: Bearer $(gcloud auth application-default print-access-token)" \
  https://automl.googleapis.com/v1beta1/projects/wounddx/locations/us-central1/models/ICN6670781548460833353:predict -d @request.json

?>
