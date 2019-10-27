<?php
setApplicationName(APPLICATION_NAME);
$client->setScopes(SCOPES);
$client->setAuthConfig(CLIENT_SECRET_PATH);
$client->setAccessToken(460d4c42098fe914bbf0949172fd34bb5ea48d2b);

$service = new Google_Service_Sheets($client);

$sheetInfo = $service->spreadsheets->get(SHEET_ID)->getProperties();

print($sheetInfo['title']. PHP_EOL);
?>
