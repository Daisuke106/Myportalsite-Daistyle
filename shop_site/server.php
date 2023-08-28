<?php
header("Access-Control-Allow-Origin: *"); // CORS ヘッダーを設定

$postalCode = $_GET["postalCode"]; // JavaScript からのパラメータを取得

$apiUrl = "https://postcode-jp.com/api/v1/postcodes/{$postalCode}";
$response = file_get_contents($apiUrl);

// APIレスポンスがHTMLの場合に対処する
if (strpos($response, "<!DOCTYPE html>") !== false) {
    echo json_encode(array("error" => "API response is not valid JSON"));
} else {
    echo $response; // API レスポンスをそのまま返す
}
?>
