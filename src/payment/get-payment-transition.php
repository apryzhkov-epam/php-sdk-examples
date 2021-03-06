<?php
require_once (dirname(__FILE__) . '/../../vendor/autoload.php');

$username = $argv[1];
$password = $argv[2];
$programToken = urldecode($argv[3]);
$paymentToken = urldecode($argv[4]);
$transitionToken = urldecode($argv[4]);

$hyperwallet = new \Hyperwallet\Hyperwallet($username, $password);

try {
    $paymentStatus = $hyperwallet->getPaymentStatusTransition($paymentToken, $transitionToken);
    echo Utils\Utils::toJson($paymentStatus);
    echo "\n";
} catch (\Hyperwallet\Exception\HyperwalletException $e) {
    echo "ERROR:\n";
    echo $e->getMessage();
    die("\n");
}