<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
</head>
<style>
.card-horizontal {
    display: flex;
}

.icon,
.title,
.button2 {
    margin-right: 10px; /* Espacement entre les éléments */
}

.icon {
    margin-left: 10px;
}

.title {
  display: flex;
  align-items: center;
}

.custom-font {
    font-family: "Times New Roman", Times, serif;
}

.arrow-icon {
    color: #000000; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    cursor: pointer; /* Change le curseur au survol */
    margin-left: 775px; /* Ajoute une marge à gauche pour l'espacement */
}

.trash-icon {
    color: #dc3545; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    cursor: pointer; /* Change le curseur au survol */
    margin-left: 10px; /* Ajoute une marge à gauche pour l'espacement */
}

.trash-icon:hover {
    opacity: 0.8; /* Réduit légèrement l'opacité au survol */
}

.creerListe {
    margin-right: 15px;
    margin-left: 80px;
}

.creer {
    margin-right: 15px;
}

.popup-overlay {
  display: none;
  position: fixed;
  z-index: 1040;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.popup-content {
  max-width: 420px;
  box-sizing: border-box;
  padding: 20px;
  background-color: #fefefe;
  width: 100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.popup-overlay .popup-content .controls {
  display: flex;
  justify-content: space-between;
  margin: 20px 0px 0px;
}

.popup-content p {
  font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
  font-size: 18px;
}

.popup-overlay .popup-content .controls button,
.popup-overlay .popup-content .controls .button {
  padding: 10px 20px;
  border: none;
  outline: none;
  cursor: pointer;
  border-radius: 20px;
}
.closeBtn {
  background: transparent;
  font-size: 18px;
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  color: #c96f01;
  margin-top: 15px;
  margin-right: 80px;
}

.button {
  text-decoration: none;
  background-color: #fb8a01;
  color: #090909;
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  font-size: 18px;
}
.button:hover {
  text-decoration: none;
}

</style>
<div class="container">
    <h2 class="custom-font"><?= $text ?></h2>
    <div class="card">
        <div class="card-horizontal d-flex align-items-center">
            <h8 class="custom-font">Vous avez <?= $nbListe ?> listes.</h8>
            <div class="button2 ml-auto">
                <button class="creerListe" onclick="afficheModale()">
                    <i class="fas fa-plus"></i>                
                </button>
            </div>
            <div class="creer"> 
                    <h5 class="custom-font">Créer une liste</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <?php foreach ($lesListes as $liste) { ?>
                <div class="card">
                    <div class="card-horizontal d-flex align-items-center">
                        <?php if ($liste->getIdListe() == 1) { ?>
                            <div class="icon">
                                <i class="fas fa-heart fa-2x" style="color: #e30202;"></i>
                            </div>
                        <?php } else { ?>
                            <div class="icon">
                                <i class="fas fa-list fa-2x"></i>
                            </div>
                        <?php } ?>
                        <div class="title">
                            <h4 class="card-title custom-font"><?= $liste->getNomListe() ?></h4>
                        </div>
                        <h10 class="custom-font"><?= count($liste->getContenu()) ?> documents</h10>
            <?php       if(!$liste->getContenu() == null){  ?>
                            <div class="button2 ml-auto">
                                <form action="./index.php?action=contenuListe" method="post">
                                    <input type="hidden" name="idListe" value="<?= $liste->getIdListe() ?>">
                                    <a href="./index.php?action=contenuListe&idListe=<?= $liste->getIdListe() ?>" class="arrow-icon">
                                        <i class="fas fa-arrow-right fa-2x"></i> 
                                    </a>
                                </form>
                            </div>
             <?php      } ?>
                        <?php if ($liste->getIdListe() > 3) { ?>
                            <div class="button2 ml-auto">
                                <form action="./index.php?action=liste" method="post">
                                    <input type="hidden" name="idListe" value="<?= $liste->getIdListe() ?>">
                                    <a href="./index.php?action=liste&idListe=<?= $liste->getIdListe() ?>" class="trash-icon">
                                        <i class="fas fa-trash-alt fa-2x"></i> 
                                    </a>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div id="myPopup" class="popup-overlay">
    <div class="popup-content">
        <p>Veuillez saisir le nom de la liste à créer</p>
        <form action="./index.php?action=liste" method="post">
            <input type="text" name="nomListe" id="nomListe" placeholder="Nom de la liste">
            <div class="d-flex justify-content-between">
                <div class="controls">
                    <button type="submit" class="button creerListe">Créer</button>
                </div>
                <div class="controls">
                    <a href="#" class="closeBtn">Fermer</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script >
    function afficheModale() {
        document.getElementById("myPopup").style.display = "block"; // Afficher le modal
    }

    // Lorsque l'utilisateur clique sur le bouton "close" du modal
    document.querySelector(".closeBtn").addEventListener("click", function() {
        document.getElementById("myPopup").style.display = "none"; // Masquer le modal
    });
</script>
</html>
