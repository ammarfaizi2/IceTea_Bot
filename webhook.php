<?php
ignore_user_abort(true);
ini_set("max_execution_time", false);
ini_set("memory_limit", "100G");
set_time_limit(0);
header("Content-type:application/json");
is_dir("data") or mkdir("data");
require __DIR__."/loader.php";
$wb = json_decode(file_get_contents("php://input"), true);
#file_put_contents("text.txt", json_encode($wb,128));
#print_r($wb);
$app = new mgmt($wb, new Telegram("308645660:AAG-EIkc2qgXsJ2zRk8A4fAREOKXUxKuxM8"));
$app->run();
