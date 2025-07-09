<?php
require_once __DIR__.'/../includes/db.php';
$update = json_decode(file_get_contents('php://input'), true);
if(!$update){ exit; }
$message = $update['message']['text'] ?? '';
$chat_id = $update['message']['chat']['id'] ?? '';
if(stripos($message,'folio')===0){
    $folio = trim(substr($message,5));
    $stmt = $pdo->prepare("SELECT status FROM reports WHERE folio=?");
    $stmt->execute([$folio]);
    if($row = $stmt->fetch()){
        sendMessage($chat_id, "Estatus de $folio: {$row['status']}");
    } else {
        sendMessage($chat_id, 'Folio no encontrado');
    }
}
function sendMessage($chat_id,$text){
    $token = 'TOKEN_AQUI';
    $url = "https://api.telegram.org/bot$token/sendMessage";
    file_get_contents($url.'?chat_id='.$chat_id.'&text='.urlencode($text));
}
?>
