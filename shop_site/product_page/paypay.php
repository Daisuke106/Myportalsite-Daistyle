<?php
use PayPay\Api\Client;
use PayPay\Api\QrCode\CreateQrCodePayload;
use PayPay\Api\QrCode\OrderItem;

// Initialize the PayPay SDK
$client = new PayPay\OpenPaymentAPI\Client([
    'API_KEY' => 'a_vSXIG5i3Uh_1nEF',
    'API_SECRET' => '4zXNCqR6pQ0iuGTKvuD5u76HIFSHQz/aeDHYbCwavSE=',
], false); // Set production_mode to false for the sandbox environment

// Create a QR code payload
$CQCPayload = new \PayPay\OpenPaymentAPI\Models\CreateQrCodePayload();

// Set a unique transaction ID for the merchant
$CQCPayload->setMerchantPaymentId("YOUR_TRANSACTION_ID");

// Set the requested time (optional)
$CQCPayload->setRequestedAt(time());

// Specify the QR code type
$CQCPayload->setCodeType("ORDER_QR");

// Provide order details for invoicing
$OrderItems = [];
$OrderItems[] = (new \PayPay\OpenPaymentAPI\Models\OrderItem())
    ->setName('Cake')
    ->setQuantity(1)
    ->setUnitPrice(['amount' => 20, 'currency' => 'JPY']); // Corrected the syntax here
$CQCPayload->setOrderItems($OrderItems);

// Set the total amount and currency
$amount = [
    "amount" => 20, // Corrected the amount to match the item price
    "currency" => "JPY"
];
$CQCPayload->setAmount($amount);

// Configure redirects
$CQCPayload->setRedirectType('WEB_LINK');
$CQCPayload->setRedirectUrl($_SERVER['SERVER_NAME']);

// Get data for the QR code
$response = $client->code->createQRCode($CQCPayload);

$data = $response['data'];
?>
