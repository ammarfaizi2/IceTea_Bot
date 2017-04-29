<?php
require("class/Crayner_Machine.php");
require("class/Telegram.php");
require("class/AI.php");	
$a=new Telegram("348646582:AAFJoLLmDhpToduqBIYLTE9TbJjZslzMmOg");
$b=$a->getUpdates();
