<?php
/**
*		@author Ammar Faizi <ammarfaizi2@gmail.com>
* @license RedAngel PHP Concept 2017
*		@package Bot_Telegram
*
*/
class Telegram extends Crayner_Machine
{
	public function __construct($token)
	{
		$this->url = "https://api.telegram.org/bot{$token}/";
	}
	private function merge($p1,$p2)
	{
		$p = $p1;
		foreach($p2 as $a => $b){
			$p[$a] = $b;
		}
		return $p;
	}
	public function sendMessage($text,$to,$reply=null,$op=null)
	{
		$post = array(
		 'chat_id'=>$to,
		 'text'=>str_replace("<br />",PHP_EOL,$text),
		 'parse_mode'=>'HTML'
		);
		isset($reply) and $post['reply_to_message_id'] = $reply;
		if(is_array($op)){
			$post = $this->merge($post,$op);
		}
		return $this->qurl($this->url."sendMessage",null,$post);
	}
	public function sendPhoto($photo,$to,$reply=null,$op=null)
	{
		if(is_string($photo)){
			if(!(strpos($photo,"http://")!==false) and !(strpos($photo,"https://")!==false)){
				$photo = new CurlFile(realpath($photo));
			}
		}
		$post = array(
				'chat_id'=>$to,
				'photo'=>$photo,
		);
		isset($reply) and $post['reply_to_message_id'] = $reply;
		if(is_array($op)){
			$post = $this->merge($post,$op);
		}
		return $this->qurl($this->url.'sendPhoto',null,$post);
	}
}