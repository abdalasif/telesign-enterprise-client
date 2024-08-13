<?php

require __DIR__ . "/../../vendor/autoload.php";

use telesign\enterprise\sdk\verify\VerifyClient;

$customerId = "FFFFFFFF-EEEE-DDDD-1234-AB1234567890";
$apikey = "EXAMPLE----TE8sTgg45yusumoN6BYsBVkh+yRJ5czgsnCehZaOYldPJdmFh6NeX8kunZ2zU1YWaUw/0wV6xfw==";
$recipient = ['phone_number' => 'phone_number'];

$verify = new VerifyClient($customerId, $apikey);
$response = $verify->createVerification($recipient);

print_r($response->json);

$response = $verify->verificationStatus($response->json['reference_id']);

print_r($response->json);

echo "Please enter the verification code you were sent: ";

$code = trim(fgets(STDIN));

$response = $verify->updateVerification($response->json['reference_id'], $code, 'finalize');

print_r($response->json);