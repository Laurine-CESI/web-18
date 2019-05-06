<?php 

//Récupération des fichiers avec double extension du repertoire include
$content =glob('./includes/*.inc.php');

//Récupération du paramètre d'URL 'page'
$page = isset($_GET['page']) ? $_GET['page'] : ""; //ce chemin est comme la variable "if" et "else"

//Concaténation de la valeur récupérée pour avoir le bon chemin
$page = './includes/' . $page . '.inc.php' ;


// On vérifie si la chaine précédente est présente dans le tableau renvoyé par glob()
$page = in_array($page, $content) ?  $page :  './includes/home.inc.php';

// Inclusion de la page
require $page;