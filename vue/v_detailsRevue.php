<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var overlay = $(".overlay");
            var popup = $(".popup");
            var numeroInput = $("#numeroInput");

            $(".reserverBtn").click(function () {
                var numero = $(this).data("numero");
                var photo = $(this).data("photo");
                chargerPopup(numero, photo);
            });

            overlay.click(function () {
                fermerPopup();
            });

            function chargerPopup(numero, photo) {
                var popupImg = $(".popup img");
                var popupTitle = $(".popup h2");

                popupImg.attr("src", photo);
                popupTitle.text("Revue numéro " + numero);

                overlay.css("display", "flex");
                popup.css("display", "block");
            }

            function fermerPopup() {
                overlay.css("display", "none");
                popup.css("display", "none");
            }

            function reserverNumero() {
                // Ajoutez ici le code pour effectuer la réservation
                alert("Numéro réservé avec succès!");
                fermerPopup();
            }

            function annulerReservation() {
                // Ajoutez ici le code pour annuler la réservation
                alert("Réservation annulée.");
                fermerPopup();
            }

            $(".reserverBtn").click(function () {
                var numero = $(this).data("numero");
                var photo = $(this).data("photo");
                chargerPopup(numero, photo);
            });

            overlay.click(function () {
                fermerPopup();
            });

            $(".reserverBtn").click(function () {
                var numero = $(this).data("numero");
                var photo = $(this).data("photo");
                chargerPopup(numero, photo);
            });

            $(".reserverBtn").click(function () {
                var numero = $(this).data("numero");
                var photo = $(this).data("photo");
                chargerPopup(numero, photo);
            });
        });
    </script>
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .popup {
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            max-width: 400px;
            text-align: center;
            z-index: 2;
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
    <title>Votre Titre</title>
</head>
<body>
    <div class="container">
        <h2>Détails de la revue "<?php echo $doc->getTitre()?>"</h2>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <img class="" src="<?= $doc->getPhoto() ?>" alt="<?= $doc->getTitre() ?>" style="width: 200px; height: 300px;">
                        <div class="card-body">
                            <h4 class="card-title"><?= $doc->getTitre() ?></h4>
                            <p class="card-text">Sujet : <?= $doc->getType() ?></p>
                            <p class="card-text">Periodicité : <?= $periodicite ?></p>
                            <p class="card-text">Description : <?= $doc->getDescription() ?></p>
                            <hr style="border-top: 2px solid #000;">
                            <div class="d-flex justify-content-between">
                                <div class="button2">
                    <?php           $idDoc = $doc->getId();
                                    $idListe = 1;
                                    $idAbo = $_SESSION["loginA"];
                                    if ($listeManager->inListeRevue($idDoc, $idListe, $idAbo)) { ?>
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
                                        if ($listeManager->inListeRevue($idDoc, $idListe, $idAbo)) { ?>
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
                        $nbNumeros = count($doc->getLesNumeros());
                        if ($nbNumeros > 0) {
                            foreach ($doc->getLesNumeros() as $unNumero) {
                                if($parutionManager->estDispo($unNumero->getNumero()) == "1"){
                        ?>
                                <div class="card numeroDetails">
                                    <div class="card-horizontal">
                                        <div class="img-square-wrapper">
                                            <img class="" src="<?= $unNumero->getPhoto() ?>" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">Revue numéro <?= $unNumero->getNumero() ?></h4>
                                            <p class="card-text">Date de sortie : <?= $unNumero->getDateParution() ?></p>
                                            <p class="card-text">Etat : <?= $unNumero->getEtat()->getTitre() ?></p>
                                            <?php $num12 = $unNumero->getNumero() ?>
                                        </div>
                                    </div>
                                    <div class="form-group ml-auto d-flex justify-content-between">
                                        <button class="reserverBtn" data-numero="<?= $unNumero->getNumero() ?>" data-photo="<?= $unNumero->getPhoto() ?>">Réserver ce numéro</button>
                                    </div>
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

                    <div id="avis" class="tab-pane fade">
                        <p>Ceci est le contenu de l'onglet "Avis".</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay">
        <div class="popup">
            <div class="img-square-wrapper">
                <img class="" src="" alt="">
            </div>
            <h2></h2>
            <p>Êtes-vous sûr de vouloir réserver ce numéro ?</p>
            <form action="./index.php?action=details" method="post"> 
                <input type="hidden" id="numeroInput" name="numero" value="<?= $num12 ?>">   
                <button class="reserverBtn" onclick="reserverNumero()">Réserver</button>
            </form>
            <button class="reserverBtn" onclick="annulerReservation()">Annuler</button>
        </div>
    </div>
</body>
</html>
