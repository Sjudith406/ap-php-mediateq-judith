<h2>Revues : </h2>
<div class="container-fluid">
<?php
    foreach($revues as $uneRevue){
        ?>
    <form action="./index.php?action=details" method="post">
        <div class="row">
            <div class="col-12 mt-3">
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
                        <small class="text-muted"> 
                            <?php 
                            $txtNumeros = "Aucun numéros disponibles";
                            $nbNumeros = count($uneRevue->getLesNumeros()); 
                            if ($nbNumeros>0){
                                $txtNumeros = $nbNumeros . " numéro";
                                $finTxt = " : ";
                                if ($nbNumeros > 1){
                                    $finTxt = "s : ";
                                }
                                $txtNumeros .= $finTxt;
                                
                                foreach ($uneRevue->getLesNumeros() as $unNumero){
                                    $txtNumeros .= $unNumero->getNumero() . " (".$unNumero->getDateParution()."), ";
                                }
                                $txtNumeros = substr($txtNumeros, 0, -2);
                            }?>
                            <div class="d-flex">
                                <small class="text-muted"> 
                                    <?= $txtNumeros ?>
                                </small>
                                <?php if($connexion->isLoggedOn()){ ?>
                                    <input type="hidden" name="id" value="<?= $uneRevue->getId() ?>">
                                    <div class="form-group ml-auto d-flex justify-content-between">
                                        <button type="submit" name="recherche" class="btn btn-primary col-md-12">
                                            <span class="glyphicon glyphicon-floppy-disk"></span> Détails
                                        </button>
                                    </div>
                            <?php    } ?>
                            </div>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <?php
    }
?>
</div>