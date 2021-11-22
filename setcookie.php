<?php

$nome_cookie="cookie_di_esempio";
$valore_cookie="sono un cookie inutile!";
$scadenza_cookie=time()+604800;
$dominio_cookie="itiseveripadova.gov.it";

setcookie($nome_cookie, $valore_cookie, $scadenza_cookie, "./", $dominio_cookie, false, true);

if(isset($_COOKIE["cookie_di_esempio"])){
    echo "Il cookie vale: ".$_COOKIE["cookie_di_esempio"];
} else {
    echo "Il cookie non esiste :(";
}
