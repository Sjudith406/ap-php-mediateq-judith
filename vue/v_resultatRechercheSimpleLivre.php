<h2>Livres : </h2>
<div class="container-fluid">
<?php
    foreach($livres as $unLivre){
        ?>
    <form action="./index.php?action=details" method="post">
        <div class="row">
            <div class="col-12 mt-3">
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
                            $txtExemplaires = $nbExemplaires . " exemplaire";
                            $finTxt = " : ";
                            if ($nbExemplaires > 1){
                                $finTxt = "s : ";
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
                                    <?= $txtExemplaires . " - " . $txtRayons?>
                                </small>
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
            </div>
        </div>
    </form>

    <?php
    }
?>

</div>