<?
include 'vk_api.php';

$account = new VK;
$account->client_id = 'your_app_client_id';
$account->token     = 'your_access_token';
$account->v         = '5.63';

//Для получения access_token
//print_r($account->get_token_link());

//Сообщения
//  Для пользователей
//    print_r($account->send_message_to_user('999999999', 'Это сообщение отправлено ботом!'));
//    print_r($account->send_sticker_to_user('999999999', 1));
//  Для бесед/чатов
//    print_r($account->send_message_to_chat('99', 'Это сообщение отправлено ботом!'));
//    print_r($account->send_sticker_to_chat('99', 1));
?>
