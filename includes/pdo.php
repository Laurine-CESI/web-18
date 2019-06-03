<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=cartes','root','',
    array(
        // Définition du jeu d'encodage de caractères
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        // Façon dont une récupère les jeux d'enregistrement (sous forme d'objet)
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        // Niveau d'erreurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

}
// Si l'instanciation de l'objet $pdo ne fonctionne pas, levée d'exception
catch(PDOException $e)  {
    // Affichage du message d'erreur
    echo "Erreur de connexion :" . $e->getMessage(); 
}
