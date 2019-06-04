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
        $nombreOccurences = $pdo->query($checkMail)->fetchColumn();

        if ($nombreOccurences == 0){

            // Hashage du mot de passe avec la fonction password_hash
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);

            // str_shuffle mélange les caractères d'une chaîne
            // date ('YmdHis') renvois 20190603170132
            // rand() génère un nombre aléatoire
            $maurice = str_shuffle(date('YmdHis') . $email . rand ());
            // Utilisation de la fonction hash avec l'algorithme  de hashage sha512
            $token = hash('sha512', $maurice);

            $sql = "INSERT INTO t_users
            (USENOM, USEPRENOM, USEMAIL, USEPWD, USETOKEN, ID_ROLES)
            VALUES ('" .$nom ."','" .$prenom . "','" .$email . "','" . $mdp . "','" . $token. "',3)" ;
            
            $query =$pdo->prepare($sql);
            $query->execute();


            /* ENVOIS DE MAIL 
            * Installer nodeJS
            * Installer maildev (NodeJS impératif)
            * nom install -g maildev@1.0.0-rc2
            * Modifier le port dans php.ini (trouver dans WampServer) = smtp_port 25 à 1025
            * Lancer maildev avec la commande : maildev
            * Dans navigateur : http://127.0.0.1:1080
            */

            $msg = "<h1>Inscription</h1>";
            $msg = "<p>Pour valider votre inscription, cliquer <a href=\"http://localhost/web-18/index.php?page=registrationValidation\"> ici </a>.</p>";
            $sujet = "Validation de votre inscription";
            $headers = "From : manu@elysee.fr" . "\r\n" .    // ** \r\n = retour à la ligne sous windows
                'Reply-To: brigitte@elysee.fr';

            if(mail($email,$sujet,$msg,$headers)){
                echo "Inscription OK";
            }

            else{
                echo "Morche pô";
            }


            echo" Tu es inscris";
        }

        else {
            echo "Michel tu es déjà dans la base";
        }
    }

}

else  {

    require_once 'frmRegistration.php';

}

