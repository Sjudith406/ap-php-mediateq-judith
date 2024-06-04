<div class="container">
    <h2><?= $text ?></h2>
        <div class="row">
            <div class="col-12 mt-3">
            <?php 
                if($reservationDoc == null){  ?>
                    <p>Aucun document réservé</p>
     <?php      }
                else{ ?>
                    <h4>Document : </h4>
        <?php       foreach ($reservationDoc as $reservation){ ?>
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="" src="<?= $reservation->getImage() ?>" alt="<?= $reservation->getTitre() ?>">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?= $reservation->getTitre() ?></h4>
                                    <p class="card-text">Exemplaire numéro : <?= $reservation->getNumEx() ?></p>
                                    <p class="card-text">Date de la réservation : <?= $reservation->getDateReservation() ?></p>
                                </div>
                                    <div class="form-group ml-auto d-flex justify-content-between">
                                        <form action="./index.php?action=reservation" method="post">
                                            <input type="hidden" name="idreservation" value="<?= $reservation->getIdDoc() ?>">
                                            <input type="hidden" name="numero" value="<?= $reservation->getNumEx() ?>">
                                            <input type="hidden" name="idAbo" value="<?= $reservation->getIdAbo() ?>">
                                            <button type="submit" name="recherche" class="btn btn-primary col-md-12">
                                                <span class="glyphicon glyphicon-floppy-disk"></span> Supprimer la réservation
                                            </button>
                                        </form>
                                    </div>
                            </div>
                        </div>    
       <?php        }
                }
                if($reservationRevue == null){  ?>
                    <p>Aucune revue réservée</p> 
        <?php   }
                else{ ?>
                    <h4>Revue : </h4>
        <?php       foreach ($reservationRevue as $reservation1){ ?>
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="" src="<?= $reservation1->getImage() ?>" alt="">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?= $reservation1->getTitre() ?></h4>
                                    <p class="card-text">Revue numéro <?= $reservation1->getNumero() ?>
                                    <p class="card-text">Date de la réservation : <?= $reservation1->getDateReservation() ?></p>
                                </div>
                                    <div class="form-group ml-auto d-flex justify-content-between">
                                        <form action="./index.php?action=reservation" method="post">
                                            <input type="hidden" name="idreservationR" value="<?= $reservation1->getIdRevue() ?>">
                                            <input type="hidden" name="numeroR" value="<?= $reservation1->getNumero() ?>">
                                            <input type="hidden" name="idAboR" value="<?= $reservation1->getIdAbo() ?>">
                                            <button type="submit" name="recherche" class="btn btn-primary col-md-12">
                                                <span class="glyphicon glyphicon-floppy-disk"></span> Supprimer la réservation
                                            </button>
                                        </form>
                                    </div>
                            </div>
                        </div>
            <?php   }
                }   ?>
            </div>
        </div>
</div>