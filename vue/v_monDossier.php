
<div class="container">
        <h1><?php $titre ?> <?php echo $abonnee->getPrenom() ?> <?php echo $abonnee->getNom() ?> </h1>
        <h4>
            <p> Numéro : <?php echo $abonnee->getNumA() ?>
        </h4>
        </p>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="cardbody">
                    <p class="card-text">Emprunts en cours : <?php echo $nbPret ?> </p>
                    <p class="card-text">Réservation : </p>
                    <p class="card-text">Frais : </p>
                    <p class="card-text">Mes listes </p>
                    <p class="card-text">Historique des emprunts </p>
                    <p class="card-text">
                        <a href="./?action=hist_recherche">Historique de recherche </a>
                    </p>
                </div>
            </div>
        </div>
    
        <br> 
        <p><strong>Renseignements personnels</strong></p>
        <p> Courriel : <?php echo $abonnee->getMailA() ?>
        <p> Téléphone (résidence) : <?php echo $abonnee->getNum() ?>
        <p> Adresse : <?php echo $abonnee->getAdresse() ?>
    
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="./?action=modifMdp">Modifier mon mot de passe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./?action=modifDossier">Modifier les renseignements personnels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Comment signaler la perte de ma carte ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Comment renouveler mon abonnement ?</a>
                    </li>
                </ul>
            </div>
        </div>
</div>