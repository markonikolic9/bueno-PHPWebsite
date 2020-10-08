<?php

define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/bueno");

define("LOG_FAJL", ABSOLUTE_PATH."/data/log.txt");

function zabeleziPristupStranici(){
    $open = fopen(LOG_FAJL, "a");
    if($open){
        $date = date('d-m-Y H:i:s');
        fwrite($open, "{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
        fclose($open);
    }
}

zabeleziPristupStranici();