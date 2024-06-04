<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Connexion</title>
</head>
<body>
<div class="formulaire">
    <form action="./index.php?action=connexion" method="post">
    <h2>Connexion</h2>
    
    <div class="inputs">
        <input type="text" placeholder="Identifiant" id="identifiant" name="loginA" required />
        <input type="password" placeholder="Mot de passe" id="motDePasse" name="mdpA" required />
      </div>
    <div align="center">
        <button type="submit">Se connecter</button>
    </div>
</form>
</div>
</body>
</html>
