<?php 
$nom = isset($nom) ? $nom :"";
$prenom = isset($prenom) ? $prenom :"";
$email = isset($email) ? $email:"";

?>

<form method="post" action="index.php?page=registration">
    <div>
        <label for="nom">Nom&nbsp; : </label>
        <input name="nom" type="text" value="<?=$nom?>"/>
    </div>
    <div>
        <label for="prenom">Prénom&nbsp;:</label>
        <input name="prenom" type="text" value="<?=$prenom?>"/>
    </div>
    <div>
        <label for="email">e-mail&nbsp;:</label>
        <input name="email" type="mail" value="<?=$email?>"/>
    </div>
    <div>
        <label for="mdp">Mot de passe&nbsp;:</label>
        <input name="mdp" type="password" />
    </div>
    <div>
        <input type="reset" value="Effacer"/>
        <input type="submit" value="Valider"/>
    </div>
    <input type="hidden" name="validation"/>
</form>