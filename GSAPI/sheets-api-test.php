<?php

session_start();
include_once "google-api-php-client/examples/templates/base.php";

/************************************************
  Make an API request authenticated with a service
  account.
 ************************************************/
require_once realpath(dirname(__FILE__) . '/google-api-php-client/src/Google/autoload.php');

$client_id = '108650899137695060641';
$service_account_name = 'gsapi-332@praxis-wall-257209.iam.gserviceaccount.com';  // email address
$key_file_location = 'download your own.p12'; //key.p12

echo pageHeader("Service Account Access");
if (strpos($client_id, "googleusercontent") == false
    || !strlen($service_account_name)
    || !strlen($key_file_location)) {
  echo missingServiceAccountDetailsWarning();
  exit;
}

$client = new Google_Client();
$client->setApplicationName("Sheets API Testing");
$service = new Google_Service_Drive($client);

/************************************************
  If we have an access token, we can carry on.
  Otherwise, we'll get one with the help of an
  assertion credential. In other examples the list
  of scopes was managed by the Client, but here
  we have to list them manually. We also supply
  the service account
 ************************************************/
if (isset($_SESSION['service_token'])) {
  $client->setAccessToken($_SESSION['service_token']);
}
$key = file_get_contents($key_file_location);
$cred = new Google_Auth_AssertionCredentials(
    $service_account_name,
    array('https://www.googleapis.com/auth/drive','https://spreadsheets.google.com/feeds'),
    $key
);
$client->setAssertionCredentials($cred);
if ($client->getAuth()->isAccessTokenExpired()) {
  $client->getAuth()->refreshTokenWithAssertion($cred);
}
$_SESSION['service_token'] = $client->getAccessToken();

// Get access token for spreadsheets API calls
$resultArray = json_decode($_SESSION['service_token']);
$accessToken = $resultArray->access_token;

// The file ID was copied from a URL while editing the sheet in Chrome
$fileId = '1HG3VgbcLPzKL59wkyCb_OckHhe_eqP-mG4XfhAZO6iQ';

// Section 1: Uncomment to get file metadata with the drive service
// This is also the service that would be used to create a new spreadsheet file
// $results = $service->files->get($fileId);
// var_dump($results);

// Section 2: Uncomment to get list of worksheets
// $url = "https://spreadsheets.google.com/feeds/worksheets/$fileId/private/full";
// $method = 'GET';
// $headers = ["Authorization" => "Bearer $accessToken"];
// $req = new Google_Http_Request($url, $method, $headers);
// $curl = new Google_IO_Curl($client);
// $results = $curl->executeRequest($req);
// echo "$results[2]\n\n";
// echo "$results[0]\n";

// Section 3: Uncomment to get the table data
// $url = "https://spreadsheets.google.com/feeds/list/$fileId/od6/private/full";
// $method = 'GET';
// $headers = ["Authorization" => "Bearer $accessToken", "GData-Version" => "3.0"];
// $req = new Google_Http_Request($url, $method, $headers);
// $curl = new Google_IO_Curl($client);
// $results = $curl->executeRequest($req);
// echo "$results[2]\n\n";
// echo "$results[0]\n";

// Section 4: Uncomment to add a row to the sheet
$url = "https://spreadsheets.google.com/feeds/list/$fileId/od6/private/full";
$method = 'POST';
$headers = ["Authorization" => "Bearer $accessToken", 'Content-Type' => 'application/atom+xml'];
$postBody = '<entry xmlns="http://www.w3.org/2005/Atom" xmlns:gsx="http://schemas.google.com/spreadsheets/2006/extended"><gsx:gear>more gear</gsx:gear><gsx:quantity>99</gsx:quantity></entry>';
$req = new Google_Http_Request($url, $method, $headers, $postBody);
$curl = new Google_IO_Curl($client);
$results = $curl->executeRequest($req);
echo "$results[2]\n\n";
echo "$results[0]\n";
