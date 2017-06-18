<?php
include "../Crayner_Machine.php";
$a = Crayner_Machine::qurl("https://translate.google.com/translate_tts?ie=UTF-8&q=apa+kabar&tl=id-ID&client=tw-ob",null,null,array(CURLOPT_USERAGENT=>"Mozilla/5.0",52=>true));
file_put_contents("a.mp3",$a);