<?php
include "httpful.phar";
$uri = "https://automl.googleapis.com/v1beta1/projects/wounddx/locations/us-central1/models/ICN6670781548460833353:predict -d @request.json";

$response = \Httpful\Request::get($uri)
 ->expectsJson()
 ->withXTrivialHeader('Authorization: Bearer $(54e358213496c4520f739ec028a2fd266c137b6c)')
    ->send();
echo $response;

//curl -X POST -H "Content-Type: application/json" \
  //-H "Authorization: Bearer $(gcloud auth application-default print-access-token)" \
 // https://automl.googleapis.com/v1beta1/projects/wounddx/locations/us-central1/models/ICN6670781548460833353:predict -d @request.json

?>
