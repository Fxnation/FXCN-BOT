<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if($message == "/start") {
    sendMessage($chat_id, "What can this bot do and offer! Allows you to earn FXCoin by tapping on the FXCN image,complete task,invite friends and get rewarded.Welcome shareholders to your tap to earn bot CEO:Adebayo david");
}

function sendMessage($chat_id, $message) {
    $apiToken = "7690925310:AAGlIKUhlpjRDl2CsaPL-TTUqF8YB2aQGqw";
    $url = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chat_id&text=".urlencode($message);
    file_get_contents($url);
}
?>
