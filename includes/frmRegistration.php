<form method="post" action="index.php?page=registration">
    <div>
        <label for="nom">Nom&nbsp; : </label>
        <input name="nom" type="text"/>
    </div>
    <div>
        <label for="prenom">Prénom&nbsp;:</label>
        <input name="prenom" type="text"/>
    </div>
    <div>
        <label for="email">e-mail&nbsp;:</label>
        <input name="email" type="mail"/>
    </div>
    <div>
        <label for="mdp">Mot de passe&nbsp;:</label>
        <input name="mdp" type="password"/>
    </div>
    <div>
        <input type="reset" value="Effacer"/>
        <input type="submit" value="Valider"/>
    </div>
    <input type="hidden" name="Validation"/>
</form>