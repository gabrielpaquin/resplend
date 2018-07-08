<?php

$validerPageActive = new Twig_SimpleFunction('validerPageActive', function($strItem,$strPageActive){
    if($strItem == $strPageActive){
        $classe="page-active";
    }else{
        $classe="";
    }
    return $classe;
});
$twig->addFunction($validerPageActive);