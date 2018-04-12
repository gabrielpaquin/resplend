<?php
/**
 **  Function validerPageActive
 **	@author Gabriel Paquin, mars 2016
 **	@desc Fonction qui s'occupe de mettre le lien de la page courante actif (ajout de classe)
 **	@param strItem  String  la page à comparer
 **	@param strPageActive String la page réellement active
 **  @return classe String  la classe de la page active, ou vide
 **/
$validerPageActive = new Twig_SimpleFunction('validerPageActive', function($strItem,$strPageActive){
    if($strItem == $strPageActive){
        $classe="page-active";
    }else{
        $classe="";
    }
    return $classe;
});
$twig->addFunction($validerPageActive);