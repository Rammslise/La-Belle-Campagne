<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name= "viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&display=swap" />
  <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Inscription</title>
</head>
<body>
  <section class="contenair">
    <header>
      <div class="row p-0 m-0">
        <div class="col md-7 text-right" id="titleImage">
          <img src="assets/img/header/titre.png" class="img-responsive mx-auto" />
        </div>
        <div class="col-md-5 text-right" id="headButton">
          <div class="dropdown">
            <a class="btn btn-outline-success" href="#" role="button" id="dropdownMenuLink" >
              Inscription
            </a>
            <a class="btn btn-outline-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Se connecter
            </a>
            <form class="dropdown-menu p-4">
              <div class="form-group">
                <label for="dropdownMail">Adresse mail</label>
                <input type="email" class="form-control" id="DropdownFormEmail" placeholder="email@example.com"/>
              </div>
              <div class="form-group">
                <label for="dropdownPassword">Mot de passe</label>
                <input type="password" class="form-control" id="DropdownFormPassword" placeholder="Mot de passe" />
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dropdownCheck2" />
                  <label class="form-check-label" for="dropdownCheck2">
                    Se souvenir de moi
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-success">Connexion</button>
            </form>
          </div>
        </div>
      </div>
      <!-- IDEA: Navbar du header avec les différentes catégories en menu vertical. -->
      <div class="row col-12 justify-content-around">
        <!-- IDEA: Id pour préciser que la navbar est pour le grand écran -->
        <div id="hightScreen" class="sticky-top">
          <ul class="nav">
            <li class="dropdown nav-link">
              <button class="btn btn-info vegetablesButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="assets/img/header/legumes.png" width="40" height="30" class="d-inline-block align-center" alt="">Légumes</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Légumes disponibles</a>
                  <a class="dropdown-item" href="#">Nos producteurs</a>
                  <a class="dropdown-item" href="#">Vos recettes</a>
                </div>
              </li>
              <li class="dropdown nav-link">
                <button class="btn btn-info fruitsButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="assets/img/header/fruits.png" width="40" height="30" class="d-inline-block align-center" alt="">Fruits</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Fruits disponibles</a>
                    <a class="dropdown-item" href="#">Nos producteurs</a>
                    <a class="dropdown-item" href="#">Vos recettes</a>
                  </div>
                </li>
                <li class="dropdown nav-link">
                  <button class="btn btn-info creameryButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="assets/img/header/cremerie.png" width="30" height="30" class="d-inline-block align-center" alt="">Crémerie</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Fromages</a>
                      <a class="dropdown-item" href="#">Yaourts</a>
                      <a class="dropdown-item" href="#">Lait</a>
                      <a class="dropdown-item" href="#">Glaces</a>
                      <a class="dropdown-item" href="#">Oeufs</a>
                    </div>
                  </li>
                  <li class="dropdown nav-link">
                    <button class="btn btn-info mealButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="assets/img/header/viande.png" width="30" height="30" class="d-inline-block align-center" alt="">Viandes</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Viandes rouges</a>
                        <a class="dropdown-item" href="#">Viandes blanches</a>
                      </div>
                    </li>
                    <li class="dropdown nav-link">
                      <button class="btn btn-info otherProductsButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/img/header/abeille.png" width="30" height="30" class="d-inline-block align-center" alt="">Autres produits locaux</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Miel et Confitures</a>
                          <a class="dropdown-item" href="#">Céréales et légumineuses</a>
                          <a class="dropdown-item" href="#">Boissons</a>
                        </div>
                      </li>
                      <a class="nav-link " href="#"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#monPanier">
                        <img src="assets/img/header/panier.png" width="30" height="30" class="d-inline-block align-center" alt="">Mon panier !</button></a>
                      </ul>
                    </div>
                  </div>
                </header>


                <div class="row mt-5">
                  <div class="col-md-12">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"></div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"></div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"></div>
                    </div>

                    <form>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationServer01">First name</label>
                          <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationServer02">Last name</label>
                          <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer03">City</label>
                          <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                          <div class="invalid-feedback">
                            Please provide a valid city.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="validationServer04">State</label>
                          <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
                          <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="validationServer05">Zip</label>
                          <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
                          <div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                          <label class="form-check-label" for="invalidCheck3">
                            Agree to terms and conditions
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>


                    <footer>
                      <div class="row p-0 m-0 mt-5" id="footer">
                        <div class="col-md-3">
                          <ul class="services">
                            <li><span>Nos services</span></li>
                            <li><a href="#">Réservations</a></li>
                            <li><a href="#">Livraison à domicile</a></li>
                            <li><a href="#">Les producteurs près de chez vous</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3">
                          <ul class="contactUs">
                            <li><span>Contactez-nous</span></li>
                            <li><a href="#">support@labellecampagne.com</a></li>
                            <li><a href="#">Aide & Support</a></li>
                            <li><a href="#">Nous rejoindre</a></li>
                            <li><a href="#">À propos de nous</a></li>
                          </div>
                          <div class="col-md-3">
                            <ul class="findUs">
                              <li><span>Retrouvez-nous</span></li>
                              <p><li><a href="https://fr-fr.facebook.com/" target="_blank"><img src="assets/img/footer/facebook.png" alt="facebook"></a>
                                <a href="https://www.instagram.com/?hl=fr" target="_blank"><img src="assets/img/footer/instagram.png" alt="instagram"></a></li></p>
                                <li><a href="https://twitter.com/?lang=fr" target="_blank"><img src="assets/img/footer/twitter.png" alt="twitter"></a>
                                  <a href="https://www.linkedin.com/" target="_blank"><img src="assets/img/footer/linkedin.png" alt="linkedin"></a></li>
                                </ul>
                              </div>
                              <div class="col-md-3">
                                <ul class="application">
                                  <li><span>Avec vous !</span></li>
                                  <p>
                                    <li><a href="#" target="_blank"><img src="assets/img/footer/appStore.png" alt="appStore"></a><li></p>
                                      <li><a href="#" target="_blank"><img src="assets/img/footer/googlePlay.png" alt="googlePlay"></a></li>
                                    </ul>
                                  </div>
                                  <p><a href="#" title="legalNotice" target="_blank">Mentions légales</a> - <a href="#">Conditions générales d'utilisations</a></p>
                                </div>
                              </section>
                              <script src="assets/js/jquery-3.4.1.min.js"></script>
                              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                              <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
                              <script src="assets/js/script.js"></script>
                            </body>
                            </html>
