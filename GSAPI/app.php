<?php
setApplicationName(APPLICATION_NAME);
$client->setScopes(SCOPES);
$client->setAuthConfig(GSAPI/sheets_api_secret.json);
$client->setAccessToken(460d4c42098fe914bbf0949172fd34bb5ea48d2b);

$service = new Google_Service_Sheets($client);

$sheetInfo = $service->spreadsheets->get(1HG3VgbcLPzKL59wkyCb_OckHhe_eqP-mG4XfhAZO6iQ)->getProperties();

print($sheetInfo['title']. PHP_EOL);
?>
