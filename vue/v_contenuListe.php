<style>
.custom-font {
    font-family: "Times New Roman", Times, serif;
}

.trash-icon {
    color: #dc3545; /* Couleur rouge */
    text-decoration: none; /* Supprime le soulignement */
    cursor: pointer; /* Change le curseur au survol */
    margin-left: 720px;
    margin-right: 20px;
}

.trash-icon:hover {
    opacity: 0.8; /* Réduit légèrement l'opacité au survol */
}
</style>

<div class="container">
    <h2 class="custom-font"><?= $text ?></h2>
        <div class="row">
            <div class="col-12 mt-3">
        <?php       foreach ($contenu as $document){  ?>
                        <form action="./index.php?action=details" method="post">
            <?php           foreach($lesLivres as $unLivre){ 
                                if($unLivre->getId() == $document->getId()){ ?>
                                    <div class="card">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper">
                                                <img class="" src="<?= $unLivre->getImage() ?>" alt="<?= $unLivre->getTitre() ?>">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $unLivre->getTitre() ?></h4>
                                                <p class="card-text"><?= $unLivre->getISBN() ?></p>
                                                <p class="card-text"><?= $unLivre->getAuteur() ?></p>
                                                <p class="card-text"><?= $unLivre->getCollection() ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                    <?php 
                                        $txtExemplaires = "Aucun exemplaires";
                                        $txtRayons = "";
                                        $nbExemplaires = count($unLivre->getLesExemplaires()); 
                                        if ($nbExemplaires>0){
                                            $txtRayons = "Rayon";
                                            $txtExemplaires = $nbExemplaires . " exemplaire  dispo";
                                            $finTxt = "";
                                            if ($nbExemplaires > 1){
                                                $finTxt = "";
                                            }
                                            $txtRayons .= $finTxt;
                                            $txtExemplaires .= $finTxt;
                                            
                                            foreach ($unLivre->getLesExemplaires() as $unExemplaire){
                                                $txtRayons .= $unExemplaire->getLeRayon() . ", ";
                                            }
                                            $txtRayons = substr($txtRayons, 0, -2);
                                            ?>
                                            
                                        <?php } ?>
                                            <div class="d-flex">
                                                <small class="text-muted"> 
                                                    <?= $txtExemplaires?>
                                                </small>

                                                <div class="col-auto">
                                                    <div class="button2 ml-auto">
                                                        <a href="./index.php?action=contenuListe&idListeSuppr=<?= $idListe ?>&idDoc=<?= $unLivre->getId() ?>" class="trash-icon">
                                                            <i class="fas fa-trash-alt fa-2x"></i> 
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php if($connexion->isLoggedOn()){ ?>
                                                    <input type="hidden" name="id" value="<?= $unLivre->getId() ?>">
                                                    <div class="form-group ml-auto d-flex justify-content-between">
                                                        <button type="submit" name="recherche" class="btn btn-primary col-md-12">
                                                            <span class="glyphicon glyphicon-floppy-disk"></span> Détails
                                                        </button>
                                                    </div>
                                            <?php    } ?>
                                            </div>
                                        </div>
                                    </div>    
            <?php               }
                            } ?>

            <?php           foreach($lesDvds as $unDvd){ 
                                if($unDvd->getId() == $document->getId()){ ?>
                                    <div class="card">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper">
                                                <img class="" src="<?= $unDvd->getImage() ?>" alt="<?= $unDvd->getTitre() ?>">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $unDvd->getTitre() ?></h4>
                                                <p class="card-text"><?= $unDvd->getSynopsis() ?></p>
                                                <p class="card-text"><?= $unDvd->getRealisateur() ?></p>
                                                <p class="card-text"><?= $unDvd->getDuree() ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                    <?php 
                                        $txtExemplaires = "Aucun exemplaires";
                                        $txtRayons = "";
                                        $nbExemplaires = count($unDvd->getLesExemplaires()); 
                                        if ($nbExemplaires>0){
                                            $txtRayons = "Rayon";
                                            $txtExemplaires = $nbExemplaires . " exemplaire  dispo";
                                            $finTxt = "";
                                            if ($nbExemplaires > 1){
                                                $finTxt = "";
                                            }
                                            $txtRayons .= $finTxt;
                                            $txtExemplaires .= $finTxt;
                                            
                                            foreach ($unLivre->getLesExemplaires() as $unExemplaire){
                                                $txtRayons .= $unExemplaire->getLeRayon() . ", ";
                                            }
                                            $txtRayons = substr($txtRayons, 0, -2);
                                            ?>
                                            
                                        <?php } ?>
                                            <div class="d-flex">
                                                <small class="text-muted"> 
                                                    <?= $txtExemplaires?>
                                                </small>

                                                <div class="col-auto">
                                                    <div class="button2">
                                                        <a href="./index.php?action=contenuListe&idListeSuppr=<?= $idListe ?>&idDoc=<?= $unLivre->getId() ?>" class="trash-icon">
                                                            <i class="fas fa-trash-alt fa-2x"></i> 
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php if($connexion->isLoggedOn()){ ?>
                                                    <input type="hidden" name="id" value="<?= $unDvd->getId() ?>">
                                                    <div class="form-group ml-auto d-flex justify-content-between">
                                                        <button type="submit" name="recherche" class="btn btn-primary col-md-12">
                                                            <span class="glyphicon glyphicon-floppy-disk"></span> Détails
                                                        </button>
                                                    </div>
                                            <?php    } ?>
                                            </div>
                                        </div>
                                    </div>    
            <?php               }
                            } ?>

            <?php           foreach($lesRevues as $uneRevue){ 
                                if($uneRevue->getId() == $document->getId()){ ?>
                                    <div class="card">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper">
                                                <img class="" src="<?= $uneRevue->getPhoto() ?>" alt="<?= $uneRevue->getTitre() ?>">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $uneRevue->getTitre() ?></h4>
                                                <?php 
                                                    if ($uneRevue->getEmpruntable()){
                                                        $txt = "Cette revue est empruntable";
                                                    } else {
                                                        $txt = "Cette revue n'est pas empruntable";
                                                    }                            
                                                ?>    
                                                <p class="card-text"><?= $txt ?></p>   
                                                    
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                                <?php 
                                                $txtNumeros = "Aucun numéro dispo";
                                                $nbNumeros = count($uneRevue->getLesNumeros()); 
                                                if ($nbNumeros>0){
                                                    $txtNumeros = $nbNumeros . " numéros dispos"; }?>
                                                <div class="d-flex">
                                                    <small class="text-muted">
                                                        <?= $txtNumeros ?>
                                                    </small>
                                                    <div class="col-auto">
                                                        <div class="button2 ml-auto">
                                                            <a href="./index.php?action=contenuListe&idListeSuppr=<?= $idListe ?>&idDoc=<?= $uneRevue->getId() ?>" class="trash-icon">
                                                                <i class="fas fa-trash-alt fa-2x"></i> 
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <?php if($connexion->isLoggedOn()){ ?>
                                                        <input type="hidden" name="id" value="<?= $uneRevue->getId() ?>">
                                                        <div class="form-group ml-auto d-flex justify-content-between">
                                                            <button type="submit" name="recherche" class="btn btn-primary col-md-12">
                                                                <span class="glyphicon glyphicon-floppy-disk"></span> Détails
                                                            </button>
                                                        </div>
                                                <?php    } ?>
                                                </div>
                                        </div>
                                    </div>    
            <?php               }
                            } ?>
                        </form>
        <?php       }  ?>
            </div>
        </div>
</div>