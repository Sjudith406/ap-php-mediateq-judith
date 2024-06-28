<h6 class="text-left text-muted"><?= $nombresH ?></h6> 

<div class="card">
    <div class="card-body">
        <form method="POST" action="?action=hist_pret">
            <div class="group_H">
                <div class="form-row histo_form">
                    <div class="form-group col-md-2 modHist">
                        <select class="form-control" name="searchType" id="searchType" required >
                            <option value="tout" selected>Tout</option>
                            <option value="livre" >Livre</option>
                            <option value="dvd" >DVD</option>
                            <option value="revue" >Revue</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8 modHist">
                        <input id="searchText" name="searchText" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                    </div>
                    <div class="form-group col-md-2 modHist">
                        <button type="submit" name="recherche_pret" class="btn btn-primary col-md-10 "><span class="glyphicon glyphicon-floppy-disk"></span>Recherche</a>
                    </div>
                </div>
            </div>
            
        </form>
        
    </div>
</div>
<?php 
//var_dump($histo_emprunts);

foreach ($histo_emprunts as $histo_emprunt){ 
?>
<div class="l_emprunts">
    <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                            <img class="image-pret" src="<?= $histo_emprunt->getExemplaire()->getDocument()->getImage() ?>" alt="<?= $histo_emprunt->getExemplaire()->getDocument()->getTitre() ?>" style="width: 200px; height: 260px; text-align:center; margin: 0; padding: 10px 7px 7px 8px; border-right: 1px solid rgba(0, 0, 0, 0.059) ">
                        <div class="card-body">
                            <h5 class="card-title titleH"><?=  $histo_emprunt->getExemplaire()->getDocument()->getTitre()." / ". $histo_emprunt->getExemplaire()->getDocument()->getAuteur() ?></h5>
                            <p class="card-text"><span class="">No de document  :</span> <?= $histo_emprunt->getExemplaire()->getNumero() ?></p>
                            <p class="card-text"><span class="">Auteur  :</span> <?= $histo_emprunt->getExemplaire()->getDocument()->getAuteur() ?></p>
                            <p class="card-text"><span class="">Emprunté à  :</span> <?= $histo_emprunt->getLieu() ?></p>
                            <p class="card-text"><span class="">Public  :</span> <?= $histo_emprunt->getExemplaire()->getDocument()->getTypePublic()->getLibelle() ?></p>
                            <div class="date-formH">
                                <div class="bodyClass">
                                    <div class="dates">
                                        <div class="date">
                                        <div class="pret">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <div class="info-pret">
                                            <p class=""><?= $histo_emprunt->getDateDebut() ?></p>
                                            <p class="flou">Date de l'emprunt</p>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="date">
                                        <div class="retour">
                                            <i class="fa-solid fa-rotate-right"></i>
                                            <div class="info-retour">
                                                <p class="dateFinEmp"><?= $histo_emprunt->getDateFin() ?></p>
                                                <p class="flou">Date de retour</p>
                                            </div>
                                        </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <?php } ?>