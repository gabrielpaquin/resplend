<?php
/**
 * @todo la localisation: Vérifier le choix de langue de l'usager à partir de querystring & cookie;
 * @todo regénérer avec POedit les fichiers .po pour compléter la localisation
 */

$lang='fr';

if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}

if($lang=='fr') {
    $strlang='fr_CA';
} else {
    $strlang='en_CA';
}
$strfilename = 'default';
putenv("LC_ALL=$strlang");
setlocale(LC_ALL, $strlang . '.UTF-8');
bindtextdomain($strfilename, './locale');
textdomain($strfilename);

