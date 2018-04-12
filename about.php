<?php
/**
 * Créé par Maison Sagan
 * Développeur: Gabriel Paquin
 * Date: 13-03-18
 */

//Variable de niveau
$strNiveau="";
$page="about";
$pageMenu="About";

//Variable twig relative à la page pour envoyer au head ou à d'autres templates
$title="Resplend";

//Inclusions nécessaires
require_once($strNiveau . 'inc/lib/Twig/Autoloader.php');
//require_once($strNiveau . 'inc/scripts/config.inc.php');


//Configuration de Twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($strNiveau . 'pages');

$twig = new Twig_Environment($loader, array(
    'cache'=> false,
    'debug'=>true
));


require_once($strNiveau . 'inc/pieces/header.php');



//Instanciation du template
$template = $twig->loadTemplate('about/index.html.twig');
    $child = $twig->loadTemplate('pieces/header.html.twig');
    $childRender=$child->render(array('niveau'=>$strNiveau));

//Affichage du template principal
echo $template->render(array(
    //Insérez vos variable à envoyer ici
    'niveau'=>$strNiveau,
    'title'=>$title,
    'page'=>$page,
    'header'=>$childRender,

));

