<?
include 'libs/vk_api.php';

$account = new VK;
$account->client_id = '5956974';
$account->token     = 'cfefc92e48c597a6491ed71bb040c16ecfe867e4a80ab9fe0e59da646f68e8d5e29cfcc607bfcbb11fbfe';
$account->v         = '5.63';

//print_r($account->send_message_to_chat('55', 'Это сообщение отправлено моим ботом!'));
//print_r($account->send_message_to_user('152498015', 'Это сообщение отправлено моим ботом!'));
?>