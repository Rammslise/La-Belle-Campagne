<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name= "viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&display=swap" />
        <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>La Belle Campagne</title>
    </head>
    <body>
        <!--Ici on inclut la partie HEADER du site -->
        <?php include 'header.html'; ?>

        <!--Body du site -->
        <div class="container">

            <!-- Carousel-->
            <div id="homeCarousel" class="carousel slide p-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/springImg.jpg" class="d-block w-100" alt="spring">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Nouvelle saison</h5>
                            <p>Le printemps est parmi nous, profitez du soleil et des sorties</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/agricultureImg.jpg" class="d-block w-100" alt="agriculturalCentre">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/minister.jpg" class="d-block w-100" alt="minister">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Réunion d'urgence au sein du ministère</h5>
                            <p>Didier Guillaume réunit ses collaborateurs afin de valider le budget Agriculture.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Mise en avant des produits-->
            <h3 class="p-2 mb-1 text-center">La sélection du jour</h3>
            <div class="row justify-content-center mb-4">
                <div class="col-md-10">
                    <div class="card-deck" >
                        <div class="card">
                            <img src="assets/img/body/endive.jpeg" class="card-img-top" alt="endive">
                            <div class="card-body">
                                <h5 class="card-title">Endives cat 1</h5>
                                <p class="card-text">1,50€, 500g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                                <p class="card-text"><small class="text-muted">Earl Alexandre</small><img src="assets/img/body/small.jpeg" class="ml-4 rounded-circle" name="earlLogo" height="36" width="36"/></p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/img/body/chevre.jpeg" class="card-img-top" alt="goatCheese">
                            <div class="card-body">
                                <h5 class="card-title">Fromage de chèvre frais nature</h5>
                                <p class="card-text">3,50€, 150g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                                <p class="card-text"><small class="text-muted">Aux Petits délices de Chèvres</small><img src="assets/img/goatjoy.png" class="ml-4 rounded-circle" name="goatJoyLogo" height="36" width="36"/></p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/img/body/jambon.jpeg" class="card-img-top" alt="ham">
                            <div class="card-body">
                                <h5 class="card-title">Jambon blanc</h5>
                                <p class="card-text">4,49€, 150g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                                <p class="card-text"><small class="text-muted">Ferme Les Barres</small><img src="assets/img/steakLogo.png" class="ml-4 rounded-circle" name="farmLogo" height="36" width="36"/></p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/img/body/steack.png" class="card-img-top" alt="steak">
                            <div class="card-body">
                                <h5 class="card-title">Le haché de boeuf</h5>
                                <p class="card-text">4,99€, 220g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                                <p class="card-text"><small class="text-muted">Ferme Les Barres</small><img src="assets/img/steakLogo.png" class="ml-4 rounded-circle" name="farmLogo" height="36" width="36"/></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- La partie FOOTER -->
        <?php include 'footer.html'; ?>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
