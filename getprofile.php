<?php
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('uIfXTdOs2WFb2VfU56NOG6eTt+Ev+PIRVslbjrAql39hROBQsrWje3/5ft3yzeVRBxb0bVtCyUB1VggK7g/nCXp2/QulDHYRbmSMgW24/+mLTqWdA3L9fbiWGi2P6Dw5c6/MuqdFRLgFsDKPUiMFHgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '60920e3896aab76f16ff68a0756076cd]');
$response = $bot->getProfile('U27d5ff719ac64281338007b2bc3c4307');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}
?>
