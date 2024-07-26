

<style>
    .acces, .questions {
        padding: 10px 10px 10px 20px;
    }
    .acces a, .questions div p {
        /*font-family: "Roboto", sans-serif;*/
        font-family: Georgia, "Times New Roman", Times, serif;
    }
    .acces a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000000; /* Couleur du texte des liens */
    }
    .acces a i {
        font-size: 16px;
    }
    .acces a p{
        padding: 0 10px;
        flex: 1 1 auto;
        font-size: 18px;
    }
    .acces a p span{
        padding-left: 7px;
        font-size: 18px;
    }
    .acces a .u i, .questions i {
        font-size: 20px;
    }
    .questions {
        display: flex;
        align-items:  center;
    }
    .questions div a {
        padding-bottom: 5px;
        color: #000000;
    }
    .questions div p {
        font-size: 18px;
        margin-bottom: 6px;
    }
    .questions div {
        padding-left: 10px;
    }
    .questions i {
        margin-right: 8px;
        padding-right: 6px;
    }
    div .u {
        padding-right: 6px;
        margin-right: 8px;
    }
    div .superieur {
        padding-left: 6px;
        margin-left: 8px;
    }
    div .choix:hover  {
        background-color: #EBEBEB;
    }
    .renseigne {
        padding: 5px 10px 20px 20px;
        margin: 5px;
    }
    div .renseignement {
        display: flex;
        align-items: center;
        padding: 8px 8px 8px 0px;
    }
    .renseignement i {
        font-size: 19px;
        padding-right: 8px;
        margin-right: 7px;
    }
    .renseignement p {
        padding-left: 8px;
        margin-left: 7px;
        /* font family et taille a rajouter.*/
    }
    hr {
        border-top: 1px solid #bbbbbb;
        margin: 12px 0px;
        padding: 2px 0px;
    }
    .a_rapide, .info_perso {
        margin-bottom: 8px;
        padding: 6px 0px 10px 0px;
    }
    .a_rapide {
        padding-left: 20px;
    }
    .flou {
        color: rgba(0, 0, 0, 0.494);
    }
    .titre_mdos {
        display: flex;
        align-items: center;
        padding-left: 20px;
        padding-top: 15px;
    }
    div .titre_page {
        margin-left: 15px;
    }
    .bloc_titre div i {
        margin-right: 15px;
        font-size: 45px;
    }
   
</style>
<div class="dossier">
    <div class="box_mon_dossier">
            <div class="bloc_titre">
                <div class="titre_mdos">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="titre_page">
                        <h3 style="font-size: 20px;"><?php echo $abonnee->getPrenom() ?> <?php echo $abonnee->getNom() ?></h3>
                        <h4>
                            <p class="flou"> Numéro : <?php echo $abonnee->getLogin() ?> </p>
                        </h4>
                    </div>
                </div>
            </div>
            <hr>
            <div class="">
                    <p class="a_rapide text-muted">Accès rapide</p>
                    <div class="">
                        <div class="choix">
                            <div class="pret_marge acces">
                                <a href="./?action=emprunt" class="acces_pret">
                                    <div class="u"><i class="fa-regular fa-newspaper "></i></div>
                                    <p class="card-text">Emprunts en cours : <span style=" font-weight:bold; color:#000000; font-family: Roboto, sans-serif;"><?php echo $nbPret ?></span> </p>
                                    <div class="superieur"><i class="fa-solid fa-angle-right "></i></div>
                                </a>
                            </div> 
                        </div>
                        <div class="choix">
                            <div class=" reserve_marge acces">
                                <a href="./?action=reservation" class="acces_reserv">
                                    <div class="u"><i class="fa-solid fa-calendar-days"></i></div>
                                    <p class="card-text">Réservation :   <span style=" font-weight:bold; color:#000000; font-family: Roboto, sans-serif;"><?php echo $nbReservations ?></span></p>
                                    <div class="superieur"><i class="fa-solid fa-angle-right "></i></div>
                                </a>
                            </div>
                        </div>
                        <div class="choix">
                            <div class=" frais_marge acces">
                                <a href="./?action=frais" class="acces_frais">
                                    <div class="u"><i class="fa-solid fa-euro-sign"></i></div>
                                    <p class="card-text">Frais : </p>
                                    <div class="superieur"><i class="fa-solid fa-angle-right "></i></div>
                                </a>
                            </div>
                        </div>
                        <div class="choix">
                            <div class=" list_marge acces">
                                <a href="./?action=liste" class="acces_list">
                                    <div class="u"><i class="fa-solid fa-list"></i></div>
                                    <p class="card-text">Mes listes </p>
                                    <div class="superieur"><i class="fa-solid fa-angle-right "></i></div>
                                </a>
                            </div>
                        </div>
                        <div class="choix">
                            <div class=" recherchpret_marge acces">
                                <a href="./?action=hist_pret" class="acces_rechepret">
                                    <div class="u"><i class="fa-regular fa-clock"></i></div>
                                    <p class="card-text">Historique des emprunts </p>
                                    <div class="superieur"><i class="fa-solid fa-angle-right "></i></div>
                                </a>
                            </div>
                        </div>
                        <div class="choix">
                            <div class=" recherche_marge acces">
                                <a href="./?action=hist_recherche" class="acces_recherch">
                                    <div class="u"><i class="fa-solid fa-magnifying-glass"></i></div>
                                    <p class="card-text">Historique de recherche </p>
                                    <div class="superieur"><i class="fa-solid fa-angle-right "></i></div>
                                </a>
                            </div>
                        </div>
                        <div class="chois">
                            <div class=" questions"><i class="fa-solid fa-user"></i>
                                <div class="">
                                    <p><a href="./?action=modifMdp" class="acces_recherch">Modifier mon mot de passe </a></p>
                                    <p><a href="./?action=modifDossier" class="acces_recherch">Modifier les renseignements personnels </a></p>
                                </div>
                            </div>
                        </div>
                        <div class="chois">
                            <div class=" questions">
                                <i class="fa-solid fa-circle-info"></i>
                                <div class="">
                                    <p><a href="#" class="acces_recherch signaler"> Comment signaler la perte de ma carte ? </a></p>
                                    <p><a href="#" class="acces_recherch renouveler"> Comment renouveler mon abonnement ? </a></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        
            <hr> <!-- separer en div et p pour flouter le nom.supperposer les deux -->
            <div class="renseigne">
                <div class=""><p class="info_perso text-muted">Renseignements personnels</p></div>
                <div class="renseignement">
                    <i class="fa-solid fa-envelope"></i>
                    <p> Courriel : <?php echo $abonnee->getMailA() ?></p></div>
                <div class="renseignement">
                    <i class="fa-solid fa-phone"></i>
                    <p> Téléphone (résidence) : <?php echo $abonnee->getNum() ?></p></div>
                <div class="renseignement">
                    <i class="fa-solid fa-location-dot"></i>
                    <p> Adresse : <?php echo $abonnee->getAdresse() ?></p></div>
            </div>
    </div>
    
</div>

<!-- Signal Popup -->
<div id="mySignalPopup" class="popup-signal">
  <div class="popup_content">
    <div class="titre">Comment signaler la perte de ma carte ?</div>
    <hr>
    <p>Il est important de signaler le plus rapidement la perte de votre carte, tout document enregistré sur votre carte est sous votre responsabilité. <br>

    <span style="font-weight: 1000; color: #090909;">1 -</span> prévenez une des 16 bibliothèques <br>
    <span style="font-weight: 1000; color: #090909;">2 -</span> votre carte sera alors bloquée pour éviter un emprunt abusif <br>
    <span style="font-weight: 1000; color: #090909;">3 -</span> pour refaire votre carte, vous devez vous rendre dans une bibliothèque avec votre pièce d’identité <br>
</p>
    <div class="bouton">
        <button class="closeButtonS">OK</button>
    </div>
  </div>
</div>

<!-- renouveler Popup -->
<div id="myRenouvelPopup" class="popup-renouvel">
  <div class="popup_content">
    <div class="titre">Comment renouveler mon abonnement ?</div>
    <hr>
    <p> <span style="font-weight: 1000; color: #090909;">En bibliothèque : </span> pouvez renouveler votre abonnement dans les 16 bibliothèques de la Ville de Lyon en présentant votre carte de bibliothèque, et, le cas échéant un justificatif de gratuité/réduction. La demande d’inscription pourra être remplie sur place ou peut être téléchargée sur notre site Internet (page « Informations pratiques – Inscriptions et tarifs »). <br>
    <span style="font-weight: 1000; color: #090909;">En ligne : </span> vous possédez un abonnement permettant l’emprunt à titre personnel (Biblyo ou Culture), vous pouvez le renouveler en ligne, en vous connectant à votre dossier d’abonné, à compter d’un mois avant son échéance et jusqu’à un an après. Si vous bénéficiez d’une réduction (hors celles liées à l’âge) ou de la gratuité, la démarche nécessite de joindre à votre demande un justificatif scanné. <br>
    Pour plus de renseignements, consultez la FAQ qui se trouve dans la barre de menu de cette page. <br>
</p>
    <div class="bouton">
        <button class="closeButtonR">OK</button>
    </div>
  </div>
</div>

<!-- script JavaScript -->
<script >

    //Lorsque l'utilisateur clique sur "signaler"
    document.querySelector(".signaler").addEventListener("click", function() {
        document.getElementById("mySignalPopup").style.display = "block"; // Afficher le modal
    });

    //Lorsque l'utilisateur clique sur "renouveler"
    document.querySelector(".renouveler").addEventListener("click", function() {
        document.getElementById("myRenouvelPopup").style.display = "block"; // Afficher le modal
    });

    // Lorsque l'utilisateur clique sur le bouton "OK" du modal signal
    document.querySelector(".closeButtonS").addEventListener("click", function() {
        document.getElementById("mySignalPopup").style.display = "none"; // Masquer le modal
    });

    // Lorsque l'utilisateur clique sur le bouton "OK" du modal renouvel
    document.querySelector(".closeButtonR").addEventListener("click", function() {
        document.getElementById("myRenouvelPopup").style.display = "none"; // Masquer le modal
    });
    </script>