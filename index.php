<?
include 'libs/vk_api.php';

$VK = new VK;
$VK->client_id = 'your_app_client_id';
$VK->token     = 'your_access_token';
$VK->v         = '5.63';

//print_r($VK->send_message_to_chat('99', 'Это сообщение отправлено ботом!'));
//print_r($VK->send_message_to_user('999999999', 'Это сообщение отправлено ботом!'));
?>
