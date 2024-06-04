<div class="barre-infos">
    <h6 class="text-left text-muted"><?= $nombre ?></h6> 
    <div class="toolbar">
      <div class="icon">
        <a href="#"><i class="fas fa-print"></i> Imprimer</a>
      </div>
      <div class="icon">
        <a href="#"><i class="fa-solid fa-arrows-rotate"></i> Tout prolonger</a>
      </div>
      <div class="icon">
        <a href="#"><i class="fas fa-share-alt"></i> Partager</a>
      </div>
      <div class="icon">
        <a href="#"><i class="fas fa-question-circle"></i> Aide</a>
      </div>
    </div>
</div>
<?php 
//var_dump($emprunts);

foreach ($emprunts as $emprunt){ 
    ?>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-horizontal">
                        <img class="image-pret" src="<?= $emprunt->getExemplaire()->getDocument()->getImage() ?>" alt="<?= $emprunt->getExemplaire()->getDocument()->getTitre() ?>" style="width: 200px; height: 270px; text-align:center; margin: 0; padding: 10px 7px 7px 8px; border-right: 1px solid rgba(0, 0, 0, 0.059) ">
                    <div class="card-body">
                        <h5 class="card-title titleH"><?= $emprunt->getExemplaire()->getDocument()->getTitre() ." / ". $emprunt->getExemplaire()->getDocument()->getAuteur()?></h5>
                        <p class="card-text"><span class="">Auteur  :</span> <?= $emprunt->getExemplaire()->getDocument()->getAuteur() ?></p>
                        <p class="card-text card-textE"><span class="">No de document  :</span> <?= $emprunt->getExemplaire()->getNumero() ?></p>
                        <p class="card-text"><span class="">Emprunté à  :</span> <?= $emprunt->getLieu() ?></p>
                        <p class="card-text"><span class="">Public  :</span> <?= $emprunt->getExemplaire()->getDocument()->getTypePublic()->getLibelle() ?></p>
                        <div class="date-form">
                            <div class="bodyClass">
                                <div class="dates">
                                    <div class="date">
                                    <div class="pret">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <div class="info-pret">
                                        <p class=""><?= $emprunt->getDateDebut() ?></p>
                                        <p class="flou">Date de l'emprunt</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="date">
                                    <div class="retour">
                                        <i class="fa-solid fa-rotate-right"></i>
                                        <div class="info-retour">
                                            <p class="dateFinEmp" id="<?= $emprunt->getAbonne()->getLogin() .'_'.$emprunt->getExemplaire()->getDocument()->getId() . '_'.$emprunt->getExemplaire()->getNumero() .'_'. str_replace('-','_',$emprunt->getDateDebut()) ?>"><?= $emprunt->getDateFin() ?></p>
                                            <p class="flou">Date de retour</p>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="date-form">
                            <p class="prolongation" >
                                <?php
                                    
                                    if ($emprunt->getRendu()) {
                                        echo '<span class="btn-dnextend"><i class="fa-solid fa-circle-exclamation"></i> NON PROLONGEABLE </span>';
                                    } else if (!$emprunt->getRendu() && $emprunt->getProlongeable()) {
                                        /*echo '<span class="btn-extend"> PROLONGEABLE </span>';*/
                                        $params = "'".$emprunt->getAbonne()->getLogin()."', ".$emprunt->getExemplaire()->getDocument()->getId() .", ".$emprunt->getExemplaire()->getNumero().", '".$emprunt->getDateDebut()."'";
                                        echo '<a href="#" class="btn-extend prolongLink" onclick="afficheModale('.$params.')"> PROLONGEABLE </a>';
                                    } elseif (!$emprunt->getRendu() && !$emprunt->getProlongeable()) {
                                        echo '<span style="color: red; font-size: 19px; "> Vous n\'avez pas rendu le document !</span>';
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<!-- Modal Popup -->
<div id="myPopup" class="popup-overlay">
  <div class="popup-content">
    <p>Êtes-vous sûr de vouloir prolonger cet emprunt ?</p>
    <div class="controls">
        <button class="closeBtn">Fermer</button>
        <!--<button id="prolongerBtn">Prolonger</button> -->
        <a id="truc" href="#" onclick="" class="button">Prolonger</a>
    </div>
  </div>
</div>

<!-- Modal Popup reponse -->
<div id="messageProlonger" class="popup-message">
    <div class="message_content">
        <p>Vous avez atteint le nombre maximal de prolongations pour cet emprunt.</p>
    </div>
</div>

<!-- script JavaScript -->
<script >



    function afficheModale(idAb, idDocument, numeroE, dateDebutEmp) {
        //si le nombre de prolongation est inférieur à 3, je prolonge sinon je désactive le lien
        //if(nbProlonger < 3 ){
        console.log(idAb, idDocument, numeroE, dateDebutEmp);
        let url = "prolongerEmpt('"+idAb+"', "+idDocument+", "+numeroE+", '"+ dateDebutEmp+"')";
        console.log(url);
        $("#truc").attr("onclick",url);
        document.getElementById("myPopup").style.display = "block"; // Afficher le modal
       // }else{

       // Afficher le message d'erreur
        //document.getElementById("messageProlonger").style.display = "block";
        // Désactiver le lien de prolongation
        
    }

    // Lorsque l'utilisateur clique sur le bouton "close" du modal
    document.querySelector(".closeBtn").addEventListener("click", function() {
        document.getElementById("myPopup").style.display = "none"; // Masquer le modal
    });

    // je récupère en asynchrone les données de l'emprunt et je l'envoie au controleur
    async function prolongerEmpt(idAb, idDocument, numeroE, dateDebutEmp) {
        try {
            const donnees = {
                idAb: idAb,
                idDocument: idDocument,
                numeroE: numeroE,
                dateDebutEmp: dateDebutEmp
            };
            const response = await fetch('./index.php?action=prolongerE', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(donnees)
        });

        if (response.ok) {
        const data = await response.json();
        console.log("Emprunt prolongé avec succès !", data);
        // Selectionner l'élément avec la classe dateFinEmp
        const dateFinEmprunt = document.getElementById(data.div);
        console.log("date fin : ", dateFinEmprunt)
        // Mettre à jour la date de retour sur la page avec la nouvelle date récupérée
        dateFinEmprunt.textContent = data.newDateFin;
        console.log("date fin env : ", data.newDateFin)
        document.getElementById("myPopup").style.display = "none"; // Masquer le modal
        }else {
            throw new Error('Une erreur s\'est produite lors de la prolongation de l\'emprunt.');
        }

        const data = await response.json();
    } catch (error) {
        console.error(error);
    }
    }

</script>
