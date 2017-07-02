<?php

class mgmt
{
    public function __construct($data, $tel)
    {
        $this->data = $data;
        $this->tel = $tel;
    }
    public function run()
    {
        $a = $this->data;
            if (isset($a['message']['new_chat_member'])) {
                $name = $a['message']['new_chat_member']['first_name'].(isset($a['message']['new_chat_member']['last_name']) ? " ".$a['message']['new_chat_member']['last_name'] : "");
                $nama_grup = $a['message']['chat']['title'];
                $this->tel->sendMessage("Hai {$name}, selamat bergabung di {$nama_grup}, jangan lupa memperkenalkan diri :D", $a['message']['chat']['id'], $a['message']['message_id']);
                die;
            };
        $name = $a['message']['from']['first_name'].(isset($a['message']['from']['last_name'])?' '.$a['message']['from']['last_name']:'');
        $user = $a['message']['from']['username'];
        $type = $a['message']['chat']['type'];
        $msg = isset($a['message']['text'])?$a['message']['text']:null;
$from = $a['message']['chat']['id'];
$rep = $a['message']['message_id'];
        
        if (strtolower(substr($msg, 0, 5))=="<?php") {
            $this->tel->sendMessage(str_replace(array("<br/>","/home/ice/public/.webhooks/telegram/kangesteh/php/"), array("\n","/tmp/php_virtual/"), (new Crayner_Machine())->php($name, substr($msg, 5))), $from, $rep);
        } elseif (strtolower(substr($msg, 0, 6))=="<?java") {
            $class_name = explode("class", $msg, 2);
            $class_name = explode("{", $class_name[1], 2);
            $class_name = trim($class_name[0]);
            if (file_exists($class_name.".java")) {
            	unlink($class_name.".java");
            }
            if (file_exists($class_name.".class")) {
            	unlink($class_name.".class");
            }
            file_put_contents($class_name.".java", substr($msg, 6));
            $compile = shell_exec("javac {$class_name}.java 2>&1");
            if (!$compile) {
                $run = shell_exec("java {$class_name} 2>&1");
            }
            if (isset($run)) {
            	if (empty($run)) {
            		$run = "~";
            	}
				print $this->tel->sendMessage($run, $from, $rep, array("parse_mode"=>null));
            } else {
                $compile = empty($compile) ? "Error pas compile bro!" : $compile;
                print $this->tel->sendMessage($compile, $from, $rep, array("parse_mode"=>null));
            }
        } else {
            $st = new AI();
            $st->prepare($msg);
            if ($st->execute($name, false, $from)) {
                $st = $st->fetch_reply();
                if (is_array($st)) {
                    var_dump($st);
                    var_dump($this->tel->sendPhoto($st[1],
                $from, $rep
                ));
                    echo $this->tel->sendMessage(
                $st[2],
                $from
                );
                } else {
                    echo    $this->tel->sendMessage(
                    $st,
                    $from,
                    $rep
                );
                }
            }
        }
    }
}
