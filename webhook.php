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


/*$wb = json_decode('{
    "update_id": 174643675,
    "message": {
        "message_id": 3245,
        "from": {
            "id": 243692601,
            "first_name": "Ammar",
            "last_name": "Faizi",
            "username": "ammarfaizi2",
            "language_code": "en-US"
        },
        "chat": {
            "id": 243692601,
            "first_name": "Ammar",
            "last_name": "Faizi",
            "username": "ammarfaizi2",
            "type": "private"
        },
        "date": 1498968764,
        "text": "<?java public class suh{\npublic static void main(String args....){}\n}"
    }
}', true);*/

$app = new mgmt($wb, new Telegram("308645660:AAG-EIkc2qgXsJ2zRk8A4fAREOKXUxKuxM8"));
$app->run();
