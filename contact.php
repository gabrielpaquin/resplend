<?php
/**
 * Créé par Maison Sagan
 * Développeur: Gabriel Paquin
 * Date: 13-03-18
 */

//Variable de niveau
$strNiveau="";
$page="contact";
$pageMenu="Contact";

//Variable twig relative à la page pour envoyer au head ou à d'autres templates
$title="Resplend";

//Inclusions nécessaires
require_once($strNiveau . 'inc/lib/Twig/Autoloader.php');
require_once($strNiveau . 'inc/lib/Savant3.class.php');
require_once($strNiveau . 'inc/scripts/config.inc.php');


// Instancier, configurer et afficher le template

$arrConfigTpl = array(
    'template_path' => array($strNiveau.'pages', $strNiveau.'pages/pieces')
);
$objTpl = new Savant3($arrConfigTpl);


$objTpl->niveau = $strNiveau;
//Assigner des données comme attributs du template
$objTpl->title = $title;
$objTpl->page = $page;
$objTpl->lang = $lang;
//$objTpl->varLang = $langAffichage;

// Définir les composantes de la page avec la méthode fetch

$objTpl->page=$page;
$objTpl->header=$objTpl->fetch('header.tpl.php');
$objTpl->footer=$objTpl->fetch('footer.tpl.php');


// Afficher le template principal
$objTpl->display('contact/index.tpl.php');

