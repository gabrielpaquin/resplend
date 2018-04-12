<?php
/**
 * @author Gabriel Paquin <gabriel.paquin@hotmail.com>
 * @copyright Copyright (c)2016 – Flashbourg
 * Date: 2016-03-31
 * Le fichier de configuration s'occupe de:
 * - centraliser les paramètres du site comme la connexion à la BD
 * - définir un gestionnaire d'erreurs
 * - définir des fonctions utilitaires pour le déboguage et pour la sécurité (échapper les données client)
 */

// DEBUT Paramètres du site
$strCourrielContact= 'gabousto@msn.com';


// Verifier si l'exécution se fait sur le serveur de développement (local) ou celui de la production:
if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')) {
    $blnLocal = TRUE;
} else {
    $blnLocal = FALSE;
}

// (réglages pour le développement ou l'hébergement)

if ($blnLocal) {
    // (réglages pour le DÉVELOPPEMENT)
    // Affiche toutes les Errors, warnings, notices et syntaxes dépréciées
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', true);
} else {
    ini_set('display_errors', false);
}


// Selon l'environnement d'exécution (développement ou hébergement)

if ($blnLocal) {
    $strBdServer   = "localhost";
    $strBdUsername = "root";
    $strBdPassword = "";
    $strBdName     = "flashbourg";
} else {
    $strBdServer   = 'localhost';
    $strBdUsername = 'flashbourg';
    $strBdPassword = 'yumWoqueodpydday';
    $strBdName     = 'flashbourg_wp';
}

$objConnMySQLi = new mysqli($strBdServer,$strBdUsername,$strBdPassword,$strBdName);
$objConnMySQLi->query("SET CHARACTER SET utf8");
$objConnMySQLi->query("SET NAMES utf8");

// FIN paramètres du site


// DEBUT Gestion des erreurs et fonctions utilitaires
// (réglages pour le développement ou l'hébergement)

if ($blnLocal) {
    // (réglages pour le DÉVELOPPEMENT)
    // Affiche toutes les Errors, warnings, notices et syntaxes dépréciées
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', true);
} else {
    ini_set('display_errors', false);
}

try{
    $objConnMySQLi = new mysqli($strBdServer,$strBdUsername,$strBdPassword,$strBdName);

    if ($objConnMySQLi->connect_error) {
        $strMessage="La connexion à la base de données cause problème, réessayez plus tard.";
        $except = new Exception($strMessage);

        throw $except;
    }
    // les lignes suivantes forcent mysql à servir les données en utf8 (pour afficher les accents correctement)
    $objConnMySQLi->query("SET CHARACTER SET utf8");
    $objConnMySQLi->query("SET NAMES utf8");
}
catch(Exception $e){
    //echo $e->getMessage();
    //Ce message n'est pas récupéré puisqu'il y en aura un autre de généré de toute façon lors de l'appel du SQL.
}

// FIN paramètres du site


// DEBUT Gestion des erreurs et fonctions utilitaires

// Pour pouvoir utiliser de  manière fiable la fonction date(), dans le gestionnaire d'erreurs, il faut spécifier le fuseau horaire.
setlocale(LC_ALL, 'fr_FR');

/**
 * Creer le gestionnaire d'erreurs
 * @param $e_number
 * @param $e_message
 * @param $e_file
 * @param $e_line
 * @param $e_vars
 * @return void
 */
function gererErreurs ($e_number, $e_message, $e_file, $e_line, $e_vars) {
    // Construire le message d'erreur
    $strMessage = "Une erreur est survenue dans le script '$e_file' a la ligne $e_line: \n<br />$e_number : $e_message\n<br />";
    // Ajouter la date et l'heure
    $strMessage .= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";
    // Ajouter $e_vars au $strMessage.
    $strMessage .= "<pre>" . print_r ($e_vars, 1) . "</pre>\n<br />";
    if ($GLOBALS['blnLocal']) {
        echo '<p class="error">' . $strMessage . '</p>';
        error_log ($strMessage, 3, "log-err.txt");
    } else {
        error_log ($strMessage, 1, $GLOBALS['courrielContact']);
    }

    echo '<p class="error">' . $strMessage . '</p>';
}
// Utiliser le gestionnaire d'erreurs:
set_error_handler ('gererErreurs');

function escape_data ($strData) {
    // Besoin de la connexion:
    $GLOBALS["objConnMySQLi"];
    // Verifier Magic Quotes.
    if (ini_get('magic_quotes_gpc')) {
        $strData = stripslashes($strData);
    }
    // Trim et escape:
    return mysqli_real_escape_string($GLOBALS["objMySQLi"], trim($strData));
}
// FIN Gestion des erreurs et fonctions utilitaires