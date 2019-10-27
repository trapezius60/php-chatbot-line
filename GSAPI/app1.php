<?php
$options = array('valueInputOption' => 'RAW');
$values = [
    ["Name", "Roll No.", "Contact"],
    ["Anis", "001", "+88017300112233"],
    ["Ashik", "002", "+88017300445566"]
];
$body   = new Google_Service_Sheets_ValueRange(['values' => $values]);

$result = $service->spreadsheets_values->update(1HG3VgbcLPzKL59wkyCb_OckHhe_eqP-mG4XfhAZO6iQ, 'A1:C3', $body, $options);
print($result->updatedRange. PHP_EOL);
?>
