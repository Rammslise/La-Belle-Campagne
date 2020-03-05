<?php
session_start();

require 'init/credentials.php';
require 'init/functions.php';
require 'controllers/indexCtrl.php';
include 'utilities/header.php';
?>

<body>
    <?php if (isset($message)) { ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php } ?>
    <div class="container-fluid">
        <!--Message -->       
        <h3 class="p-2 mt-2 mb-2 text-center "><span>Dans l'actualité</span></h3>
        <div  class="row" id="actuality">
            <div class="col-md-4">
                <img class="img-fluid" src="assets/img/body/calendar.jpg" id="calendar" alt="marchCalendar"/>
            </div>
            <!-- Carousel-->
            <div id="homeCarousel" class="carousel slide col-md-4" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/body/market.jpg" class="d-block w-100 img-fluid" alt="market" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/body/soissonsBeans.jpg" class="d-block w-100 img-fluid" alt="beans" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4><span>Ils reviennent</span></h4>
                            <p>Les fameux haricots de Soissons sont de nouveaux parmis nous</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/body/pub.jpg" class="d-block w-100 img-fluid" alt="publicity" />
                    </div>
                </div>
            </div>    
            <div class="container">
                <div class="content col-md-4">
                    <a href="https://www.salon-agriculture.com" target="_blank">
                        <div class="content-overlay"></div>
                        <img class="img-fluid" src="assets/img/body/cow.jpeg" id="cowPhoto" alt="cowPhoto" />
                        <div class="content-details fadeIn-bottom">
                            <h3 class="content-title">Salon de l'agriculture</h3>
                            <p class="content-text">Du 22 février au 1 mars 2020</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Mise en avant des produits-->
        <h3 class="p-2 mt-4 text-center"><span>La sélection du jour</span></h3>
        <div class="col-md-12">
            <div class="card-deck" >
                <div class="card">
                    <img src="assets/img/articles/potatoe.jpeg" class="card-img-top" alt="potatoe">
                    <div class="card-body">
                        <h5 class="card-title">Pomme de terre Charlotte</h5>
                        <p class="card-text">1,50€, 500g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                        <p class="card-text"><small class="text-muted">Veilliard Christian</small><img src="assets/img/logo/logo3.jpeg" class="ml-4 rounded-circle" name="earlLogo" height="36" width="36"/></p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/img/articles/chevre.jpeg" class="card-img-top" alt="goatCheese">
                    <div class="card-body">
                        <h5 class="card-title">Fromage de chèvre frais nature</h5>
                        <p class="card-text">3,50€, 150g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                        <p class="card-text"><small class="text-muted">Aux Petits délices de...</small><img src="assets/img/logo/logo1.png" class="ml-4 rounded-circle" name="goatJoyLogo" height="36" width="36"/></p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/img/articles/jambon.jpeg" class="card-img-top" alt="ham">
                    <div class="card-body">
                        <h5 class="card-title">Jambon blanc</h5><br>
                        <p class="card-text">4,49€, 150g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                        <p class="card-text"><small class="text-muted">Ferme Les Barres</small><img src="assets/img/logo/logo2.png" class="ml-4 rounded-circle" name="farmLogo" height="36" width="36"/></p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/img/articles/steack.png" class="card-img-top" alt="steak">
                    <div class="card-body">
                        <h5 class="card-title">Le haché de boeuf</h5><br>
                        <p class="card-text">4,99€, 220g<button type="button" class="btn btn-success btn-sm ml-4">+</button></p>
                        <p class="card-text"><small class="text-muted">Ferme Les Barres</small><img src="assets/img/logo/logo2.png" class="ml-4 rounded-circle" name="farmLogo" height="36" width="36"/></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- La partie FOOTER  -->
    <?php include 'utilities/footer.php'; ?>
</body>
</html>
