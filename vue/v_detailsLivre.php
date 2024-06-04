<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
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
.arrow-icon {
    color: #000000; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    margin-left: 60px; /* Ajoute une marge à gauche pour l'espacement */
}
.arrow-icon-red {
    color: #dc3545; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    margin-left: 60px; /* Ajoute une marge à gauche pour l'espacement */
}
.liste {
    color: #000000; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    margin-left: 60px; /* Ajoute une marge à gauche pour l'espacement */
}
.liste-red {
    color: #dc3545; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    margin-left: 60px; /* Ajoute une marge à gauche pour l'espacement */
}
.fav {
    margin-left: 52px; /* Ajoute une marge à gauche pour l'espacement */
}
.nomListe {
    margin-left: 50px;
}
    </style>
</head>
<body>
<div class="container">
        <h2>Détails du Livre "<?php echo $doc->getTitre()?>"</h2>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                            <img class="" src="<?= $doc->getImage() ?>" alt="<?= $doc->getTitre() ?>" style="width: 240px; height: 360px;">
                        <div class="card-body">
                            <h4 class="card-title"><?= $doc->getTitre() ?></h4>
                            <p class="card-text">Auteur : <?= $doc->getAuteur() ?></p>
                            <p class="card-text">Collection : <?= $doc->getCollection() ?></p>
                            <p class="card-text">Date de parution : <?= $doc->getDate() ?></p>
                            <p class="card-text">Nombre de page : <?= $doc->getNbPage() ?></p>
                            <p class="card-text">Public : <?= $doc->getTypePublic()->getLibelle() ?></p>
                            <hr style="border-top: 2px solid #000;">
                            <div class="d-flex justify-content-between">
                                <div class="button2">
                    <?php           $idDoc = $doc->getId();
                                    $idListe = 1;
                                    $idAbo = $_SESSION["loginA"];
                                    if ($listeManager->inListeDoc($idDoc, $idListe, $idAbo)) { ?>
                                        <a href="./index.php?action=details&idListeSuppr=1&idDoc=<?= $idDoc ?>" class="arrow-icon-red">
                                            <i class="fas fa-heart fa-2x"></i> 
                                        </a>
                    <?php           } 
                                    else{ ?>
                                        <a href="./index.php?action=details&idListeAjout=1&idDoc=<?= $idDoc ?>" class="arrow-icon">
                                            <i class="far fa-heart fa-2x"></i> 
                                        </a>
                    <?php           }?>
                                    <p class="fav"> Favoris </p>
                                </div>
                                <?php foreach($lesListes as $liste){ ?>
                                    <?php if ($liste->getIdListe() > 1) { ?>
                                    <div class="button2">
                        <?php           $idDoc = $doc->getId();
                                        $idListe = $liste->getIdListe();
                                        $idAbo = $_SESSION["loginA"];
                                        if ($listeManager->inListeDoc($idDoc, $idListe, $idAbo)) { ?>
                                            <a href="./index.php?action=details&idListeSuppr=<?= $liste->getIdListe() ?>&idDoc=<?= $idDoc ?>" class="liste-red">
                                                <i class="fas fa-list fa-2x"></i> 
                                            </a>
                        <?php           } 
                                        else{ ?>
                                            <a href="./index.php?action=details&idListeAjout=<?= $liste->getIdListe() ?>&idDoc=<?= $idDoc ?>" class="liste">
                                                <i class="fas fa-list fa-2x"></i>
                                            </a>
                        <?php           }?>
                                        <p class="nomListe"><?= $liste->getNomListe() ?></p>
                                    </div>
                        <?php       } 
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#exemplaires">Exemplaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#avis">Avis</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="exemplaires" class="tab-pane fade">
                        <?php
                        $nbExemplaires = count($doc->getLesExemplaires()); 
                        if ($nbExemplaires>0){
                            foreach ($doc->getLesExemplaires() as $unExemplaire) {
                                if($exemplaireManager->estDispo($unExemplaire->getDocument()->getId(), $unExemplaire->getNumero()) == "1"){
                        ?>
                                <div class="card numeroDetails">
                                    <div class="card-horizontal">
                                        <div class="img-square-wrapper">
                                            <img class="" src="<?= $unExemplaire->getDocument()->getImage() ?>" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">Exemplaire numéro <?= $unExemplaire->getNumero() ?></h4>
                                            <p class="card-text">Date de sortie : <?= $unExemplaire->getDateAchat() ?></p>
                                            <p class="card-text">Etat : <?= $unExemplaire->getEtat() ?></p>
                                            <?php $num12 = $unExemplaire->getNumero() ?>
                                            <?php $id12 = $unExemplaire->getDocument()->getId() ?>
                                        </div>
                                    </div>
                                    <div class="form-group ml-auto d-flex justify-content-between">
                                        <?php 
                                        $NumeroEx = $unExemplaire->getNumero();
                                        $idDocument = $unExemplaire->getDocument()->getId();
                                        ?>
                                        <button class="reserverBtn Reserver" onclick="afficheModale('<?php echo $NumeroEx ?>', '<?php echo $idDocument ?>')">Réserver ce numéro</button>                                    </div>
                                    </div>
                        <?php }
                            }
                        } else {
                        ?>
                            <h4 class="card-title">Aucun numéros disponibles</h4>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="myPopup" class="popup-overlay">
                        <div class="popup-content">
                            <p>Êtes-vous sûr de vouloir réserver ce livre ?</p>
                            <div class="controls">
                                <button class="closeBtn">Fermer</button>
                                <a id="truc" href="#" class="button" onclick="">Réserver</a>
                            </div>
                        </div>
                    </div>
                    <div id="avis" class="tab-pane fade">
                        <p>Ceci est le contenu de l'onglet "Avis".</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script >

    function afficheModale(NumeroEx, idDocument) {
        console.log(NumeroEx, idDocument);
        let url = "reserverDoc(" + NumeroEx + ", " + idDocument + ")";
        console.log(url);
        $("#truc").attr("onclick", url);
        document.getElementById("myPopup").style.display = "block"; // Afficher le modal
    }

    // Lorsque l'utilisateur clique sur le bouton "close" du modal
    document.querySelector(".closeBtn").addEventListener("click", function() {
        document.getElementById("myPopup").style.display = "none"; // Masquer le modal
    });
    
    async function reserverDoc(NumeroEx, idDocument) {
        try {
            const donnees = {
                NumeroEx: NumeroEx,
                idDocument: idDocument
            };
            console.log(donnees);
            const response = await fetch('./index.php?action=reserverDoc', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(donnees)
        });

        document.getElementById("myPopup").style.display = "none"; // Masquer le modal
        const data = await response.json();
    } catch (error) {
        console.error(error);
    }
    }
    </script>
    
</body>
</html>
