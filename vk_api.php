<?
class VK {
	var $token;
	var $v;

	var $client_id;
	var $scope = array(
		'friends',
		'photos',
		'audio',
		'video',
		'pages',
		'status',
		'notes',
		'messages',
		'offline',
		'docs',
		'groups',
		'email'
	);

	public function get_token_link(){
		if($this->client_id==''){
			return 'В классе отсутствует client_id!'."\n";
		}elseif($this->scope==''){
			return 'В классе отсутствует scope!'."\n";
		}elseif($this->v==''){
			return 'В классе отсутствует v!'."\n";
		}else{
			return 'https://oauth.vk.com/authorize?client_id='.$this->client_id.'&display=popup&response_type=token&v='.$this->v.'&scope='.implode(',', $this->scope)."\n";
		}
	}

	//Отправка сообщения
	private function send($user_id='', $peer='', $domain='', $chat_id='', $user_ids='', $message='', $lat='', $long='', $attachment='', $forward_messages='', $sticker_id='') {
		if($this->token==''){
			return 'В классе отсутствует access_token!';
		}elseif($this->v==''){
			return 'В классе отсутствует v!';
		}else{
		    $url = 'https://api.vk.com/method/messages.send';

		    $params = array();

		    if($user_id!=''){$params['user_id'] = $user_id;};
		    if($peer!=''){$params['peer']    = $peer;};
		    if($domain!=''){$params['domain']  = $domain;};
		    if($chat_id!=''){$params['chat_id']  = $chat_id;};
		    if($user_ids!=''){$params['user_ids']  = $$user_ids;};
		    if($message!=''){$params['message'] = $message;};
		    if($lat!=''){$params['lat']  = $lat;};
		    if($long!=''){$params['long']  = $long;};
		    if($attachment!=''){$params['attachment']  = $attachment;};
		    if($forward_messages!=''){$params['forward_messages']  = $forward_messages;};
		    if($sticker_id!=''){$params['sticker_id']  = $sticker_id;};
		
			$params['access_token'] = $this->token;
			$params['v']            = $this->v;

		    $result = file_get_contents($url, false, stream_context_create(array(
		        'http' => array(
		            'method'  => 'POST',
		            'header'  => 'Content-type: application/x-www-form-urlencoded',
		            'content' => http_build_query($params)
		        )
		    )));
		    $result = json_decode($result, true);
		    if(!isset($result['error'])){
		    	return $result['response']."\n";
		    }else{
		    	return "Ошибка!!!\n".$result."\n";
		    }
		}
	}

	//Отправка текстового сообщения пользователю
	public function send_message_to_user($user_id='', $message=''){
	    if($user_id==''){
	    	return 'Ожидается user_id!'."\n";
	    }elseif($message==''){
	    	return 'Ожидается message!'."\n";
	    }else{
	    	$result = $this->send($user_id,'','','','',$message);
	    	return $result."\n";
	    }
	}

	//Отправка текстового сообщения в беседу
	public function send_message_to_chat($chat_id='', $message=''){
	    if($chat_id==''){
	    	return 'Ожидается chat_id!'."\n";
	    }elseif($message==''){
	    	return 'Ожидается message!'."\n";
	    }else{
	    	$result = $this->send('','','',$chat_id,'',$message);
	    	return $result."\n";
	    }
	}

	//Отправка стикера пользователю
	public function send_sticker_to_user($user_id='', $sticker_id=''){
	    if($user_id==''){
	    	return 'Ожидается user_id!'."\n";
	    }elseif($sticker_id==''){
	    	return 'Ожидается sticker_id!'."\n";
	    }else{
	    	$result = $this->send($user_id,'','','','','','','','','',$sticker_id);
	    	return $result."\n";
	    }
	}

	//Отправка стикера в беседу
	public function send_sticker_to_chat($chat_id='', $sticker_id=''){
	    if($chat_id==''){
	    	return 'Ожидается chat_id!'."\n";
	    }elseif($sticker_id==''){
	    	return 'Ожидается sticker_id!'."\n";
	    }else{
	    	$result = $this->send('','','',$chat_id,'','','','','','',$sticker_id);
	    	return $result."\n";
	    }
	}
}
?>
