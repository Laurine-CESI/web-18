<?php 

if (isset($_POST['validation'])) {
    // Récupération des éléments du formulaire.
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "" ;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "" ;
    $email = isset($_POST['email']) ? $_POST['email'] : "" ;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "" ;

    // Initialisation d'un tableau vide.
    $erreur = array();


    // Vérification des champs (remplis ou non).
    if($nom == "") array_push($erreur, "Veuillez saisir un nom");
    if($prenom == "") array_push($erreur, "Veuillez saisir un prenom");
    if($email == "") array_push($erreur, "Veuillez saisir un mail");
    if($mdp == "") array_push($erreur, "Veuillez saisir un mot de passe");

    // On vérifie si le tableau d'erreur est vide ou non. Fonction "count" uniquement dédié au tableau.
    if(count($erreur) > 0){

        $msgErreur ="<ul>";

        for ($i = 0 ; $i < count($erreur) ; $i++) {
            $msgErreur .= "<li>" . $erreur[$i] . "</li>" ;
        }

        $msgErreur .="</ul>";

        echo $msgErreur;
        require_once 'frmRegistration.php';

    }

    // Insertion en BDD

    else{
        // Préparation de la requête SQL pour compter le nombre d'occurence(fois) avec l'adresse mail
        $checkMail="SELECT COUNT(*) FROM t_users WHERE usemail='" . $email ."'";
        // DIE :  Fonction qui permet d'afficher le contenu, et permet de faire un point d'arrêt dans le code
        // die($checkMail);

        // Execution de la requête
        $nombreOccurences = $pdo->query($checkMail)->fetchColumm();
    }

}

else  {

    require_once 'frmRegistration.php';

}

