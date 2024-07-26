<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="./" title="Accueil">
            <img src="css/mini-logo.png" alt="bandeau de la Mediateq"  height="30px"/>
          </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                  <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="./?action=rechercheSimple" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Recherche catalogue
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./?action=rechercheSimple">Recherche simple</a>
                    <a class="dropdown-item" href="./?action=rechercheAvancee">Recherche avancée</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./?action=nouveautes">Nouveautés</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./?action=faq">FAQ</a>
                  </li>
                  <li class="nav-item dropdown">
                    <?php if($connexion->isLoggedOn()) { ?>
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dossier d'abonné
                    </a>
                    <div class="dropdown-menu menue" aria-labelledby="navbarDropdown">
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-solid fa-user"></i>
                          <a class="coco" href="./?action=dossier">Mon dossier</a>
                      </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-regular fa-newspaper"></i>
                          <a class="coco" href="./?action=emprunt">Mes prêts et prolongation</a>
                        </div>
                      </div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-solid fa-calendar-days"></i>
                          <a class="coco" href="./?action=reservation">Mes réservations</a>
                        </div>
                      </div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-solid fa-list"></i>
                          <a class="coco" href="./?action=liste">Mes Listes</a>
                        </div>
                      </div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-solid fa-euro-sign"></i>
                          <a class="coco" href="./?action=frais">Mes frais</a>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-regular fa-clock"></i>
                          <a class="coco" href="./?action=hist_pret">Historique des prêts</a>
                        </div>
                      </div>
                      <div class="acces_menu"></div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-solid fa-magnifying-glass"></i>
                          <a class="coco" href="./?action=hist_recherche">Historique de recherche</a>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="list_menu">
                        <div class="acces_menu">
                          <i class="fa-solid fa-arrow-right-from-bracket"></i>
                          <a class="coco" href="./?action=deconnexion">Deconnexion</a>
                        </div>
                      </div>
                    <?php } else { ?>
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dossier d'abonné
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="list_menu">
                          <div class="acces_menu">
                            <a class="coco" href="./?action=connexion">Connexion</a>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </li>
                  <!-- si connecté acces compte perso avec sous-menu mon dossier v_menu_abonne.php au lieu de dossier abonne et s'inscrire en ligne -->
                </ul>
            </div>
        </div>
    </nav>