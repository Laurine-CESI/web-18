<?php

/*
$version ="7";
$message = '<h1>Je fais du PHP' . $version . '</h1>';
echo $message;

//Utilisation des constantes
define('TVAxPlein', 0.2);
echo TVAxPlein;

*/

$resultat = '<ul>';
for ($i = -12328; $i <= 23456 ; $i = $i += 7) {
    if ( $i % 5 == 0){
        $resultat .= '<li>' . $i . '</li>' ;
    }
    

}

$resultat .= '</ul>';

echo $resultat;


