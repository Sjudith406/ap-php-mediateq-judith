<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <h1><?php $titre ?> <?php echo $titre ?> </h1>
        <p> Vous avez <?= count($histo) ?> recherche(s) dans votre historique </p>
        <button class="supprimer" name="supprAllH"> SUPPRIMER L'HISTORIQUE </button> <button class="supprimer" name="saveH"> SAUVEGARDER L'HISTORIQUE</button>
    </div>
    <br>
    <main>
        <?php
        foreach($histo as $h){ ?>
            <section class="recherche">
                <h2> <?= $h->getTitreH() ?> (<?= $h->getTypeRH() ?>) </h2>
                <p>
                    <span class="typeD"> Type du document : <?= $h->getTypeDH() ?> </span> </p>
                    <p> <span class="date"> Dernière recherche : <?= $h->getLastR() ?> </span> </p>
                    <p> <span class="nbR"> Nombre de résultats : <?= $h->getNbResultH() ?> </span>
                </p>
                <div class="actions">
                    <button class="sauvegarder"> Sauvegarder </button>
                    <button class="supprimer" name="supprH"> Supprimer </button>
                    <button class="rechercher" name="rechH"> Rechercher </button>
                </div>
                <img src="css/ligne_separation_historique.png" width="500" height="50">
            </section>
            <br>
        <?php
        } ?>
    </main>
