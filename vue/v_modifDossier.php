<!DOCTYPE html>
<html>

<head>
    <title><?php $titre ?></title>
</head>

<body>
    <h2>Modification de Mon dossier</h2>

    <form action="./index.php?action=modifDossier" method="post">
        <div>
            <label for="loginA">Login :</label>
            <input type="text" id="loginA" name="loginA" value=<?php echo $abonnee->getLogin() ?>>
        </div>
        <div>
            <label for="nomA">Nom :</label>
            <input type="text" id="nomA" name="nomA" value=<?php echo $abonnee->getNom() ?>>
        </div>
        <div>
            <label for="prenomA">Prénom :</label>
            <input type="text" id="prenomA" name="prenomA" value=<?php echo $abonnee->getPrenom() ?>>
        </div>
        <div>
            <label for="adresseA">Adresse :</label>
            <input type="text" id="adresseA" name="adresseA" value=<?php echo $abonnee->getAdresse() ?>>
        </div>
        <div>
            <label for="numTel">Numéro de téléphone :</label>
            <input type="text" id="numTel" name="numTel" value=<?php echo $abonnee->getNum() ?>>
        </div>
        <div>
            <label for="mailA">Mail :</label>
            <input type="text" id="mailA" name="mailA" value=<?php echo $abonnee->getMailA() ?>>
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>

</body>

</html>